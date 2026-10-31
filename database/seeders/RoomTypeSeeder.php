<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Standard Single',
                'base_price' => 45.00,
                'capacity' => 1,
                'description' => 'Cozy room with single bed, desk, private bathroom, and high-speed Wi-Fi.',
            ],
            [
                'name' => 'Deluxe Double',
                'base_price' => 85.00,
                'capacity' => 2,
                'description' => 'Spacious room with queen-sized bed, city view, mini-bar, and smart TV.',
            ],
            [
                'name' => 'Executive King',
                'base_price' => 135.00,
                'capacity' => 2,
                'description' => 'Luxury king bed, executive lounge access, work station, and espresso machine.',
            ],
            [
                'name' => 'Family Suite',
                'base_price' => 210.00,
                'capacity' => 4,
                'description' => 'Two connected bedrooms, kitchenette, living room, and children play corner.',
            ],
            [
                'name' => 'Presidential Penthouse',
                'base_price' => 450.00,
                'capacity' => 6,
                'description' => 'Top floor panoramic sea view, private jacuzzi, butler service, and private dining area.',
            ],
        ];

        foreach ($types as $type) {
            RoomType::firstOrCreate(['name' => $type['name']], $type);
        }
    }
}
