@extends('layouts.app')

@section('title', 'RifeConnect | Trip Details')

@section('heading', 'Trip Details')

@section('body')
@if(count($passenger_bookings) > 0)
	<div class="table-responsive">
		<table class="table table-striped table-bordered" style="text-align: center;">
			<tr>
				<th>Username</th>
				<th>Departure State</th>
				<th>Departure City</th>
				<th>Pick Up Locations</th>
				<th>Number of Passengers</th>
				<th>Arrival State</th>
				<th>Arrival City</th>
				<th>Drop Off Locations</th>
				<th>Contact</th>
			</tr>
				@foreach($passenger_bookings as $passenger_booking)
				<tr>
					<td>{{$passenger_booking->booking->user_name->username}}</td>
					<td>{{$passenger_booking->booking->from_state->name}}</td>
					<td>{{$passenger_booking->booking->pickUpCity->name}}</td>
					<td>{{$passenger_booking->booking->pickUpAdd}}</td>
					<td>{{$passenger_booking->booking->no_of_passengers}}</td>
					<td>{{$passenger_booking->booking->to_state->name}}</td>
					<td>{{$passenger_booking->booking->destinationCity->name}}</td>
					<td>{{$passenger_booking->booking->destination}}</td>
					<td>{{$passenger_booking->booking->mobileNo}}</td>
				</tr>
				@endforeach
		</table>
	</div>
@else
	<p><center class="alert alert-danger" style="font-weight: bold;">Sorry, there are no passengers on board yet.</center></p>
@endif
@endsection












































