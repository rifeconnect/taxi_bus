<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehicle_driver extends Model
{
    public function driver()
    {
    	return $this->belongsTo('App\Driver', 'driver_id');
    }

    public function vehicle_details()
    {
    	return $this->belongsTo('App\vehicle', 'vehicle_id');
    }
}
