@extends('layouts.app')

@section('title', 'RifeAutoMedics | Home')

@role('automedic')

	@section('heading', 'AutoMedics Home')

	@section('body')
		<div class="alert alert-warning">You are mandated to carefully scrutinize the the vehicle to avoid vehicular breakdown. If you recommend a vehicle and it breaks down on a trip, you will be blocked for 2 weeks from the system. Be warned!</div>

		<ul class="list-group">
			<li class="list-group-item"><a href="/automedics/search">Search Vehicle details</a></li>
			<li class="list-group-item"><a href="">Another option here</a></li>
		</ul>

				@if(session()->has('vehicle_registered'))
	              <center class="alert alert-success" style="font-weight: bold;">{{session()->get('vehicle_registered')}}</center>
	            @endif

	@endsection

@endrole

@section('heading', 'Welcome')

@section('body')

	@if(session()->has('automedic_registered'))
          <center class="alert alert-success" style="font-weight: bold;">{{session()->get('automedic_registered')}}</center>
        @endif
	Our dear Prospective Automedic, you are heartily welcome to RifeConnect Services. You have to <a href="/automedics/register">register</a> for you be recognized as an automedic at RifeConnect.
@endsection






















