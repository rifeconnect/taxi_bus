@extends('layouts.app')

@section('title', 'Partners')

@role('partner')
<!--This is only visible to users who are partners-->

	@section('heading', "Partners' Home")

	@section('body')
		
		Dear Partner,
	   Please choose from the options below.
		<ul class="tags">
			<li><a href="/partner/submit_bus"><strong>Submit a vehicle</a></strong></li>
			<li><a href="/partner/vehicles"><strong>View Vehicle Trips</a></strong></li>
			<li><a href="/account_details"><strong>Account Details</strong></a></li>
			<li><a href="/partner/view_vehicle_application"><strong>View Submitted Vehicles</strong></a></li>
		</ul>

		 @if(session()->has('vehicle'))
		  <center class="alert alert-success" style="font-weight: bold;">{{session()->get('vehicle')}}</center>
		 @elseif(session()->has('account_saved'))
		 	<center class="alert alert-success" style="font-weight: bold;">{{session()->get('account_saved')}}</center>
		@endif

	                  
	@endsection

@endrole

@role('general_user')

		<!--This is visible to general users who are assumed to be potential partners.-->

	@section('heading', 'Welcome')

	@section('body')

		<p>Our dear prospective partner, you are heartily welcome. Please before you continue, endeavor to read through.</p>
		<p>Partners are those who submit vehicles. They either decide to drive at the same time, recommend a driver or just submit the vehicle while we get the driver for them. For you to become a partner with RifeConnect, you need to <a href="/partner/register">Register First.</a> After registration, we will get back to you in order to allow you submit the vehicle. Only when your vehicle application is approved have you become a Partner with RifeConnect. Please note that you can submit as many vehicles as you want.</p>

		@if(session()->has('partner'))
		  <center class="alert alert-success" style="font-weight: bold;">{{session()->get('partner')}}</center>
		@endif



	@endsection

@endrole
