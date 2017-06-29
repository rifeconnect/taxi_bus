@extends('layouts.app')

@section('title', 'Vehicle Application')

@section('heading', 'Application Status')

@section('body')
@if(count($vehicles) > 0)
	These are the vehicles you submitted for partnership.
	@foreach($vehicles as $vehicle)
		<ul class="list-group">
			<li class="list-group-item" style="font-weight: bold;"><a href="">{{$vehicle->year}} {{$vehicle->make}} {{$vehicle->model}}, {{$vehicle->registration_no}}</a> <span class="pull-right">{{$vehicle->is_approved}}</span></li>
		</ul>
	@endforeach
	<p>Once your vehicle application is approved, you may visit any of the following inspection centres for vehicular inspection.</p>
	<h2>Test centres here!</h2>
	<p>Sorry, the test centres are not ready yet but we'll publish them as soon as they are. Please bear with us. In the mean time, you can reach us on 07030812136 to have your vehicle inspected anywhere. Thanks.</p>
@else
	<center class="alert alert-info" style="font-weight: bold">Sorry, you haven't submitted any vehicle.</center>
@endif
@endsection

















