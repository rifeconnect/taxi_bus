@extends('layouts.app')

@section('title', 'RifeAdmin | State')

@section('heading', 'Create New State')

@section('body')

	<form class="form-horizontal" method="POST" action="{{ route('state.store') }}">
		{{csrf_field()}}
	  <fieldset>
	    <legend>New State</legend>
	    <div class="form-group">
	      <label for="select" class="col-lg-2 control-label">Country</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="select" required autofocus name="country">
	          <option selected disabled>Select Country</option>
	          @foreach($countries as $country)
	          	<option value="{{$country->id}}">{{$country->name}}</option>
	          @endforeach
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputState" class="col-lg-2 control-label">Name of State</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputState" placeholder="Enter Name of State" type="text" required autofocus name="name">
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

	@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<center class="alert alert-danger" style="font-weight: bold;">{{$error}}</center>
			@endforeach 
		@endif

@endsection