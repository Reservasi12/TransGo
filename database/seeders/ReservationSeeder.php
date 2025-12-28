<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Illuminate\Support\Str;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample reservations
        Reservation::create([
            'booking_code' => 'TG' . strtoupper(Str::random(10)),
            'user_id' => 3, // John Doe (ID 3)
            'service_id' => 1, // Jakarta - Bandung bus
            'reservation_date' => now()->addDays(3),
            'passenger_count' => 2,
            'passenger_name' => 'John Doe',
            'passenger_phone' => '081234567892',
            'passenger_email' => 'john@transgo.test',
            'seat_numbers' => json_encode(['A1', 'A2']),
            'total_price' => 300000,
            'payment_status' => 'paid',
            'payment_method' => 'bank_transfer',
            'booking_status' => 'confirmed',
        ]);

        Reservation::create([
            'booking_code' => 'TG' . strtoupper(Str::random(10)),
            'user_id' => 4, // Jane Smith (ID 4)
            'service_id' => 2, // Bandung - Jakarta bus
            'reservation_date' => now()->addDays(5),
            'passenger_count' => 1,
            'passenger_name' => 'Jane Smith',
            'passenger_phone' => '081234567893',
            'passenger_email' => 'jane@transgo.test',
            'seat_numbers' => json_encode(['B3']),
            'total_price' => 150000,
            'payment_status' => 'pending',
            'payment_method' => 'e_wallet',
            'booking_status' => 'pending',
        ]);

        Reservation::create([
            'booking_code' => 'TG' . strtoupper(Str::random(10)),
            'user_id' => 3, // John Doe (ID 3)
            'service_id' => 3, // Airport shuttle
            'reservation_date' => now()->addDays(1),
            'passenger_count' => 1,
            'passenger_name' => 'John Doe',
            'passenger_phone' => '081234567892',
            'passenger_email' => 'john@transgo.test',
            'seat_numbers' => json_encode(['C5']),
            'total_price' => 80000,
            'payment_status' => 'paid',
            'payment_method' => 'credit_card',
            'booking_status' => 'checked_in',
        ]);

        Reservation::create([
            'booking_code' => 'TG' . strtoupper(Str::random(10)),
            'user_id' => 4, // Jane Smith (ID 4)
            'service_id' => 4, // Bali tour
            'reservation_date' => now()->addDays(10),
            'passenger_count' => 2,
            'passenger_name' => 'Jane Smith',
            'passenger_phone' => '081234567893',
            'passenger_email' => 'jane@transgo.test',
            'seat_numbers' => json_encode(['D1', 'D2']),
            'total_price' => 1000000,
            'payment_status' => 'paid',
            'payment_method' => 'bank_transfer',
            'booking_status' => 'confirmed',
        ]);
    }
}
