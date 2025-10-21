<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Standar',
            'price' => 300000, // contoh harga per malam
        ]);

        Room::create([
            'name' => 'Deluxe',
            'price' => 500000,
        ]);

        Room::create([
            'name' => 'Luxury',
            'price' => 700000,
        ]);
    }
}
