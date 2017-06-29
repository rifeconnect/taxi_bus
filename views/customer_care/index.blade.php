@extends('layouts.app')

@section('title', 'RifeCare | Home')

@section('heading','Customer Care Home')

@section('body')
		@if(session()->has('trip_created'))
          <center class="alert alert-success" style="font-weight: bold;">{{session()->get('trip_created')}}</center>
        @endif

	<p>You are welcome to the Customer Care Home Page. Please choose from the options below to proceed.</p>
	<p>
		<ol>
		    <li><a href="/customer_care/view_bookings">View Bookings</a></li>
		    <li><a href="#new_trip_modal" data-toggle="modal" data-target="#new_trip_modal">Start a trip</a></li>
		    <li><a href="/customer_care/view_paid_bookings">View Paid Bookings</a></li>
		    <li><a href="/customer_care/view_trips">View Trips</a></li>
		</ol>
	</p>

	 <!-- Modal -->
			<div class="modal fade" id="new_trip_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">New Trip Form</h4>
			      </div>
			      <div class="modal-body">
			      	  <form class="form-horizontal" method="post" action="{{route('trip.store')}}" id="new_trip_form">
			      	  {{csrf_field()}}
					  <fieldset>
					    <legend>Fill the Form</legend>
					    <div class="form-group">
					      <label for="pickUpState" class="col-lg-2 control-label">Departure State:</label>
					      <div class="col-lg-10">
					        <select class="form-control" name="departure_state" id="departure_state" type="text" required>
					        <option disabled selected="selected">Select Departure State</option>
					        	@forelse ($states as $state)
					        		<option value="{{$state->id}}">{{$state->name}}</option>
					        	@empty
					        		<option>No State was found.</option>
					        	@endforelse
					        </select> 
					      </div>
					    </div>
					    <div class="form-group">
					      <label for="pickUpState" class="col-lg-2 control-label">Destination State:</label>
					      <div class="col-lg-10">
					        <select class="form-control" name="arrival_state" id="pickUpState" type="text" required>
					        <option disabled selected="selected">Select Destination State</option>
					        	@foreach ($states as $state)
					        		<option value="{{$state->id}}">{{$state->name}}</option>
					        	@endforeach
					        </select> 
					      </div>
					    </div>
					     <div class="form-group">
					      <label for="inputDate" class="col-lg-2 control-label">Departure Date</label>
					      <div class="col-lg-10">
					        <input class="form-control" id="inputDate" placeholder="Enter Departure Date" type="text" required autofocus name="departure_date">
					      </div>
					    </div>
					     <div class="form-group">
					      <label for="inputState" class="col-lg-2 control-label">Trip Price</label>
					      <div class="col-lg-10">
					        <input class="form-control" placeholder="Enter trip price" type="text" required autofocus name="trip_price" id="inputPrice">
					      </div>
					    </div>
					  </fieldset>
					</form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-success" onclick="$('#new_trip_form').submit()">Submit</button>
			      </div>
			    </div>
			  </div>
			</div>
	 
@endsection

