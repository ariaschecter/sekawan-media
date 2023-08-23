<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarHistory>
 */
class CarHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'history_pinjam' => fake()->dateTimeBetween('+1 day', '+2 week'),
            'history_kembali' => fake()->dateTimeBetween('+3 week', '+1 month'),
            'history_note' => fake()->name(),
            
        ];
    }
}
