<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        $categories = [
            'Shirts',
            'T-Shirts',
            'Jeans',
            'Trousers',
            'Shorts',
            'Jackets',
            'Sweaters',
            'Hoodies',
            'Coats',
            'Dresses',
            'Skirts',
            'Blouses',
            'Suits',
        ];

        foreach ($categories as $index => $name) {
            DB::table('categories')->insert([
                'category_name' => $name,
                'slug' => \Str::slug($name),
                'sort_order' => $index + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}