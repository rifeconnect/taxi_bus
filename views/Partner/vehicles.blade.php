@extends('layouts.app')

@section('title', 'Partner | Vehicles')

@section('heading', 'Your Vehicle(s)')

@section('body')
	@if(count($partner_vehicles) > 0)
		<ol>
			@foreach($partner_vehicles as $partner_vehicle)
				<li><a href="{{ route('vehicle.view_trips', Crypt::encrypt($partner_vehicle->id)) }}"> {{ $partner_vehicle->year }} {{ $partner_vehicle->make }}, {{ $partner_vehicle->model }}, {{ $partner_vehicle->registration_no }}</a></li>
			@endforeach
		</ol>
	@else
		Sorry you haven't submitted any vehicle.
	@endif
@endsection




































































