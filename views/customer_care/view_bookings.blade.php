@extends('layouts.app')

@section('title', 'RifeCare | Bookings')

@section('heading','View Bookings')

@section('body')

        @include('partials.message')
<div class="table-responsive">
	@if(count($Bookings) > 0)
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
			<th>Exact Destination Address</th>
			<th>Mobile No</th>
			<th>Price</th>
			<th>Action</th>
		</tr>
	@foreach ($Bookings as $Booking)
		
		<tr>
			<td>{{ $Booking->user_name->name }}</td>
			<td>{{ $Booking->from_state->name }}</td>
			<td>{{ $Booking->pickUpCity->name }}</td>
			<td>{{ $Booking->no_of_passengers }}</td>
			<td>{{ $Booking->pickUpAdd }}</td>
			<td>{{ $Booking->pickUpDate }}</td>
			<td>{{ $Booking->to_state->name }}</td>
			<td>{{ $Booking->destinationCity->name }}</td>
			<td>{{ $Booking->destination }}</td>
			<td>{{ $Booking->mobileNo }}</td>
			<td width="40px">
				<form action="{{ route('booking.approve', Crypt::encrypt($Booking->id)) }}" method="post" id="booking-form-{{$Booking->id}}">
		      	  	{{csrf_field()}}
		      	  	<div class="form-group">
			        	<input class="input-sm"  placeholder="Price of Booking in Digits" type="text" required autofocus name="price">
		      	  	</div>
		      	  </form>
			</td>
			<td>
				<button type="submit" class="btn btn-success" onclick="$('#booking-form-{{$Booking->id}}').submit()">Approve</button>
			</td>
		</tr>
	@endforeach
	</table>
	@else
		<table class="table table-bordered">
			<tr>
				<td><center class="alert alert-danger" style="font-weight: bold">No Bookings available</center></td>
			</tr>
		</table>
	@endif
</div>
@endsection













