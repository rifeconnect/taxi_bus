<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\State;
use App\Booking;
use App\paid_booking;
use App\person_trip;
use App\city;
use App\bus_stop;
use DB;
use Auth;
use Crypt;

class BookingController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $userid = Auth::id();
        $Bookings = Booking::all()->where('user_id', $user_id);
        return view('passenger.view_booking',compact('Bookings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $states = State::all();
        $cities = city::all();
        $bus_stops = bus_stop::all();

        return view('passenger.create_booking', compact('states', 'cities', 'bus_stops'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request)->all();
         $this->validate($request,[
            'pickUpState'=>'required:bookings',
            'pickUpCity'=>'required:bookings',
            'no_of_passengers'=>'required:bookings',
            'pickUpBusStop'=>'required:bookings',
            'pickUpDate'=>'required:bookings',
            'destinationState'=>'required:bookingss',
            'destinationCity'=>'required:bookings',
            'dropOffBusStop'=>'required:bookings',
            'mobileNo'=>'required:bookings',
            ]);
        
        $Booking = new Booking;
        $userid = Auth::id();
        $Booking->user_id = $userid;
        $Booking->from_state_id = $request->pickUpState;
        $Booking->pickUpCity_id = $request->pickUpCity;
        $Booking->no_of_passengers = $request->no_of_passengers;
        $Booking->pickUp_bus_stop_id = $request->pickUpBusStop;
        $Booking->pickUpDate = $request->pickUpDate;
        $Booking->to_state_id = $request->destinationState;
        $Booking->destinationCity_id = $request->destinationCity;
        $Booking->DropOff_bus_stop_id =$request->dropOffBusStop;
        $Booking->mobileNo = $request->mobileNo;
        $Booking->save();
        session()->flash('message','Booking was submitted successfully');
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $id = Crypt::decrypt($id);
        $paid_booking = paid_booking::where('booking_id', $id)->first();
        if (count($paid_booking) > 0) {
            //This will check to see if the booking has been added to a trip.
            $person_trip = person_trip::where('booking_id', $id)->first();
            if (count($person_trip) > 0) {     
                //This will get the trip details.
                return view('passenger.trip_details', compact('person_trip'));
            }
            else
            {
                $pay = 'dont_pay';
                $Booking = Booking::find($id);
                return view('passenger.view_booking_details',compact('Booking', 'pay'));
            }
        }
        else
        {
            $pay = 'pay';
            $Booking = Booking::find($id);
            return view('passenger.view_booking_details',compact('Booking', 'pay'));
        }            
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
