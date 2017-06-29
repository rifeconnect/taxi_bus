@extends('layouts.app')

@section('title', 'Submitted Vehicles')

@section('heading', 'Submitted Vehicles')

@section('body')

	@if(session()->has('message'))
              <center class="alert alert-success" style="font-weight: bold;">{{session()->get('message')}}</center>
            @endif

<div class="table-responsive">
@if(count($vehicles) > 0)

<p>
	This is a list of all the vehicles that have been submitted for inspection approval.</p>
	<table cellpadding="5px" class="table table-bordered">
				<tr>
				<th>Partner Name</th>
				<th>Vehicle Make</th>
				<th>Model</th>
				<th>Year</th>
				<th>Passenger Capacity</th>
				<th>Contact</th>
				<th>State</th>
				<th>Action</th>
			</tr>
	@foreach($vehicles as $vehicle)
			
			<tr>
				<td>{{ $vehicle->user->name}}</td>
				<td>{{ $vehicle->make }}</td>
				<td>{{ $vehicle->model }}</td>
				<td>{{ $vehicle->year }}</td>
				<td>{{ $vehicle->no_of_passengers }}</td>
				<td>{{ $vehicle->phone_no }}</td>
				<td>{{ $vehicle->state->name }}</td>
				<td>
					<a href="{{ route('vehicle.approve', Crypt::encrypt($vehicle->id)) }}" class="btn btn-success">Approve</a>
				</td>
			</tr>
	@endforeach
	</table>
	@else
		<table>
			<tr><p class="alert alert-danger" style="text-align: center; font-weight: bold;">Sorry, no vehicle was found.</p></tr>
		</table>
	@endif
	        <p><a href="/admin" class="btn btn-info">Back Home</a></p>
</div>

@endsection






































