@extends('layouts.app')

@section('title', 'RifePassenger | Booking_Details')

@section('heading','Booking Details')

    @section('body')

     @if(session()->has('payment'))
          <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('payment')}}</center>
        @endif

           <div class="table-responsive">
           <center><p class="alert alert-warning" style="font-weight: bold;">Please note that you can only proceed to payment after your booking has been approved.</p></center>
           		<table cellpadding="10px" class="table table-bordered table-hover table-striped">
               		<tr><td>
               				Departure State:
               			<span class="pull-right">{{$Booking->from_state->name}}</span></td>
               		</tr>
               		<tr><td>
               			Departure Address:
               			<span class="pull-right">{{$Booking->pickUpAdd}}</span></td>
               		</tr>
               		<tr><td>
               			Departure Date:
               			<span class="pull-right">{{$Booking->pickUpDate}}</span></td>
               		</tr>
               		<tr><td>
               			Destination State:
               			<span class="pull-right">{{$Booking->to_state->name}}</span></td>
               		</tr>
               		<tr><td>
               			Exact Destination:
               			<span class="pull-right">{{$Booking->destination}}</span></td>
               		</tr>
                  <tr><td>No of Passengers<span class="pull-right">{{$Booking->no_of_passengers}}</span></td></tr>
                   <tr><td style="font-weight: bold;">Price <span class="pull-right">NGN {{$Booking->price}}</span></td></tr>
               		<tr><td style="font-weight: bold;">
               			Approval Status
               			<span class="pull-right">{{$Booking->status}}</span></td>
               		</tr>
               		<tr><td><a href="/booking" class="btn btn-info">Back</a><span id="payment_span" class="pull-right">
                   @if ($Booking->status == "Not Approved")</span>

                    <label class="btn btn-danger">Please wait for approval.</label>

                    @elseif ($Booking->status == "Approved")
                      @if($pay == "dont_pay")
                        <label class="btn btn-success">Your trip details will soon be ready.</label>
                      @else
                        <button type="button" id="payment_btn" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">Choose Payment Method</button>
                      @endif

                    @endif
                    </td>
               		</tr>
               	</table>
           </div>



           <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Payment Method</h4>
          </div>
          <div class="modal-body">
              <form action="{{ route('booking.payment', Crypt::encrypt($Booking->id)) }}" method="post" id="payment-form">
                {{csrf_field()}}
                <div class="form-group">
                  <select name="payment_method" >
                    <option value="">Choose Payment Method</option>
                    <option value="1">Bank Transfer</option>
                    <option value="2">Card Payment</option>
                    <option value="3">Cash at Pick Up Point</option>
                  </select>
                </div>
              </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="$('#payment-form').submit()">Proceed to Payment</button>
          </div>
        </div>
      </div>
    </div>

    @endsection