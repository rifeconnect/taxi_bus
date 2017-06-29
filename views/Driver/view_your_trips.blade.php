@extends('layouts.app')

@section('title', 'RifeConnect | Driver Trips')

@section('heading', 'Your Trips')

@section('body')

	
	<div class="table-responsive">
	@if(count($driver_trips) > 0 )
	<center><p class="alert alert-info" style="font-weight: bold;">Please ensure you review your trip details before the trip date. Wishing you a safe trip. Please drive to stay alive. We wish you a safe trip.</p></center>
		<table class="table table-striped table-bordered" style="text-align: center;">
			<tr>
				<th>Departure State</th>
				<th>Arrival State</th>
				<th>Trip Date</th>
				<th>Action</th>
			</tr>
		@foreach($driver_trips as $driver_trip)
			<tr>
				<td>{{$driver_trip->departure_state->name}}</td>
				<td>{{$driver_trip->arrival_state->name}}</td>
				<td>{{$driver_trip['departureDate']}}</td>
				<td><a href="{{ route('trip.details', Crypt::encrypt($driver_trip->id)) }}" class="btn btn-success">View Details</a></td>
			</tr>
		@endforeach
		</table>
	@else
		<p><center class="alert alert-info" style="font-weight: bold;">Sorry, but you haven't taken any trip.</center></p>
	</div>
	@endif
@endsection















































































