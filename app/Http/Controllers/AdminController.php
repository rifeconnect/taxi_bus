<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Country;
use App\State;
use App\Driver;
use App\vehicle;
use App\vehicle_driver;
use App\User;
use App\Role;
use App\partner;
use App\interview_centre;
use App\interview_invitation;
use App\account_detail;
use App\city;
use DB;
use Crypt;

class AdminController extends Controller
{

    //Ensure this is only accessible to admins
     public function __construct()
    {
        $this->middleware('role:admin')->only('create');
    }

    // Functions to return the Admin Pages
    public function index()
    {
    	return view('admin.index');
    }

    public function new_country()
    {
    	return view('admin.new_country');
    }

    public function new_state()
    {
        $countries = Country::all('id', 'name');
    	return view('admin.new_state',compact('countries'));
    }

    public function new_city()
    {
        $states = State::all();
        return view('admin.new_city', compact('states'));
    }

    public function new_bus_stop()
    {
        $states = State::all();
        return view('admin.new_bus_stop', compact('states'));
    }

    public function new_vehicle_driver()
    {

        $vehicles = Vehicle::where([
                    ['is_active','true'], 
                    ['is_assigned','false'],
                    ])
                    ->get();

        $drivers = driver::where([
                    ['is_assigned_vehicle', 'false'],
                    ['is_active', 'true'],
                    ])
                    ->get();

        $states = State::all('id', 'name');
    	return view('admin.new_vehicle_driver', compact('states','drivers', 'vehicles'));

    }

    public function view_partners_applicants()
    {
        $interested_partners = Partner::where('is_active', 'false')->get();
        return view('admin.view_partners_applicants', compact('interested_partners'));
    }

    public function accept_partner($id)
    {
        $id = Crypt::decrypt($id);
        $partner = Partner::find($id);
        $partner_user_id = $partner->user_id;
        $user = User::find($partner_user_id);

        //Delete the former role which is general_user for everyone
        DB::table('role_user')->where('user_id', $user->id)->delete();

        //Activate the partner.
        DB::table('partners')->where('id', $id)->update(['is_active'=>'true']);

        $user->attachRole(Role::where('name', 'partner')->first());

        session()->flash('partner_accepted', 'Partner has been accepted.');

        return back();
    }

    public function delete_partner($id)
    {
        $id = Crypt::decrypt($id);
        return 'this is the delete method';
    }


    //Function to store request from admin.

    public function store_country(Request $request)
    {
        $country = new Country;
        $this->validate($request, [
            'name'=>'required|unique:countries',
            ]);
        $country->name = $request->name;
        $country->save();
        session()->flash('message', 'Country was successfully added!');
        
        return redirect('/admin');
    }

     public function store_state(Request $request)
    {
        $state = new State;
        $this->validate($request, [
            'name'=>'required|unique:states',
            'country'=>'required:states',
            ]);
        $state->name = $request->name;
        $state->country_id = $request->country;
        $state->save();
        session()->flash('message', 'State was successfully added!');

        return redirect('/admin');
    }

    public function store_city(Request $request)
    {
        $city = new City;
        $this->validate($request, [
            'name'=>'required|unique:cities',
            'state'=>'required:cities'
            ]);
        $city->name = $request->name;
        $city->state_id = $request->state;
        $city->save();
        session()->flash('city_saved', 'City was successfully added!');

        return back();
    }

    public function assign_vehicle_driver(Request $request)
    {
        $vehicle_id = $request->vehicle;
        $vehicle = vehicle::find($vehicle_id);
        $vehicle->is_assigned = 'true';
        $vehicle->save();

        $driver_id = $request->driver;
        $driver = Driver::find($driver_id);
        $driver->is_assigned_vehicle = 'true';
        $driver->save(); 

        $vehicle_driver = new vehicle_driver;
        $vehicle_driver->driver_id = $request->driver;
        $vehicle_driver->vehicle_id = $request->vehicle;
        $vehicle_driver->save();

        session()->flash('vehicle_assigned', 'Vehicle assignment was successful.');

        return back();
    }

    public function view_submitted_vehicles()
    {
        $vehicles = vehicle::all()->where('is_approved', '=', 'Not Approved Yet');

            return view('admin.view_submitted_vehicles', compact('vehicles'));
    }

    public function approve_vehicle_for_inspection($id)
    {
        $id = Crypt::decrypt($id);

        $approve_vehicle = vehicle::find($id);
        $approve_vehicle->is_approved = 'Approved';
        $approve_vehicle->save();

        session()->flash('message','Vehicle has been approved.');

        return redirect('/admin/submitted_vehicles');
    }

    public function searchUserDetail()
    {
        return view('admin.search_user');
    }

    public function getUserDetails()
    {
        $keyword = Input::get('keyword', '');
        $user_details = User::SearchUserDetails($keyword)->get();
        $roles = Role::all();   

        if (count($user_details) > 0 ) {
            
            return view('admin.user_detail', compact('user_details', 'roles'));
        }
        else{
            session()->flash('not_found', 'Details not found, Please search again...');
            return back();
        }
    }

    public function view_driver_applicants()
    {
        $interview_centres = interview_centre::all();

        $driver_applicants = Driver::all()->where('is_invited', 'false');
        return view('admin.driver_applicants', compact('driver_applicants', 'interview_centres'));
    }

    public function invite_driver(Request $request, $id)
    {
        $id = Crypt::decrypt($id);
        //This is the code to send an invitation to the driver.
        $driver = Driver::find($id);
        $driver->is_invited = 'true';
        $driver->save();

        $driver_interview = new interview_invitation;
        $Driver = Driver::find($id);
        $driver_interview->user_id = $Driver->user_id;
        $driver_interview->interview_centre_id = $request->interview_centre;
        $driver_interview->interview_date = $request->interview_date;
        $driver_interview->save();

        session()->flash('driver_invited', 'The invitation was successful.');
        return back();

    }

    public function search_account_details()
    {
        return view('admin.search_account_details');
    }

    public function account_details()
    {

        $keyword = Input::get('keyword', '');
        $account_details = account_detail::SearchAccountDetails($keyword)->get();   

        if (count($account_details) > 0 ) {
            
            return view('admin.account_details', compact('account_details'));
        }
        else{
            session()->flash('not_found', 'Details not found, Please search again...');
            return back();
        }
        
    }

    public function delete_driver_application($id)
    {
        //This will delete the application
        $id = Crypt::decrypt($id);
        DB::table('drivers')->where('id', $id)->delete();
        session()->flash('driver_application_deleted', 'Driver Application deleted.');
        return back();
    }

}
































