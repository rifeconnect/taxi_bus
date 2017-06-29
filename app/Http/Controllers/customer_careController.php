<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\vehicle_driver;
use App\State;
use App\paid_booking;
use App\trip;
use App\person_trip;
use DB;
use Crypt;

class customer_careController extends Controller
{

    public function index()
    { 
        $states = new State;
        $states = State::all('id', 'name');
        $vehicle_drivers = new vehicle_driver;
        $vehicle_drivers = vehicle_driver::all('id', 'driver_id', 'vehicle_id');

        return view('customer_care.index', compact('states','vehicle_drivers'));
    }

    public function viewBooking()
    {
        
    	//Only return bookings that haven't been approved.
        $Bookings = Booking::all()->where('status', 'Not Approved');

    	return view('customer_care.view_bookings',compact('Bookings'));
	
    }

    public function approveBooking(Request $request, $id)
    { 

        $id = Crypt::decrypt($id);

    	$Booking_detail_approve = Booking::find($id);
        $price = $request->price;
        $no_of_passengers = $Booking_detail_approve->no_of_passengers;
        $Booking_price = $price * $no_of_passengers;
        $Booking_detail_approve->price = $Booking_price;
    	$Booking_detail_approve->status = 'Approved';
    	$Booking_detail_approve->save();
    	session()->flash('approved','Booking has been successfully approved.');
    	return redirect('/customer_care/view_bookings');

    }

    public function view_paid_bookings()
    {
        //This will ensure that a booking that has been added to trip will not be readded again.
        $paid_bookings = paid_booking::all()->where('is_assigned_trip', 'false');
        
        $trips = trip::all();
        return view('customer_care.view_paid_bookings', compact('paid_bookings','trips'));
    }

    public function add_booking_to_trip(Request $request, $id)
    {
        $id = Crypt::decrypt($id);

        $paid_booking = paid_booking::find($id);

        $paid_booking->is_assigned_trip = 'true';
        $paid_booking->save();
        
        $person_trip = new person_trip;

        //There is still an error here. Person trip_booking id should store booking_id and not paidbooking_id as it is doing here.
        $person_trip->booking_id = $id;
        $person_trip->trip_id = $request->trip_id;
        $person_trip->save();

        session()->flash('trip_assigned', 'Booking was successfully assigned to trip.');
        return back();
    }

    public function view_trips()
    {
        $trips = trip::all();
        return view('customer_care.view_trips', compact('trips'));
    }
}

































