<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransportService>
 */
class TransportServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $type = fake()->randomElement(['bus', 'shuttle', 'travel']);
        $routeFrom = fake()->city();
        $routeTo = fake()->city();

        return [
            'code' => strtoupper(fake()->bothify('TS???-####')),
            'name' => $type . ' Service from ' . $routeFrom . ' to ' . $routeTo,
            'type' => $type,
            'route_from' => $routeFrom,
            'route_to' => $routeTo,
            'departure_time' => fake()->time('H:i:s'),
            'arrival_time' => fake()->time('H:i:s'),
            'capacity' => fake()->numberBetween(20, 60),
            'price' => fake()->randomElement([100000, 150000, 200000, 250000, 300000, 500000]),
            'facilities' => implode(', ', fake()->randomElements(['AC', 'WiFi', 'Charging Port', 'Toilet', 'TV', 'Reclining Seats'], 3)),
            'description' => fake()->sentence(10),
            'is_active' => fake()->boolean(90), // 90% chance of being active
            'image' => null,
        ];
    }

    /**
     * Indicate that the transport service is a bus.
     */
    public function bus(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'bus',
        ]);
    }

    /**
     * Indicate that the transport service is a shuttle.
     */
    public function shuttle(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'shuttle',
        ]);
    }

    /**
     * Indicate that the transport service is a travel.
     */
    public function travel(): static
    {
        return $this->state(fn (array $attributes) => [
            'type' => 'travel',
        ]);
    }

    /**
     * Indicate that the transport service is inactive.
     */
    public function inactive(): static
    {
        return $this->state(fn (array $attributes) => [
            'is_active' => false,
        ]);
    }
}
