<?php

namespace Database\Seeders;

use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomTypeSeeder extends Seeder
{
    /**
     * Run the database seeds for SCT Chan Thorn Resort.
     */
    public function run(): void
    {
        $types = [
            [
                'name' => 'Standard Wooden Bungalow (បឹងហ្គាឡូស្តង់ដារ)',
                'base_price' => 25.00,
                'capacity' => 2,
                'description' => 'Colorful wooden garden bungalow with queen bed, AC, high-speed WiFi, private bathroom, and peaceful nature ambiance.',
            ],
            [
                'name' => 'Deluxe Nature Villa (វីឡាធម្មជាតិឌីឡាក់)',
                'base_price' => 35.00,
                'capacity' => 2,
                'description' => 'Modern room with king-size bed, illuminated walkway view, smart TV, hot shower, and direct garden access.',
            ],
            [
                'name' => 'Modern VIP Suite (បន្ទប់ VIP ទំនើប)',
                'base_price' => 45.00,
                'capacity' => 2,
                'description' => 'Premium VIP room featuring backlit halo LED mirror, workstation, flat-screen Smart TV, minibar, and complimentary coffee.',
            ],
            [
                'name' => 'Family Garden Cottage (ផ្ទះគ្រួសារសួនច្បារ)',
                'base_price' => 65.00,
                'capacity' => 4,
                'description' => 'Spacious cottage with two queen beds, private terrace, family seating area, refrigerator, and close to 24h secured parking.',
            ],
            [
                'name' => 'Executive Green Villa (បឹងហ្គាឡូអេកស៊ិកឃ្យូធីវ)',
                'base_price' => 55.00,
                'capacity' => 3,
                'description' => 'Stand-alone luxury bungalow, serene nature atmosphere, open wardrobe rack, fast WiFi, and quiet resort surroundings.',
            ],
        ];

        foreach ($types as $type) {
            RoomType::updateOrCreate(['name' => $type['name']], $type);
        }
    }
}
