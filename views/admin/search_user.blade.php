@extends('layouts.app')

@section('title', 'Admin | Find User')

@section('heading', 'Find User')

@section('body')
	<form class="form-horizontal" method="POST" action="/admin/user_details" role="search">
		{{csrf_field()}}
	  <fieldset>
	    <legend>Input User Details</legend>
	    <div class="form-group">
	      <label for="name" class="col-lg-2 control-label">Username | Email</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="name" placeholder="Username or Email" type="text" required autofocus name="keyword">
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
	@if(session()->has('user_role_updated'))
      <center class="alert alert-success" style="font-weight: bold;">{{session()->get('user_role_updated')}}</center>
    @endif
    @if(session()->has('not_found'))
      <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('not_found')}}</center>
    @endif
@endsection









































