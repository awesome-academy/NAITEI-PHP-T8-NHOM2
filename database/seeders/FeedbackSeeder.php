<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Order;
use App\Models\Feedback;

class FeedbackSeeder extends Seeder
{

    /*
     null = không giới hạn (seed cho TẤT CẢ cặp user-product đã mua).
     Ví dụ muốn tối đa 20 review/product: đặt = 20.
     */
    private ?int $limitPerProduct = null;

    // Bộ comment để seed. 
    private array $comments = [
        'Hài lòng về chất lượng', 'Sản phẩm ổn', 'Đáng tiền', 'Giao nhanh',
        'Đóng gói cẩn thận', 'Sẽ ủng hộ lần sau', 'Tốt trong tầm giá',
        'Chất lượng ok', 'Chất vải mượt, đáng tiền', 'Mẫu đẹp', 'Hàng zin', 'Vải đẹp, sẽ mua thêm'
    ];

    // Tạo rating 
    private function randomRating(): int
    {
        $pool = [5,5,5,5,5,4,4,4,4,3,3,3];
        return $pool[array_rand($pool)];
    }

    private function randomComment(): string
    {
        $c = $this->comments[array_rand($this->comments)];
        return Str::limit($c, 100, '');
    }
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->command?->info('➡️  Bắt đầu seed feedback từ các đơn hàng COMPLETED...');

        // Lấy tất cả cặp (user_id, products_id) đã mua hàng với đơn COMPLETED.
        // Dùng query builder để không phụ thuộc Model Order_items.
        $pairsQuery = DB::table('orders')
            ->join('order_items', 'orders.orders_id', '=', 'order_items.orders_id')
            ->whereRaw('LOWER(orders.status) = ?', [strtolower(Order::STATUS_COMPLETED)])
            ->groupBy('orders.user_id', 'order_items.products_id')
            ->select('orders.user_id', 'order_items.products_id');

        // Đếm theo sản phẩm để áp giới hạn (nếu có)
        $perProductCounts = [];

        // Duyệt theo lô để tránh ăn RAM nếu dữ liệu lớn
        $pairsQuery->orderBy('order_items.products_id')
            ->chunk(1000, function ($rows) use (&$perProductCounts) {
                foreach ($rows as $row) {
                    $uid = (int) $row->user_id;
                    $pid = (int) $row->products_id;

                    // Giới hạn số review mỗi sản phẩm (nếu cấu hình)
                    if ($this->limitPerProduct !== null) {
                        $cur = $perProductCounts[$pid] ?? 0;
                        if ($cur >= $this->limitPerProduct) {
                            continue;
                        }
                    }

                    // Tạo/cập nhật feedback (idempotent)
                    Feedback::updateOrCreate(
                        [
                            'user_id'     => $uid,
                            'products_id' => $pid,
                        ],
                        [
                            'rating'            => $this->randomRating(),
                            'comment'           => $this->randomComment(),
                            'is_hidden'         => false,
                            'verified_purchase' => true, // vì xuất phát từ đơn completed
                        ]
                    );

                    if ($this->limitPerProduct !== null) {
                        $perProductCounts[$pid] = ($perProductCounts[$pid] ?? 0) + 1;
                    }
                }
            });

        // Cập nhật aggregate cho tất cả sản phẩm có review hiển thị
        $this->command?->info('🔄  Cập nhật rating_count & rating_avg...');
        $aggRows = DB::table('feedback')
            ->where('is_hidden', false)
            ->groupBy('products_id')
            ->select('products_id', DB::raw('COUNT(*) as c'), DB::raw('ROUND(AVG(rating),2) as a'))
            ->get();

        foreach ($aggRows as $r) {
            DB::table('products')
                ->where('products_id', $r->products_id)
                ->update([
                    'rating_count' => (int) $r->c,
                    'rating_avg'   => (float) $r->a,
                ]);
        }

        $this->command?->info('✅ FeedbackSeeder: Hoàn tất.');
    }
}
