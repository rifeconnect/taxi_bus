@extends('layouts.app')

@section('title', 'Become a Driver')

@section('heading', 'Drivers Registration')

@section('body')
	
	<form class="form-horizontal" method="POST" action="{{ route('driver.register') }}">
	{{csrf_field()}}
	  <fieldset>
	    <legend>Fill the Form</legend>
	    <div class="form-group">
	      <label for="inputName" class="col-lg-2 control-label">Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputName" placeholder="Enter your names" type="text" required name="name" value="{{$name}}" >
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputAddress" class="col-lg-2 control-label">Address</label>
	      <div class="col-lg-10">
	        <textarea class="form-control" rows="3" id="inputAddress" required name="address"></textarea>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="Age" class="col-lg-2 control-label">Age Group</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="Age" required name="age_group">
	        <option selected disabled>Which is your age group?</option>
	          @foreach($age_groups as $age_group)
	          		<option value="{{$age_group->id}}">{{$age_group->age_group}}</option>
	          	@endforeach
	        </select>
	        <br>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="Experience" class="col-lg-2 control-label">Years of Experience</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="Experience" required name="experience">
	          <option selected disabled>Years of Experience</option>
	          <option value="1">1</option>
	          <option value="2">2</option>
	          <option value="3">3</option>
	          <option value="4">4</option>
	          <option value="5">5</option>
	          <option value="More">More than 5</option>
	        </select>
	        <br>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="state" class="col-lg-2 control-label">Which state are you?</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="state" required name="state">
	          <option selected disabled>Which state are you?</option>
	          @foreach($states as $state)
	          	<option value="{{$state->id}}">{{$state->name}}</option>
	          @endforeach
	        </select>
	        <br>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="state" class="col-lg-2 control-label">Phone Number</label>
	      <div class="col-lg-10">
	       <input type="text" name="phone_no" class="form-control" required placeholder="Enter your Phone Number.">
	        <br>
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


