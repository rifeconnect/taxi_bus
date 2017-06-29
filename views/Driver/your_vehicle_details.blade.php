@extends('layouts.app')

@section('title', 'Driver | Vehicle Details')

@section('heading', 'Your Vehicle Details')

@section('body')
@if(count($vehicle_driver) > 0)
	<ul class="list-group">
		<li class="list-group-item">Partner's Name<span class="pull-right">{{$vehicle_driver->vehicle_details->user->name}}</span></li>
		<li class="list-group-item">Partner's Number<span class="pull-right">{{$vehicle_driver->vehicle_details->user->partner->phone_no}}</span></li>
		<li class="list-group-item">Vehicle Make<span class="pull-right">{{$vehicle_driver->vehicle_details->make}}</span></li>
		<li class="list-group-item">Vehicle Model<span class="pull-right">{{$vehicle_driver->vehicle_details->model}}</span></li>
		<li class="list-group-item">Vehicle Year<span class="pull-right">{{$vehicle_driver->vehicle_details->year}}</span></li>
	</ul>
@else
	<center class="alert alert-info" style="font-weight: bold;">Sorry, your vehicle is not ready yet.</center>
@endif
@endsection


























