<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ShowHotelData extends Command
{
    /**
     * The name and signature of the console command.
     */
    protected $signature = 'hotel:data';

    /**
     * The console command description.
     */
    protected $description = 'Display all data from room_types and rooms tables matching Slide 8';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("==========================================================================");
        $this->info("1. SELECT * FROM room_types;");
        $this->info("==========================================================================");

        $types = DB::table('room_types')->select('id', 'name', 'base_price', 'capacity', 'created_at')->get();
        $this->table(['id', 'name', 'base_price', 'capacity', 'created_at'], $types->map(function ($item) {
            return (array) $item;
        }));

        $this->newLine();

        $this->info("==========================================================================");
        $this->info("2. SELECT * FROM rooms;");
        $this->info("==========================================================================");

        $rooms = DB::table('rooms')->select('id', 'room_number', 'room_type_id', 'price_per_night', 'floor', 'status', 'created_at')->get();
        $this->table(['id', 'room_number', 'room_type_id', 'price_per_night', 'floor', 'status', 'created_at'], $rooms->map(function ($item) {
            return (array) $item;
        }));

        return Command::SUCCESS;
    }
}

