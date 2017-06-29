@extends('layouts.app')

@section('title', 'RifePartner | Submit Bus')

@section('heading', 'Submit Bus')

@section('body')

   <form class="form-horizontal" method="POST" action="/partner/submit_bus">
   	{{csrf_field()}}
	  <fieldset>
	    <legend>Please Fill the form</legend>
	    <div class="form-group">
	      <label for="state" class="col-lg-2 control-label">Vehicle location</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="state" required name="state">
	          <option selected disabled>Which state is your vehicle?</option>
	          @foreach($states as $state)
	          	<option value="{{$state->id}}">{{$state->name}}</option>
	          @endforeach
	        </select>
	        <br>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputMake" class="col-lg-2 control-label">Vehicle Make:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputMake" placeholder="Vehicle Make e.g( toyota...)" type="text" name="make" required>
	      </div>
	     </div>
	     <div class="form-group">
	      <label for="inputModel" class="col-lg-2 control-label">Vehicle Model:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputModel" placeholder="Vehicle Model e.g( sienna, hiace, previa...)" type="text" name="model">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputYear" class="col-lg-2 control-label">Vehicle Year:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputYear" placeholder="Vehicle Year" type="text" name="year" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputPassenger" class="col-lg-2 control-label">Number of Passengers:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputPassenger" placeholder="Number of Passenger" type="text" name="no_of_passengers" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputRegistration" class="col-lg-2 control-label">Vehicle Registration Number:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputRegistration" placeholder="Vehicle Registration Number" type="text" name="registration_no" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputPhone" class="col-lg-2 control-label">Phone Number:</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputPhone" placeholder="Phone Number" type="text" name="phone_no" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-danger">Cancel</button>
	        <button type="submit" class="btn btn-success">Submit</button>
	      </div>
	    </div>
	  </fieldset>
	</form>

		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<center class="alert alert-danger" style="font-weight: bold;">{{$error}}</center>
			@endforeach 
		@endif

@endsection