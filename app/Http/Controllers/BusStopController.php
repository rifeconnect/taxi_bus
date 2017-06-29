<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\city;
use App\State;
use App\bus_stop;
use Auth;

class BusStopController extends Controller
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
        $states = state::all();
        $cities = city::all();
        return view('admin.new_bus_stop', compact('cities', 'states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'address'=>'required:bus_stops',
            'city'=>'required:bus_stops',
            ]);
        $user_id = Auth::id();
        $bus_stop = new bus_stop;
        $bus_stop->user_id = $user_id;
        $bus_stop->city_id = $request->city;
        $bus_stop->address = $request->address;
        $bus_stop->save();
        session()->flash('bus_stop_saved', 'Bus stop was saved successfully.');
        return back();
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
