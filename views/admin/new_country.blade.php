@extends('layouts.app')

@section('title', 'RifeAdmin | Country')

@section('heading', 'Add Country')

@section('body')
	<form class="form-horizontal" method="POST" action="{{ route('country.store') }}">
	{{csrf_field()}}
	  <fieldset>
	    <legend>New Country</legend>
	    <div class="form-group">
	      <label for="inputCountry" class="col-lg-2 control-label">Country Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputCountry" placeholder="Enter Country Name" type="text" autofocus required>
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="retypeCountry" class="col-lg-2 control-label">Retype Country Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="retypeCountry" placeholder="Retype Country Name" type="text"  autofocus name="name" required>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-danger">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	        <br><br>
	        <p><a href="/admin" class="btn btn-info">Back Home</a></p>
	      </div>
	  </fieldset>
	</form>
		@if (count($errors) > 0)
			@foreach ($errors->all() as $error)
				<center class="alert alert-danger" style="font-weight: bold;">{{$error}}</center>
			@endforeach 
		@endif
		
@endsection