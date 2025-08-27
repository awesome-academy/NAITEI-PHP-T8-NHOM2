<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductImage>
 */
class ProductImageFactory extends Factory
{
    protected $model = ProductImage::class;

    public function definition(): array
    {
        // lấy ảnh đã copy về public/products (từ SeedProductImages)
        $disk = Storage::disk('public');
        $files = collect($disk->files('products'))
            ->filter(fn ($p) => preg_match('/\.(jpe?g|png|webp)$/i', $p))
            ->values()
            ->all();

        $path = $files
            ? $this->faker->randomElement($files)               // local path
            : 'https://via.placeholder.com/800x1000.png?text=No+Image';

        return [
            // 'products_id' set ở seeder/afterCreating
            'image_path' => $path,       // chấp nhận path tương đối hoặc URL
            'is_primary' => false,
            'sort_order' => 0,
        ];
    }
}
