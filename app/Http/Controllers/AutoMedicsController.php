<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Crypt;
use App\vehicle;
use App\State;
use App\User;
use App\age_group;
use App\automedic;


class AutoMedicsController extends Controller
{
    public function index()
    {
    	return view('automedics.index');
    }

    public function register()
    {
        // This code Checks to see if you are already registered as an automedic.
        $user_id = Auth::id();
        $registered_automedic = automedic::all()->where('user_id',$user_id);
        if (count($registered_automedic) > 0 ) {
            
            session()->flash('automedic_re-register', 'You are a registered automedic and cannot re-register. Thanks.');
            return back();
        }
        else{
            $age_groups = age_group::all();

            $user_name = Auth::user()->name;
            $states = State::all();
            return view('automedics.register', compact('states', 'user_name', 'age_groups'));
        }
    }

    public function accept_registration(Request $request)
    {
        //Update the user name on the users table.
        $user_id = Auth::id();
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->save();

        $this->validate($request,[
            'user_id'=>'unique:automedics',
            'name'=>'required:users',
            'specialization'=>'required:automedics',
            'state'=>'required:automedics',
            'sex'=>'required:automedics',
            'address'=>'required:partners',
            'age_group'=>'required:partners',
            'phone_no'=>'required:partners',
            ]);

        $automedic = new automedic;
        $automedic->user_id = $user_id;
        $automedic->state_id = $request->state;
        $automedic->address = $request->address;
        $automedic->age_group_id = $request->age_group;
        $automedic->specialization = $request->specialization;
        $automedic->phone_no = $request->phone_no;
        $automedic->save();

        session()->flash('automedic_registered', 'Congrats!!! Your registration has been submitted successfully, you will be contacted soon.');
        return redirect('/automedics');

    }

    public function activate_vehicle($id)
    {
        $id = Crypt::decrypt($id);

        $activate_vehicle = vehicle::find($id);
        $activate_vehicle->is_active = 'true';
        $activate_vehicle->save();
        session()->flash('vehicle_activated', 'Vehicle has been activated successfully.');
    	return redirect('/automedics');
    }

    public function search_details(Request $request)
    {
    	$registration_no = $request->input('registration_no');

    	$status_count = DB::table('vehicles')
    				->select('registration_no', 'is_approved')
    				->where([
    					['registration_no','=',$registration_no],
    					['is_approved','=','Approved'],
    					])
    				->distinct()
    				->count();

    		if ($status_count > 0) 
    		{
                $vehicle_details = DB::table('vehicles')
                                    ->where('registration_no', $registration_no)
                                    ->get();
                
    			     return view('automedics.vehicle_details', compact('vehicle_details'));

    		}
    		session()->flash('vehicle_not_found', 'Vehicle '.$registration_no.' is either not registered or not approved!');
    		return view('automedics.view_vehicle_status');
    }
}






























