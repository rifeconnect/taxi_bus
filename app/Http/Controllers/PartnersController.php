<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\State;
use App\vehicle;
use App\Partner;
use App\User;
use App\age_group;
use App\account_detail;
use Crypt;
use DB;
use Auth;


class PartnersController extends Controller
{

    public function index()
    {
        $user_id = Auth::id();
        $account_details = account_detail::where('user_id', $user_id)->get();
        //return $account_details;
    	return view('Partner.index', compact('account_details'));
    }

    public function register()
    {
        $user_id = Auth::id();
        $registered_partner = Partner::all()->where('user_id', $user_id);
        if (count($registered_partner) > 0 ) {

            session()->flash('partner_re-register', 'Sorry, your partnership request was submitted. You need not re-register. Thank you.');

            return back();
                    
        }
        else{
            
            $age_groups = age_group::all();
            $user_name = Auth::user()->name;
            $states = State::all();
        	return view('Partner.register', compact('states', 'user_name', 'age_groups'));
        }
    }

    public function register_partner(Request $request)
    {
        $user_id = Auth::id();
        $partner = new Partner;
        $this->validate($request,[
            'user_id'=>'unique:partners',
            'name'=>'required:users',
            'occupation'=>'required:partners',
            'state'=>'required:partners',
            'sex'=>'required:partners',
            'address'=>'required:partners',
            'age_group'=>'required:partners',
            'phone_no'=>'required:partners',
            ]);
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->save();

        $partner->user_id = $user_id;
        $partner->state_id = $request->state;
        $partner->occupation = $request->occupation;
        $partner->sex = $request->sex;
        $partner->address = $request->address;
        $partner->age_group_id = $request->age_group;
        $partner->phone_no = $request->phone_no;
        $partner->save();
        session()->flash('partner', 'Thanks, your Partnership request has been submitted! You will be contacted soon.');

        return redirect('/partner');   
    }

    public function submit_bus()
    {
        $states = State::all();
        return view('Partner.submit_bus', compact('states'));
    }

    //Receive vehicle registration
    public function accept_vehicle_registration(Request $request)
    {
        $user_id = Auth::id();
    	$vehicles = new vehicle;
        $this->validate($request,[
            'state'=>'required:vehicles',
            'registration_no'=>'required|unique:vehicles',
            'make'=>'required:vehicles',
            'model'=>'required:vehicles',
            'year'=>'required:vehicles',
            'no_of_passengers'=>'required:vehicles',
            'phone_no'=>'required:vehicles',
            ]);
        $vehicles->user_id = $user_id;
        $vehicles->state_id = $request->state;
        $vehicles->registration_no = $request->registration_no;
        $vehicles->make = $request->make;
        $vehicles->model = $request->model;
        $vehicles->year = $request->year;
        $vehicles->no_of_passengers = $request->no_of_passengers;
        $vehicles->phone_no = $request->phone_no;
        $vehicles->save();
        session()->flash('vehicle', 'Thanks, your vehicle submission has been received! You will be contacted soon.');

        return redirect('/partner');
    }

    //To view vehiclee application status
    public function view_vehicle_application()
    {
        $user_id = Auth::id();
        $vehicles = Vehicle::all()->where('user_id', '=', $user_id);
        
        return view('Partner/view_vehicle_application', compact('vehicles'));
    }

    public function vehicles()
    {
        $user_id = Auth::id();
        $partner_vehicles = vehicle::where('user_id', $user_id)->get();
        return view('Partner.vehicles', compact('partner_vehicles'));
    }

    public function vehicle_trips($id)
    {
        $id = Crypt::decrypt($id);
        return view('Partner.vehicle_trips');
    }
}






































