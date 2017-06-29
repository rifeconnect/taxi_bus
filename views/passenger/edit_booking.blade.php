@extends('layouts.app')

@section('title', 'RifePassenger | Edit Booking')

@section('heading', 'Edit Your Booking')

@section('content')

       <form class="form-horizontal" action="/booking" method="POST">

       {{ csrf_field() }}

	  <fieldset>
	    <center><legend>Fill the form below.</legend></center>
	    <div class="form-group">
	      <label for="Country" class="col-lg-2 control-label">Pick a Country:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="country" id="Country" type="text">
	        	<option value="">Choose a country</option>
	        	<option value="Nigeria">Nigeria</option>
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="pickUpState" class="col-lg-2 control-label">Pick Up State:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="pickUpState" id="pickUpState" type="text">
	        <option value="">Select departure State</option>
	        	@foreach ($states as $state)
	        	{
	        		<option value="{{$state->id}}">{{$state->name}}</option>
	        	}
	        	@endforeach
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="pickUpAdd" class="col-lg-2 control-label">Pick Up Address:</label>
	      <div class="col-lg-10">
	        <input class="form-control" name="pickUpAdd" id="pickUpAdd" placeholder="Exact Pickup Address" type="text" required value="{{$Booking->pickUpAdd}}">
	      </div>
	    </div>
	    <div class="form-group">
	    	<label class="col-lg-2 control-label">Pick Up Date:</label>
	    	<div class="col-lg-10">
	    		<input class="form-control" name="pickUpDate" id="date" placeholder="DD/MM/YYYY" type="text" required value="{{$Booking->pickUpDate}}">
	    	</div>
	    </div>
	    <div class="form-group">
	      <label for="DestinationState" class="col-lg-2 control-label">Destination State:</label>
	      <div class="col-lg-10">
	        <select class="form-control" name="destinationState" id="pickUpState" type="text">
	        	<option value="{{$Booking->to_state_id}}">{{$Booking->to_state_id}}</option>
	        	<option value="">Select arrival State</option>
	        	@foreach ($states as $state)
	        	{
	        		<option value="{{$state->id}}">{{$state->name}}</option>
	        	}
	        	@endforeach
	        </select> 
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="destinationAdd" class="col-lg-2 control-label">Destination Address:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="destinationAdd" placeholder="Exact Destination Address" type="text" name="destinationAdd" required value="{{$Booking->destination}}">
	      </div>
	     </div>
	     <div class="form-group">
	     	<label for="mobileNo" class="col-lg-2 control-label">Your Mobile No:</label>
	     	<div class="col-lg-10">
	     		<input class="form-control" placeholder="Your active mobile number" type="text" name="mobileNo" required value="{{$Booking->mobileNo}}">
	     	</div>
	     </div>
	     	<div class="alert alert-danger">
	     		<center style="font-weight: bolder;">PLEASE BE FULLY AWARE YOUR BOOKING IS INCOMPLETE WITHOUT YOUR PAYMENT CONFIRMATION.</center>
	     	</div>
	    <div class="form-group"><br>
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>

@endsection