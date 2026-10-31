<?php

namespace Database\Seeders;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $single = RoomType::where('name', 'Standard Single')->first();
        $deluxe = RoomType::where('name', 'Deluxe Double')->first();
        $executive = RoomType::where('name', 'Executive King')->first();
        $family = RoomType::where('name', 'Family Suite')->first();
        $penthouse = RoomType::where('name', 'Presidential Penthouse')->first();

        $rooms = [
            [
                'room_number' => '101',
                'room_type_id' => $single->id,
                'price_per_night' => 45.00,
                'floor' => '1st Floor',
                'status' => 'Available',
                'description' => 'Quiet corner room close to reception and garden.',
            ],
            [
                'room_number' => '102',
                'room_type_id' => $single->id,
                'price_per_night' => 48.00,
                'floor' => '1st Floor',
                'status' => 'Occupied',
                'description' => 'Single room with extra garden terrace.',
            ],
            [
                'room_number' => '201',
                'room_type_id' => $deluxe->id,
                'price_per_night' => 85.00,
                'floor' => '2nd Floor',
                'status' => 'Available',
                'description' => 'Deluxe room facing swimming pool with balcony.',
            ],
            [
                'room_number' => '202',
                'room_type_id' => $deluxe->id,
                'price_per_night' => 90.00,
                'floor' => '2nd Floor',
                'status' => 'Occupied',
                'description' => 'Deluxe double bed with high-floor pool view.',
            ],
            [
                'room_number' => '301',
                'room_type_id' => $executive->id,
                'price_per_night' => 135.00,
                'floor' => '3rd Floor',
                'status' => 'Available',
                'description' => 'Executive king room with complimentary breakfast and work lounge access.',
            ],
            [
                'room_number' => '302',
                'room_type_id' => $executive->id,
                'price_per_night' => 140.00,
                'floor' => '3rd Floor',
                'status' => 'Maintenance',
                'description' => 'Undergoing scheduled AC deep cleaning and smart lock upgrade.',
            ],
            [
                'room_number' => '401',
                'room_type_id' => $family->id,
                'price_per_night' => 210.00,
                'floor' => '4th Floor',
                'status' => 'Available',
                'description' => 'Spacious 2-bedroom suite ideal for families of four.',
            ],
            [
                'room_number' => '402',
                'room_type_id' => $family->id,
                'price_per_night' => 220.00,
                'floor' => '4th Floor',
                'status' => 'Occupied',
                'description' => 'Family suite with connecting doors and children play area.',
            ],
            [
                'room_number' => '501',
                'room_type_id' => $penthouse->id,
                'price_per_night' => 450.00,
                'floor' => '5th Floor (Penthouse)',
                'status' => 'Available',
                'description' => 'Exclusive top floor penthouse with private jacuzzi, rooftop terrace, and butler service.',
            ],
        ];

        foreach ($rooms as $room) {
            Room::firstOrCreate(['room_number' => $room['room_number']], $room);
        }
    }
}
