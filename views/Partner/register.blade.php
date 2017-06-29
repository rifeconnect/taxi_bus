@extends('layouts.app')

@section('title', 'Become a Partner')

@section('heading', 'Become a Partner')

@section('body')

		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<center class="alert alert-danger" style="font-weight: bold;">{{$error}}</center>
			@endforeach 
		@endif

   <form class="form-horizontal" method="POST" action="{{ route('partner.register') }}">
   	{{csrf_field()}}
	  <fieldset>
	    <legend>Please Fill the form</legend>
	    <div class="form-group">
	      <label for="inputName" class="col-lg-2 control-label">Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputName" placeholder="Enter Your Name" type="text" name="name" required value="{{$user_name}}">
	        <br>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputOccupation" class="col-lg-2 control-label">Occupation</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputOccupation" placeholder="Enter your Occupation" type="text" name="occupation" required>
	      </div>
	     </div>
	     <div class="form-group">
	      <label for="inputState" class="col-lg-2 control-label">State</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="inputState" required name="state">
	          <option selected disabled>Which state are you?</option>
	          @foreach($states as $state)
	          	<option value="{{$state->id}}">{{$state->name}}</option>
	          @endforeach
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputSex" class="col-lg-2 control-label">Sex</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="state" required name="sex">
	          <option selected disabled>Which sex are you?</option>
	          	<option value="1">Female</option>
	          	<option value="2">Male</option>
	        </select>
	      </div>
	    </div>
	   <div class="form-group">
	      <label for="inputAddress" class="col-lg-2 control-label">Address</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="3" id="inputAddress" required name="address"></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputAge" class="col-lg-2 control-label">Age Group</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="state" required name="age_group">
	          <option selected disabled>Which is your age group?</option>
	          	@foreach($age_groups as $age_group)
	          		<option value="{{$age_group->id}}">{{$age_group->age_group}}</option>
	          	@endforeach
	        </select>
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

@endsection