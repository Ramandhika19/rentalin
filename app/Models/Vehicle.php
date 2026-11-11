<?php
namespace App\Models;
class Vehicle extends \Illuminate\Database\Eloquent\Model {protected $fillable=['name','brand','type','year','plate_number','price_per_day','description','image','status'];public function bookings(){return $this->hasMany(Booking::class);}}