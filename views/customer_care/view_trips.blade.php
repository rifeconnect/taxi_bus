@extends('layouts.app')

@section('title', 'RifeCare | View Trips')

@section('heading', 'All Trips')

@section('body')
	@if(count($trips) > 0)
		@foreach($trips as $trip)
			{{trip}}
		@endforeach
	@else
		<center class="alert alert-danger" style="font-weight: bold;">Sorry, no trip was found.</center>
	@endif
@endsection






























