<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Feedback;

class StoreFeedbackRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // quyền đã check ở controller/routes
    }

    protected function prepareForValidation(): void
    {
        if ($this->has('rating')) {
            $this->merge(['rating' => (int) $this->input('rating')]);
        }
    }

    public function rules(): array
    {
        return [
            'rating'  => ['required','integer','min:1','max:5'],
            'comment' => ['nullable','string','max:100'],
        ];
    }

    /**
     * Chặn tạo lần 2 cho cùng user + product
     */
    public function withValidator($validator): void
    {
        $validator->after(function ($v) {
            $product = $this->route('product');            // {product:slug}
            $user    = $this->user();
            if (!$product || !$user) return;

            $exists = Feedback::where('user_id', $user->id)
                ->where('products_id', $product->products_id)
                ->exists();

            if ($exists) {
                // gắn lỗi vào 'rating' cho dễ hiển thị
                $v->errors()->add('rating', 'Bạn đã đánh giá sản phẩm này rồi.');
            }
        });
    }

    public function messages(): array
    {
        return [
            'rating.required' => 'Vui lòng chọn số sao.',
            'rating.min'      => 'Ít nhất 1 sao.',
            'rating.max'      => 'Tối đa 5 sao.',
            'comment.max'     => 'Bình luận tối đa 100 ký tự.',
        ];
    }
}
