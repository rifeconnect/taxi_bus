<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewTripController extends Controller
{
	
    public function myTrips()
    {
    	//Return a list of my trips.
    	return view('trips.myTrips');
    }

    public function availableTrips()
    {
    	//Return a list of all available trips.
    	return view('trips.availableTrips');
    }
}
