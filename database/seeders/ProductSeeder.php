<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
         // Mỗi category tạo N sản phẩm
        $perCategory = 8; 

        // Lặp theo thứ tự sort_order cho đẹp
        Category::query()->orderBy('sort_order')->get(['categories_id','category_name'])
            ->each(function ($cat) use ($perCategory) {
                Product::factory()->count($perCategory)->create([
                    'categories_id' => $cat->categories_id,
                ]);
            });
    }
}
