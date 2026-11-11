<?php
namespace App\Models;
class Booking extends \Illuminate\Database\Eloquent\Model {protected $fillable=['user_id','vehicle_id','start_date','end_date','total_days','total_price','status','notes'];public function user(){return $this->belongsTo(User::class);}public function vehicle(){return $this->belongsTo(Vehicle::class);}}