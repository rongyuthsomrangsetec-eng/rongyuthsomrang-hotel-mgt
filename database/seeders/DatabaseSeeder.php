<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Default admin user matching exam demo (Slide 4)
        User::firstOrCreate(
            ['email' => 'adminwoman@gmail.com'],
            [
                'name' => 'Rong Yuthsomrang',
                'password' => Hash::make('password'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'admin@hotel.com'],
            [
                'name' => 'Hotel Manager',
                'password' => Hash::make('password'),
            ]
        );

        $this->call([
            RoomTypeSeeder::class,
            RoomSeeder::class,
        ]);
    }
}
