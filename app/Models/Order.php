<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory, LogsActivity;

    protected $guarded = [''];

    protected static $logName = 'Order';
    protected static $logUnguarded = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function getDescriptionForEvent(string $eventName): string
    {
        $name = $this->name ?? 'System';
        $authUser = Auth::user()->name ?? 'System';
        return $name . " {$eventName} Oleh: " . $authUser;
    }

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
