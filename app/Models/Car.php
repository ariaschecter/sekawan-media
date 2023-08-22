<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function order() {
        return $this->hasMany(CarHistory::class, 'driver_id', 'id');
    }
}
