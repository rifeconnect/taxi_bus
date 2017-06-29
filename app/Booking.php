<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	/**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];
    
	public function from_state()
	{
		return $this->belongsTo('App\State', 'from_state_id');
	}

	public function to_state()
	{
		return $this->belongsTo('App\State', 'to_state_id');
	}

	public function user_name()
	{
		return $this->belongsTo('App\User', 'user_id');
	}

	public function pickUpCity()
	{
		return $this->belongsTo('App\city', 'pickUpCity_id');
	}

	public function destinationCity()
	{
		return $this->belongsTo('App\city', 'destinationCity_id');
	}

	public function pickUpBusStop()
	{
		return $this->belongsTo('App\bus_stop', 'pickUp_bus_stop_id');
	}

	public function dropOffBusStop()
	{
		return $this->belongsTo('App\us_stop', 'DropOff_bus_stop_id');
	}
}
