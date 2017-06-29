<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\account_detail;
use DB;
use Crypt;

class AccountDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if user's account details was iniatially present.
        $user_id = Auth::id();
        $user_account_details = account_detail::all()->where('user_id', $user_id);

        if (count($user_account_details) > 0) { 

            return redirect()->route('account_details.edit', Crypt::encrypt($user_id));

        }
        return view('account_details.create');
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
        $account_detail = new account_detail;
        $account_detail->user_id = $user_id;
        $account_detail->bank_name = $request->bank_name;
        $account_detail->account_name = $request->account_name;
        $account_detail->account_number = $request->account_number;
        $account_detail->save();

        session()->flash('account_saved', 'Your account details was successfully saved.');
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
        $id = Crypt::decrypt($id);
        $account_details = account_detail::all()->where('user_id', $id);

        return view('account_details.edit',compact('account_details'));
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
        $id = Crypt::decrypt($id);
        $account_details = account_detail::find($id);
        $account_details->bank_name = $request->bank_name;
        $account_details->account_name = $request->account_name;
        $account_details->account_number = $request->account_number;

        session()->flash('account_updated', 'Your account details have been updated successfully.');

        return redirect('/home');

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
