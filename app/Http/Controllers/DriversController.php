<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\Driver;
use App\User;
use App\age_group;
use App\trip;
use App\person_trip;
use App\vehicle_driver;
use App\account_detail;
use App\interview_invitation;
use App\city;
use Auth;
use Crypt;

class DriversController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
        $user_applied = Driver::where('user_id', $user_id)->first();

        if (count($user_applied) > 0) {
            //This code checks if the user applied for the post of a driver
            $driver_interview = interview_invitation::where('user_id', $user_id)->first();
            return view('Driver.index', compact('user_applied', 'driver_interview'));
        }
        else{
            return view('Driver.index', compact('user_applied'));
        }
       
        //return view('Driver.index');
    	
    }

    public function register()
    {
        $user_id = Auth::id();
        $registered_driver = Driver::all()->where('user_id', $user_id);
        if (count($registered_driver) > 0 ) {

            session()->flash('driver_re-register', 'Your registration was submitted. You dont need to re-register. Thank you.');

            return back();
                    
        }
        else{
            $age_groups = age_group::all();
            $name = Auth::user()->name;

            $states = new State;
            $states = State::all('id', 'name');
        	return view('Driver.register', compact('states', 'name', 'age_groups'));
        }
    }

    public function AcceptRegistration(Request $request)
    {
        $user_name = Auth::user()->name;
        $user_id = Auth::id();

        $user = User::find($user_id);
        $user->name = $request->name;
        $user->save();

        $new_driver = new Driver;
        $new_driver->user_id = $user_id;
        $new_driver->address = $request->address;
        $new_driver->age_group_id = $request->age_group;
        $new_driver->years_of_experience = $request->experience;
        $new_driver->state_id = $request->state;
        $new_driver->phone_no = $request->phone_no;
        $new_driver->save();
        session()->flash('driver_registered', 'Congrats, Your Application has been received! We will get back to you.');
        return redirect('/driver');
    }

    public function vehicle_details()
    {
        //This can allow drivers to complain about their vehicle in the quest to request another one.

        $user_id = Auth::id();
        $driver = driver::where('user_id', $user_id)->get();
        $driver_id = $driver[0]['id'];

        $vehicle_driver = vehicle_driver::where('driver_id', $driver_id)->first();
        //return $vehicle_driver;
        return view('Driver.your_vehicle_details', compact('vehicle_driver'));
    }

    public function view_trips()
    {
        //Check if the driver has a vehicle before he can view trips.
        $user_id = Auth::id();
        $driver = Driver::where('user_id', $user_id)->first();
        $driver_id = $driver->id;
        $vehicle_driver = vehicle_driver::where('driver_id', $driver_id)->get();
        if (count($vehicle_driver) > 0) 
        {
            $trips = trip::all()->where('vehicle_driver_id', null);
            return view('Driver.view_trip', compact('trips'));
        }
        else{
            session()->flash('dont_have_vehicle', 'When you get your vehicle, you will be able to view the available trips.');
            return back();
        }
        
    }

    public function view_trip_details($id)
    {
        $id = Crypt::decrypt($id);
        $trip_details = trip::find($id);
        $passenger_bookings = trip::find($id)->trip_bookings;
        return view('Driver.trip_details', compact('passenger_bookings'));
    }

    public function accept_trip($id)
    {
        $id = Crypt::decrypt($id);
        $user_id = Auth::id();

        $driver = driver::where('user_id', $user_id)->get();
        $driver_id = $driver[0]['id'];

        $vehicle_driver = vehicle_driver::where('driver_id', $driver_id)->get();
        $vehicle_driver_id = $vehicle_driver[0]['id'];
        
        $trip = trip::find($id);
            $trip->vehicle_driver_id = $vehicle_driver_id;
            $trip->save();
            session()->flash('trip_taken', 'You have accepted the trip.');
            return redirect('/driver');
    }

    public function view_your_trips()
    {
        $user_id = Auth::id();

        $driver = driver::where('user_id', $user_id)->get();
        $driver_id = $driver[0]['id'];

        $vehicle_driver = vehicle_driver::where('driver_id', $driver_id)->get();

        if (count($vehicle_driver) > 0) 
        {
            $vehicle_driver_id = $vehicle_driver[0]['id'];

            $driver_trips = trip::where('vehicle_driver_id', $vehicle_driver_id)->get();

            return view('Driver.view_your_trips', compact('driver_trips'));
        }
        else
        {
            session()->flash('no_trip', "Sorry, you haven't taken any trip yet.");
            return back();
        }
            
    }
        
}



























