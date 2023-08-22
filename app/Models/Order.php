<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function driver() {
        return $this->belongsTo(Driver::class, 'driver_id', 'id');
    }

    public function employee() {
        return $this->belongsTo(Employee::class, 'employee_id', 'id');
    }

    public function car() {
        return $this->belongsTo(Car::class, 'car_id', 'id');
    }
}
