@extends('layouts.app')

@section('title', 'Admin | Search Account Details')

@section('heading', 'Search Account Details')

@section('body')
	<form class="form-horizontal" method="POST" action="{{ route('user.account_details') }}" role="search">
		{{csrf_field()}}
	  <fieldset>
	    <legend>Input User Details</legend>
	    <div class="form-group">
	      <label for="name" class="col-lg-2 control-label">Account Details</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="name" placeholder="Account name, Account number, Bank name..." type="text" required autofocus name="keyword">
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-danger">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	        <br><br>
	        <p><a href="/admin" class="btn btn-info">Back Home</a></p>
	      </div>
	    </div>
	  </fieldset>
	</form>
    @if(session()->has('not_found'))
      <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('not_found')}}</center>
    @endif
@endsection




























