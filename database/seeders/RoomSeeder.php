<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds for SCT Chan Thorn Resort.
     */
    public function run(): void
    {
        $bungalow = RoomType::where('name', 'like', '%Bungalow%')->first();
        $deluxe = RoomType::where('name', 'like', '%Deluxe%')->first();
        $vip = RoomType::where('name', 'like', '%VIP%')->first();
        $family = RoomType::where('name', 'like', '%Family%')->first();
        $executive = RoomType::where('name', 'like', '%Executive%')->first();

        $rooms = [
            [
                'room_number' => 'B-101',
                'room_type_id' => $bungalow->id,
                'price_per_night' => 25.00,
                'floor' => 'Green Garden Zone',
                'status' => 'Available',
                'description' => 'Bright green exterior bungalow, queen bed, high-speed WiFi, hot shower, quiet garden walkway.',
            ],
            [
                'room_number' => 'B-102',
                'room_type_id' => $bungalow->id,
                'price_per_night' => 25.00,
                'floor' => 'Amber Garden Zone',
                'status' => 'Occupied',
                'description' => 'Warm amber bungalow, wooden terrace, garden lights view, fast WiFi & 24h parking.',
            ],
            [
                'room_number' => 'V-201',
                'room_type_id' => $deluxe->id,
                'price_per_night' => 35.00,
                'floor' => 'Villa Pavilion 1',
                'status' => 'Available',
                'description' => 'Deluxe room with upholstered headboard, wall-mounted Smart TV, AC, hot water, cozy bedside lighting.',
            ],
            [
                'room_number' => 'V-202',
                'room_type_id' => $deluxe->id,
                'price_per_night' => 38.00,
                'floor' => 'Villa Pavilion 1',
                'status' => 'Occupied',
                'description' => 'Deluxe villa room, dark blackout curtains, artwork headboard wall, direct garden path access.',
            ],
            [
                'room_number' => 'VIP-301',
                'room_type_id' => $vip->id,
                'price_per_night' => 45.00,
                'floor' => 'VIP Suites Block',
                'status' => 'Available',
                'description' => 'Modern suite with circular backlit LED mirror, work desk, smart TV, soft luxury bedding, minibar.',
            ],
            [
                'room_number' => 'VIP-302',
                'room_type_id' => $vip->id,
                'price_per_night' => 48.00,
                'floor' => 'VIP Suites Block',
                'status' => 'Maintenance',
                'description' => 'Undergoing scheduled AC filter servicing and lighting inspection. Ready soon.',
            ],
            [
                'room_number' => 'FAM-401',
                'room_type_id' => $family->id,
                'price_per_night' => 65.00,
                'floor' => 'Family Garden Villa',
                'status' => 'Available',
                'description' => 'Spacious 2-bed family cottage, children friendly garden area, refrigerator, complimentary coffee & dining.',
            ],
            [
                'room_number' => 'FAM-402',
                'room_type_id' => $family->id,
                'price_per_night' => 70.00,
                'floor' => 'Family Garden Villa',
                'status' => 'Occupied',
                'description' => 'Large family cottage with shaded porch, outdoor table, close to front reception and parking.',
            ],
            [
                'room_number' => 'EXEC-501',
                'room_type_id' => $executive->id,
                'price_per_night' => 55.00,
                'floor' => 'Executive Nature Wing',
                'status' => 'Available',
                'description' => 'Executive room with matte black open wardrobe system, large Smart TV, work lounge, 24h CCTV security.',
            ],
        ];

        foreach ($rooms as $room) {
            Room::updateOrCreate(['room_number' => $room['room_number']], $room);
        }
    }
}
