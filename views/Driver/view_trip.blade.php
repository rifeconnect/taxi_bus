@extends('layouts.app')

@section('title', 'RifeConnect | Driver')

@section('heading', 'Available Trips')

@section('body')
	This is the list of all available trips.<br><br>
	<ol>
		@forelse($trips as $trip)
			<li><a href="{{ route('trip.details', Crypt::encrypt($trip->id)) }}">{{$trip->departure_state['name']}} to {{$trip->arrival_state['name']}} on {{$trip['departureDate']}}</a><span class="pull-right"><a href="{{route('trip.accept', Crypt::encrypt($trip->id))}}" class="btn btn-success">Accept Trip</a></span></li><br>
		@empty
			<center class="alert alert-danger" style="font-weight: bold;">Sorry, no trips available. Please check again later.</center>
		@endforelse
	</ol>
@endsection








































