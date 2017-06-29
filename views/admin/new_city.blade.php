@extends('layouts.app')

@section('title', 'Admin | New City')

@section('heading', 'New City')

@section('body')

	<form class="form-horizontal" method="POST" action="{{ route('city.store') }}">
		{{csrf_field()}}
	  <fieldset>
	    <legend>New Town</legend>
	    <div class="form-group">
	      <label for="selectState" class="col-lg-2 control-label">State</label>
	      <div class="col-lg-10">
	        <select class="form-control" id="selectState" required autofocus name="state">
	          <option selected disabled>Select State</option>
	          @foreach($states as $state)
	          	<option value="{{$state->id}}">{{$state->name}}</option>
	          @endforeach
	        </select>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputCity" class="col-lg-2 control-label">Name of City</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputCity" placeholder="Enter Name of City" type="text" required autofocus name="name">
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

	@if(session()->has('city_saved'))
			<center class="alert alert-success" style="font-weight: bold;">{{session()->get('city_saved')}}</center>
		@endif

	@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<center class="alert alert-danger" style="font-weight: bold;">{{$error}}</center>
			@endforeach 
		@endif

@endsection



















































































