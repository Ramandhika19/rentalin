<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    protected $fillable = ['name', 'type', 'brand', 'plate_number', 'description', 'price_per_day', 'image', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function getIsAvailableAttribute()
    {
        return $this->status === 'available';
    }
}
