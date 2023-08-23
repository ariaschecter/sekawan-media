<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Car;
use App\Models\Driver;
use App\Models\Employee;
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
            'name' => 'Acielana',
            'email' => 'aria@gmail.com',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'AAAA',
            'email' => 'acc@gmail.com',
            'role' => 'acc'
        ]);

        User::factory(10)->create();
        Car::factory()->create(['car_name' => 'L111L']);
        Car::factory()->create(['car_name' => 'L222L']);
        Car::factory()->create(['car_name' => 'L333L']);
        Car::factory()->create(['car_name' => 'L444L']);
        Car::factory()->create(['car_name' => 'L555L']);

        Driver::factory(10)->create();
        Car::factory(10)->create();
        Employee::factory(10)->create();
    }
}
