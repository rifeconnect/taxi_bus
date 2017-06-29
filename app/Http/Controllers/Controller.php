<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //make sure every user is authenticated.
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function ajaxCall($id)
    {
    	$drivers = Driver::where('state_id', '=', $id)->get();

    	return Response::json($drivers);
    }

}
