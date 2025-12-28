<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $reservationDate = fake()->dateTimeBetween('+1 week', '+1 month');
        $bookingStatus = fake()->randomElement(['pending', 'confirmed', 'checked_in', 'completed', 'cancelled']);
        $paymentStatus = $bookingStatus === 'cancelled' ? 'refunded' : fake()->randomElement(['pending', 'paid', 'failed']);

        return [
            'booking_code' => 'TG' . strtoupper(Str::random(8)),
            'user_id' => null, // Will be set when creating
            'service_id' => null, // Will be set when creating
            'reservation_date' => $reservationDate->format('Y-m-d'),
            'passenger_count' => fake()->numberBetween(1, 4),
            'passenger_name' => fake()->name(),
            'passenger_phone' => fake()->phoneNumber(),
            'passenger_email' => fake()->safeEmail(),
            'seat_numbers' => json_encode(fake()->randomElements(['A1', 'A2', 'A3', 'B1', 'B2', 'B3', 'C1', 'C2', 'C3', 'D1', 'D2', 'D3'], fake()->numberBetween(1, 2))),
            'total_price' => fake()->randomElement([150000, 300000, 450000, 600000]),
            'payment_status' => $paymentStatus,
            'payment_method' => fake()->randomElement(['bank_transfer', 'e_wallet', 'credit_card']),
            'booking_status' => $bookingStatus,
            'checked_in_at' => $bookingStatus === 'checked_in' ? fake()->dateTimeBetween('-1 hour', 'now') : null,
            'notes' => fake()->optional()->sentence(),
        ];
    }

    /**
     * Indicate that the reservation is pending.
     */
    public function pending(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'pending',
            'payment_status' => 'pending',
        ]);
    }

    /**
     * Indicate that the reservation is confirmed.
     */
    public function confirmed(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'confirmed',
            'payment_status' => 'paid',
        ]);
    }

    /**
     * Indicate that the reservation is checked in.
     */
    public function checkedIn(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'checked_in',
            'payment_status' => 'paid',
            'checked_in_at' => fake()->dateTimeBetween('-1 hour', 'now'),
        ]);
    }

    /**
     * Indicate that the reservation is completed.
     */
    public function completed(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'completed',
            'payment_status' => 'paid',
        ]);
    }

    /**
     * Indicate that the reservation is cancelled.
     */
    public function cancelled(): static
    {
        return $this->state(fn (array $attributes) => [
            'booking_status' => 'cancelled',
            'payment_status' => 'refunded',
        ]);
    }
}
