<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'username' => 'tranhuy105',
            'email' => 'admin@gmail.com',
            'password' => '12345678',
            'role' => 'admin',
        ]);
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            SeedProductImages::class,
            ProductSeeder::class,
            OrderSeeder::class,
            FeedbackSeeder::class,
        ]);
    }
}
