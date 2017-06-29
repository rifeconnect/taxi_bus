<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class person_trip extends Model
{
    public function booking()
    {
    	return $this->belongsTo('App\Booking', 'booking_id');
    }
    public function trip()
    {
    	return $this->belongsTo('App\trip', 'trip_id');
    }
}
