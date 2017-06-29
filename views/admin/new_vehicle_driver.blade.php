@extends('layouts.app')

@section('title', 'RifeAdmin | New Vehicle Driver')

@section('heading', 'New Vehicle Driver')

@section('body')

	@if (session()->has('vehicle_assigned'))
		<center class="alert alert-success" style="font-weight: bold;">{{session()->get('vehicle_assigned')}}</center>
	@endif
	<form class="form-horizontal" method="POST" action="/admin/vehicle_driver">
		{{csrf_field()}}
	  <fieldset>
	    <legend>Driver-Vehicle Assignment</legend>
	    <div class="form-group">
	      <label for="select" class="col-lg-2 control-label">Select State</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="select" required autofocus name="state">
	          <option selected="selected">Select State</option>
	          @forelse($states as $state)
	          	<option value="{{$state->id}}">{{$state->name}}</option>
	          @empty
	          	<option>No State was found.</option>
	          @endforelse
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="select" class="col-lg-2 control-label">Select Driver</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="select" required autofocus name="driver">
	          <option selected="selected">Choose Driver</option>
	          @forelse($drivers as $driver)
	          	<option value="{{$driver->id}}">{{$driver->driver_name->name}}</option>
	          @empty
	          	<option>No Driver found.</option>
	          @endforelse
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="select" class="col-lg-2 control-label">Select Vehicle</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="select" required autofocus name="vehicle">
	          <option selected="selected">Choose Vehicle</option>
	          @forelse($vehicles as $vehicle)
	          	<option value="{{$vehicle->id}}">{{$vehicle->make}} {{$vehicle->model}}</option>
	          @empty
	          	<option>No Vehicle was found.</option>
	          @endforelse
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-danger">Cancel</button>
	        <button type="submit" class="btn btn-success">Submit</button>
	        <br><br>
	        <p><a href="/admin" class="btn btn-info">Back Home</a></p>
	      </div>
	    </div>
	  </fieldset>
	</form>

@endsection