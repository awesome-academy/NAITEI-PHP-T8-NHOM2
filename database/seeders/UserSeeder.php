<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 2 admin
         User::factory()->count(2)
            ->state(fn() => [
                'role'       => 'admin',
            ])
            ->create();

        // 5 user
        User::factory()->count(30)
            ->create();
    }
}
