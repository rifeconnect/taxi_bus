<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paid_booking extends Model
{
    public function booking()
    {
    	return $this->belongsTo('App\Booking', 'booking_id');
    }
}
