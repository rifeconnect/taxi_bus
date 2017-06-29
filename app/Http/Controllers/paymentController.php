<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\payment_method;
use Crypt;

class paymentController extends Controller
{

    public function index()
    {
    	return view('Payment.index');
    }

    public function getPayment(Request $request, $id)
    {
    	$id = Crypt::decrypt($id);
        $chosen_payment_method = payment_method::where('booking_id', $id)->first();
        if (count($chosen_payment_method) > 0 ) {
            if ($request->payment_method != null) 
            {
                $payment_method_id = $chosen_payment_method->id;
                $payment_method_update = payment_method::find($payment_method_id);
                $payment_method_update->payment_method = $request->payment_method;
                $payment_method_update->save();
            }
            else
            {
                session()->flash('payment', "Sorry, you didn't choose a payment method");

                return back();
            }
            
        }
        else{
            $payment_method = new payment_method;
            $payment_method->booking_id = $id;
            $payment_method->payment_method = $request->payment_method;
            $payment_method->save();
        }
        
    	if ($request->payment_method == 1) {
    		return view('Payment.bank_transfer');
    	}
    	elseif ($request->payment_method == 2) {
    		return view('Payment.card_payment');
    	}
    	elseif ($request->payment_method == 3) {
    		return view('Payment.cash');
    	}
    	   session()->flash('payment', "Sorry, you didn't choose a payment method");

    	   return back();

    }
}














