<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;
use App\Models\Product;
use App\Models\ProductImage;

class BackfillProductImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $disk = Storage::disk('public');
        $pool = collect($disk->files('products'))
            ->filter(fn ($p) => preg_match('/\.(jpe?g|png|webp)$/i', $p))
            ->values()
            ->all();

        if (empty($pool)) {
            $this->command->warn('⚠️ Không tìm thấy ảnh trong storage/app/public/products. Hãy chạy SeedProductImages trước.');
        }

        $count = 0;

        Product::query()->withCount('images')->get()->each(function ($product) use ($pool, &$count) {
            // Đã có ảnh -> bỏ qua
            if ($product->images_count > 0) return;

            // 2–5 ảnh
            $n = random_int(2, 5);
            $chosen = $pool ? Arr::random($pool, min($n, count($pool))) : [];
            $chosen = is_array($chosen) ? array_values($chosen) : [$chosen];

            // Nếu không có ảnh local thì vẫn tạo từ placeholder để không rỗng
            if (empty($chosen)) {
                $chosen = [
                    'https://via.placeholder.com/800x1000.png?text=' . urlencode($product->product_name),
                ];
            }

            $sort = 0;
            foreach ($chosen as $idx => $path) {
                ProductImage::create([
                    'products_id' => $product->getKey(),
                    'image_path'  => $path,            // có thể là 'products/xxx.jpg' hoặc URL
                    'is_primary'  => $idx === 0,       // tấm đầu là ảnh chính
                    'sort_order'  => $sort++,
                ]);
            }

            // Giữ tương thích UI cũ: nếu product chưa có image_path thì gán bằng ảnh chính
            if (empty($product->image_path)) {
                $product->update(['image_path' => $chosen[0]]);
            }

            $count++;
        });

        $this->command->info("✔ Đã gắn ảnh cho {$count} sản phẩm chưa có ảnh.");
    }
}
