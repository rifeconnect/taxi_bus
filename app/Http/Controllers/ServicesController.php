<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index(){

    	//return view('shuttle_services');
    	return 'shuttle';

    }

    //The Shuttle_Services page
    public function Shuttle_Services(){

    	return view('shuttle_services');

    }

    // The Travel_Services page
    public function Travel_Services(){

    	return view('travel_services');

    }
}
