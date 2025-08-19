<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\Http\Requests\StoreFeedbackRequest;
use App\Http\Requests\UpdateFeedbackRequest;

use App\Models\Product;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Order_items;
use App\Models\Order;
use Throwable;

class FeedbackController extends Controller
{
    // POST /user/products/{product:slug}/feedbacks
    public function store(StoreFeedbackRequest $request, Product $product)
    {
        $userId    = Auth::id();
        $productId = $product->products_id;

        // Chỉ user đã mua (đơn completed) mới được feedback
        $verified = DB::table('orders')
            ->join('order_items','orders.orders_id','=','order_items.orders_id')
            ->where('orders.user_id', $userId)
            ->where('order_items.products_id', $productId)
            ->whereRaw('LOWER(orders.status) = ?', ['completed'])
            ->exists();

        if (!$verified) {
            return back()->with('error', 'Bạn cần mua sản phẩm (đơn đã hoàn tất) để đánh giá.');
        }

        // Tạo feedback FormRequest đã validate; DB có unique để chắn race
        $data = $request->validated();

        try {
            Feedback::create([
                'user_id'           => $userId,
                'products_id'       => $productId,
                'rating'            => (int) $data['rating'],
                'comment'           => $data['comment'] ?? null, // lưu tại feedback.comment
                'is_hidden'         => false,
                'verified_purchase' => true,
            ]);
        } catch (Throwable $e) {
            Log::error('Feedback creation failed', [
                'exception' => $e,
                'user_id' => $userId,
                'products_id' => $productId,
                'data' => $data,
            ]);
            return back()->with('error', 'Không thể gửi đánh giá. Vui lòng thử lại.');
        }

        $this->recalcAggregates($productId);

        return back()->with('success', 'Đã gửi đánh giá.');
    }

    // PUT/PATCH /user/products/{product:slug}/feedbacks/{feedback}
    public function update(UpdateFeedbackRequest $request, Product $product, Feedback $feedback)
    {
        if ($feedback->products_id !== $product->products_id) abort(404);
        if (!$this->canModify($feedback)) abort(403);

        $data = $request->validated();

        $feedback->update([
            'rating'  => (int) $data['rating'],
            'comment' => $data['comment'] ?? null,
        ]);

        $this->recalcAggregates($product->products_id);

        return back()->with('success', 'Đã cập nhật đánh giá.');
    }

    // DELETE /user/products/{product:slug}/feedbacks/{feedback}
    public function destroy(Product $product, Feedback $feedback)
    {
        if ($feedback->products_id !== $product->products_id) abort(404);
        if (!$this->canModify($feedback)) abort(403);

        $feedback->delete();

        $this->recalcAggregates($product->products_id);

        return back()->with('success', 'Đã xoá đánh giá.');
    }

    // Helpers 

    private function canModify(Feedback $feedback): bool
    {
        $user = Auth::user();
        return $user && ($user->role === 'admin' || $feedback->user_id === $user->id);
    }

    private function recalcAggregates(int $productId): void
    {
        $agg = DB::table('feedback')
            ->where('products_id', $productId)
            ->where('is_hidden', false)
            ->selectRaw('COUNT(*) c, ROUND(AVG(rating), 2) a')
            ->first();

        DB::table('products')
            ->where('products_id', $productId)
            ->update([
                'rating_count' => (int) ($agg->c ?? 0),
                'rating_avg'   => (float) ($agg->a ?? 0.0),
            ]);
    }
}
