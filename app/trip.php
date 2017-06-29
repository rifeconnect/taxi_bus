<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class trip extends Model
{
    public function departure_state()
    {
    	return $this->belongsTo('App\State', 'departure_state_id');
    }

    public function arrival_state()
    {
    	return $this->belongsTo('App\State', 'arrival_state_id');
    }

    public function booking()
    {
    	return $this->belongsTo('App\Booking', 'booking_id');
    }

    public function trip_bookings()
    {
    	return $this->hasMany('App\person_trip', 'trip_id');
    }
    public function vehicle_driver()
    {
        return $this->belongsTo('App\vehicle_driver', 'vehicle_driver_id');
    }
}
