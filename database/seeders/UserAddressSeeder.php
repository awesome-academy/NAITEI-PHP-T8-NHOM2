<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAddress;
use App\Models\User;
use App\Models\Province;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $provinces = Province::all();

        if ($users->isEmpty() || $provinces->isEmpty()) {
            $this->command->info('Cannot seed user addresses without users and provinces.');
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            UserAddress::create([
                'user_id' => $users->random()->id,
                'province_id' => $provinces->random()->id,
                'recipient_name' => 'Recipient ' . ($i + 1),
                'recipient_phone' => '123456789' . $i,
                'address' => 'Address Line ' . ($i + 1),
                'is_default' => false,
            ]);
        }
    }
}
