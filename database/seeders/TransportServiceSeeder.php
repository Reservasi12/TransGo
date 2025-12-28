<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransportService;

class TransportServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample transport services
        TransportService::create([
            'code' => 'BUS001',
            'name' => 'Executive Bus Jakarta - Bandung',
            'type' => 'bus',
            'route_from' => 'Jakarta',
            'route_to' => 'Bandung',
            'departure_time' => '08:00:00',
            'arrival_time' => '12:00:00',
            'capacity' => 40,
            'price' => 150000,
            'facilities' => 'AC, Charging Port, Free WiFi',
            'description' => 'Comfortable executive bus service from Jakarta to Bandung',
            'is_active' => true,
        ]);

        TransportService::create([
            'code' => 'BUS002',
            'name' => 'Executive Bus Bandung - Jakarta',
            'type' => 'bus',
            'route_from' => 'Bandung',
            'route_to' => 'Jakarta',
            'departure_time' => '14:00:00',
            'arrival_time' => '18:00:00',
            'capacity' => 40,
            'price' => 150000,
            'facilities' => 'AC, Charging Port, Free WiFi',
            'description' => 'Comfortable executive bus service from Bandung to Jakarta',
            'is_active' => true,
        ]);

        TransportService::create([
            'code' => 'SHUT001',
            'name' => 'Airport Shuttle Soekarno-Hatta',
            'type' => 'shuttle',
            'route_from' => 'Jakarta',
            'route_to' => 'Soekarno-Hatta Airport',
            'departure_time' => '06:00:00',
            'arrival_time' => '07:00:00',
            'capacity' => 14,
            'price' => 80000,
            'facilities' => 'AC, Luggage Space',
            'description' => 'Convenient shuttle service to Soekarno-Hatta Airport',
            'is_active' => true,
        ]);

        TransportService::create([
            'code' => 'TRAV001',
            'name' => 'Tour Travel Bali Package',
            'type' => 'travel',
            'route_from' => 'Denpasar',
            'route_to' => 'Ubud - Kintamani - Tanah Lot',
            'departure_time' => '08:00:00',
            'arrival_time' => '18:00:00',
            'capacity' => 20,
            'price' => 500000,
            'facilities' => 'AC, Tour Guide, Lunch',
            'description' => 'Full day tour package in Bali including Ubud, Kintamani and Tanah Lot',
            'is_active' => true,
        ]);
    }
}
