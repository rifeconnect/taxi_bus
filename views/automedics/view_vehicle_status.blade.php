@extends('layouts.app')

@section('title','Vehicle Status')

@section('heading', 'Vehicle Status')

@section('body')
	<form method="get" action="/automedics/search">
		<fieldset>
			<legend>Vehicle Approval Status</legend>
			 <div class="form-group">
		      <label for="inputRegistration" class="col-lg-2 control-label">Registration Number</label>
		      <div class="col-lg-10">
		        <input class="form-control" id="inputRegistration" placeholder="Enter Vehicle Registration" type="text" autofocus required name="registration_no">
		      </div>
		    </div>
		    <div class="form-group">
		      <div class="col-lg-10 col-lg-offset-2">
		        <button type="reset" class="btn btn-danger">Cancel</button>
		        <button type="submit" class="btn btn-success">Submit</button>
		        <br><br>
		        <p><a href="/automedics" class="btn btn-info">Back Home</a></p>
		      </div>
		    </div>
		</fieldset>
	</form>
	@if(session()->has('vehicle_not_found'))
          <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('vehicle_not_found')}}</center>
        @endif
@endsection





























