<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\CarHistory;
use App\Models\Driver;
use App\Models\Employee;
use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'acc1',
            'email' => 'acc1@gmail.com',
            'role' => 'acc'
        ]);
        User::factory()->create([
            'name' => 'acc2',
            'email' => 'acc2@gmail.com',
            'role' => 'acc'
        ]);
        User::factory()->create([
            'name' => 'acc3',
            'email' => 'acc3@gmail.com',
            'role' => 'acc'
        ]);

        Car::factory()->create(['car_name' => 'L111L']);
        Car::factory()->create(['car_name' => 'L222L']);
        Car::factory()->create(['car_name' => 'L333L']);
        Car::factory()->create(['car_name' => 'L444L']);
        Car::factory()->create(['car_name' => 'L555L']);
        Car::factory()->create(['car_name' => 'L666L']);

        Driver::factory()->create(['driver_name' => 'driver1']);
        Driver::factory()->create(['driver_name' => 'driver2']);
        Driver::factory()->create(['driver_name' => 'driver3']);
        Driver::factory()->create(['driver_name' => 'driver4']);
        Driver::factory()->create(['driver_name' => 'driver5']);

        Employee::factory(10)->create();

        // Order::factory(10)->create();
        // for($i = 1; $i < 10; $i++) {
        //     CarHistory::factory()->create(['order_id' => $i]);
        // }
    }
}
