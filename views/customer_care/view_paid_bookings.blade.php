@extends('layouts.app')

@section('title', 'RifeCare | Paid Bookings')

@section('heading', 'Paid Bookings')

@section('body')
	        @include('partials.message')
	@if(session()->has('booking_assigned'))
		<center class="alert alert-success">{{session()->get('trip_assigned')}}</center>
	@endif
<div class="table-responsive">
	@if(count($paid_bookings) > 0)
       <table cellpadding="5px" class="table table-striped table-bordered">
		<tr>
			<th>Customer Name</th>
			<th>PickUp State</th>
			<th>PickUp City</th>
			<th>No of Passengers</th>
			<th>Exact PickUp Address</th>
			<th>Pick Up Date</th>
			<th>Destination State</th>
			<th>Destination City</th>
			<th>Destination Address</th>
			<th>Mobile No</th>
			<th>Choose trip</th>
			<th>Action</th>
		</tr>
	@foreach ($paid_bookings as $paid_booking)
		
		<tr>
			<td>{{ $paid_booking->booking->user_name->name }}</td>
			<td>{{ $paid_booking->booking->from_state->name }}</td>
			<td>{{ $paid_booking->booking->pickUpCity->name }}</td>
			<td>{{ $paid_booking->booking->no_of_passengers }}</td>
			<td>{{ $paid_booking->booking->pickUpAdd }}</td>
			<td>{{ $paid_booking->booking->pickUpDate }}</td>
			<td>{{ $paid_booking->booking->to_state->name }}</td>
			<td>{{ $paid_booking->booking->destinationCity->name }}</td>
			<td>{{ $paid_booking->booking->destination }}</td>
			<td>{{ $paid_booking->booking->mobileNo }}</td>
			<td width="40px">
				<form action="{{ route('booking.add_to_trip', Crypt::encrypt($paid_booking->id)) }}" method="post" id="booking-form-{{$paid_booking->id}}">
		      	  	{{csrf_field()}}
		      	  	<div class="form-group">
			        	<select class="form-control" style="width: auto;" id="select" required autofocus name="trip_id">
				          <option selected disabled>Choose trip</option>
				          @forelse($trips as $trip)
				          	<option value="{{$trip->id}}">{{$trip->departure_state->name}} to {{$trip->arrival_state->name}} on {{$trip->departureDate}}</option>
				          @empty
				          	<option>No trip was found</option>
				          @endforelse
				        </select>
		      	  	</div>
		      	  </form>
			</td>
			<td>
				<button type="submit" class="btn btn-success" onclick="$('#booking-form-{{$paid_booking->id}}').submit()">Add to trip</button>
			</td>
		</tr>
		@endforeach
	</table>
	@else
		<table class="table table-bordered">
			<tr>
				<td><center class="alert alert-danger" style="font-weight: bold">No paid Bookings available</center></td>
			</tr>
		</table>
	@endif
</div>
@endsection

































