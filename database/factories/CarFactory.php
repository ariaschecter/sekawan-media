<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_name' => Str::random(6),
            'car_type' => fake()->randomElement(['orang', 'barang']),
            'car_owner' => fake()->randomElement(['perusahaan', 'Sewa']),
            'car_bbm' => fake()->numberBetween(14, 400),
            'car_service' => fake()->dateTimeBetween('+3 week', '+1 month'),
        ];
    }
}
