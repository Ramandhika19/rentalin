<?php

namespace App\\Models;

use Illuminate\\Database\\Eloquent\\Model;
use Illuminate\\Database\\Eloquent\\Relations\\HasMany;

class Vehicle extends Model
{
    protected $fillable = ['name','type','brand','plate_number','description','price_per_day','image','status'];
    public function bookings(): HasMany { return $this->hasMany(Booking::class); }
    public function getIsAvailableAttribute(): bool { return $this->status === 'available'; }
}
