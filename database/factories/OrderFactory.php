<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->numberBetween(1,10),
            'driver_id' => fake()->numberBetween(1,10),
            'car_id' => fake()->numberBetween(1,3),
            'user_id' => fake()->numberBetween(2,10),
            'order_status' => 'selesai',
        ];
    }
}
