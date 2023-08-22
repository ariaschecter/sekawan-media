<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;

    protected $guarded = [''];

    public function history() {
        return $this->hasMany(CarHistory::class, 'driver_id', 'id');
    }
}
