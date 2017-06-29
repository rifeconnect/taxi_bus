<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Driver;
use App\Partner;
use App\automedic;
use DB;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $user = User::find($id);
        $roles = $request->roles;

        DB::table('role_user')->where('user_id', $id)->delete();

        //Array 3 stands for Drivers
        if (in_array('3', $roles)) {

            $driver = Driver::all()->where('user_id', $id);

            if ( count($driver) > 0 ) 
            {
                DB::table('drivers')->where('user_id', $id)->update(['is_active'=>'true']);

                foreach ($roles as $role) 
                {
                    $user->attachRole($role);
                }
                
                session()->flash('user_role_updated', 'User has been added to drivers.');

            return redirect('/admin/search_user');

            }
            else
            {
                //Add user to general_user role
                $user->attachRole(Role::where('name', 'general_user')->first());

                session()->flash('user_role_updated', 'Sorry, User did not apply for the post of a Driver and cannot be added to Drivers.');

            return redirect('/admin/search_user');
            }
        }

        //Array 4 stands Partners
        elseif (in_array('4', $roles)) {

            $partner = Partner::all()->where('user_id', $id);

            if ( count($partner) > 0 ) 
            {
                DB::table('partners')->where('user_id', $id)->update(['is_active'=>'true']);

                foreach ($roles as $role) 
                {
                    $user->attachRole($role);
                }
                
                session()->flash('user_role_updated', 'User has been added to Partners.');

                    return redirect('/admin/search_user');

            }
            else
            {
                //Ensure the user is added to general_user role
                $user->attachRole(Role::where('name', 'general_user')->first());
                session()->flash('user_role_updated', 'Sorry, User did not apply for the post of a Partner and cannot be added to Partners.');

            return redirect('/admin/search_user');
            }
        }

            //Array 5 is for AutoMedics
        elseif (in_array('5', $roles)) {

        $automedic = automedic::all()->where('user_id', $id);

        if ( count($automedic) > 0 ) 
        {
            DB::table('automedics')->where('user_id', $id)->update(['is_accepted'=>'true']);

            foreach ($roles as $role) 
            {
                $user->attachRole($role);
            }
            
            session()->flash('user_role_updated', 'User has been added to automedics.');

        return redirect('/admin/search_user');

        }
        else
        {
            //Add user to general_user role
            $user->attachRole(Role::where('name', 'general_user')->first());

            session()->flash('user_role_updated', 'Sorry, User did not apply for the post of an automedic and cannot be added to AutoMedics.');

            return redirect('/admin/search_user');
            }
        }
        else
        {

            foreach ($roles as $role) 
            {
                $user->attachRole($role);
            }

            session()->flash('user_role_updated', 'User Role has been updated successfully.');

            return redirect('/admin/search_user');
        }
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
