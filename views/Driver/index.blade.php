@extends('layouts.app')

@section('title', 'Driver')

@role('driver')

	@section('heading', "Drivers' Home")

	<!--This is visible only to drivers-->

		@section('body')

		@if(session()->has('trip_taken'))
	      <center class="alert alert-success" style="font-weight: bold;">{{session()->get('trip_taken')}}</center>
	    @endif
			
	        Welcome to the drivers' homepage. Please choose from the options below.
	        <p>
	        <ul class="tags">
	        	<li><a href="/account_details"><strong>Account Details.</strong></a>
	        	</li>
	        	<li><a href="/driver/available_trips"><strong>View Available Trips.</strong></a></li>
	        	<li><a href="{{ route('vehicle.details') }}"><strong>View Your Vehicle Details.</strong></a></li>
	        	<li><a href="{{ route('driver.view_your_trips') }}"><strong>View Your Trips.</strong></a></li>
	        </ul>
	        </p>
 
	@endsection

@endrole

<!--This is visible to a general user who is assumed to be a prospective driver-->

@section('heading', 'Welcome')

@section('body')

	 @if(session()->has('driver_registered'))
      <center class="alert alert-success" style="font-weight: bold;">{{session()->get('driver_registered')}}</center>
    @endif

	Our dear prospective driver, you are heartily welcome to our drivers' homepage. Driving with RifeConnect is pretty easy. All you have to do is <a href="/driver/register">register</a> to become a driver and we will get back to you. If you already registered, you may  <a href="#modal_application_status" data-toggle="modal" data-target="#modal_application_status">click here</a> to view your application status. Thanks.

	<!-- Modal -->
			<div class="modal fade" id="modal_application_status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Application Status</h4>
			      </div>
			      <div class="modal-body">
			      @if($user_applied) 
			      	@if($user_applied->is_invited == 'false')
			      		<div class="jumbotron">We received your application and we are currently processing your interview invitation centre. Thanks.</div>
			      	@elseif($user_applied->is_invited == 'true')
			      		<div class="jumbotron">
			      			<h2 style="font-size: 4vh;">Congratulations!!!</h2>
			      			<div class="container">
			      				<ul class="list-group">
			      					<li>Interview Address: {{ $driver_interview->interview_centre->address }}</li>
			      					<li>Interview Date: {{ $driver_interview->interview_date }}</li>
			      				</ul>
			      			</div>
			      		</div>
			      	@endif
			      @else
			      	<div class="jumbotron">Sorry but we haven't received your application.</div>
			      @endif
		      	  </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>
			  </div>
			</div>

@endsection