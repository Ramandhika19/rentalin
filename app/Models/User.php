<?php
namespace App\Models;
class User extends \Illuminate\Foundation\Auth\User {use \Illuminate\Notifications\Notifiable;protected $fillable=['name','email','phone','password','role'];protected $hidden=['password','remember_token'];public function bookings(){return $this->hasMany(Booking::class);}}