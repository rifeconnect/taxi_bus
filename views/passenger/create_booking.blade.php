@extends('layouts.app')

@section('title', 'RifePassenger | Create_Booking')

@section('heading', 'Book a Trip')

@section('body')

		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<center class="alert alert-danger" style="font-weight: bold;">{{$error}}</center>
			@endforeach 
		@endif

	   <form class="form-horizontal" action="/booking" method="POST">

	   {{ csrf_field() }}

	  <fieldset>
	    <center><legend>Fill the form below.</legend></center>
	    <div class="form-group">
	      <label for="pickUpState" class="col-lg-2 control-label">Pick Up State:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="pickUpState" id="pickUpState" type="text" required>
	        <option selected disabled>Select departure State</option>
	        	@foreach ($states as $state)
	        	{
	        		<option value="{{$state->id}}">{{$state->name}}</option>
	        	}
	        	@endforeach
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="pickUpCity" class="col-lg-2 control-label">Pick Up City:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="pickUpCity" id="pickUpCity" type="text" required>
	        <option selected disabled>Select Departure City</option>
	        	@foreach ($cities as $city)
	        	{
	        		<option value="{{$city->id}}">{{$city->name}}</option>
	        	}
	        	@endforeach
	        </select> 
	      </div>
	    </div>
	    <div class="alert alert-danger"><center style="font-weight: bold;">If none of the pick up and drop off locations are close to you please contact 07030812136. Thanks. </center></div>
	    <div class="form-group">
	      <label for="no_of_passengers" class="col-lg-2 control-label">Number of Passengers:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="no_of_passengers" id="no_of_passengers" type="text" required>
	        <option selected disabled>How many Passengers?</option>
	        <option value="1">1</option>
	        <option value="2">2</option>
	        <option value="3">3</option>
	        <option value="4">4</option>
	        <option value="5">5</option>
	        <option value="6">6</option>
	        <option value="7">7</option>
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="pickUpBusStop" class="col-lg-2 control-label">Pick Up Address:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="pickUpBusStop" id="pickUpBusStop" required>
	        	<option selected disabled>Pick up Location.</option>
	        	@foreach($bus_stops as $bus_stop)
	        		<option value="{{ $bus_stop->id }}">{{ $bus_stop->address }}</option>
	        	@endforeach
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	    	<label class="col-lg-2 control-label">Pick Up Date:</label>
	    	<div class="col-lg-10">
	    		<input class="form-control" name="pickUpDate" id="date" placeholder="DD/MM/YYYY" type="text" required>
	    	</div>
	    </div>
	    <div class="form-group">
	      <label for="DestinationState" class="col-lg-2 control-label">Destination State:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="destinationState" id="pickUpState" type="text" required>
	        	<option selected disabled>Select arrival State</option>
	        	@foreach ($states as $state)
	        	{
	        		<option value="{{$state->id}}">{{$state->name}}</option>
	        	}
	        	@endforeach
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="DestinationTown" class="col-lg-2 control-label">Destination City:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="destinationCity" id="DestinationTown" required>
	        <option selected disabled>Select destination City</option>
	        	@forelse ($cities as $city)
	        	{
	        		<option value="{{$city->id}}">{{$city->name}}</option>
	        	}
	        	@empty
	        		<option>Sorry, no city was found.</option>
	        	@endforelse
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="dropOffBusStop" class="col-lg-2 control-label">Destination Address:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="dropOffBusStop" id="dropOffBusStop" required>
	        	<option selected disabled>Drop off Location</option>
	        	@foreach($bus_stops as $bus_stop)
	        		<option value="{{ $bus_stop->id }}">{{ $bus_stop->address }}</option>
	        	@endforeach
	        </select>
	      </div>
	     </div>
	     <div class="form-group">
	     	<label for="mobileNo" class="col-lg-2 control-label">Your Mobile No:</label>
	     	<div class="col-lg-10">
	     		<input class="form-control" placeholder="Your active mobile number" type="text" name="mobileNo" required>
	     	</div>
	     </div>
	     	<div class="alert alert-danger">
	     		<center style="font-weight: bold;">PLEASE BE FULLY AWARE YOUR TRIP IS NOT CONFIRMED WITHOUT YOUR PAYMENT CONFIRMATION.</center>
	     	</div>
	     	<center>
	    <div class="form-group"><br>
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-danger">Cancel</button>
	        <button type="submit" class="btn btn-success">Submit</button>
	      </div>
	    </div></center>
	  </fieldset>
	</form>
@endsection