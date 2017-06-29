@extends('layouts.app')

@section('title', 'Vehicle Details')

@section('heading', 'Vehicle Details')

@section('body')
	@foreach($vehicle_details as $vehicle_detail)
	<ul class="list-group">
		<li class="list-group-item">Make<span class="pull-right"> {{$vehicle_detail->make}}</span></li>

		<li class="list-group-item">Model<span class="pull-right"> {{$vehicle_detail->model}}</span></li>

		<li class="list-group-item">Year<span class="pull-right"> {{$vehicle_detail->year}}</span></li>

		<li class="list-group-item">Number of Passengers<span class="pull-right"> {{$vehicle_detail->no_of_passengers}}</span></li>

		<li class="list-group-item">Registration Number<span class="pull-right"> {{$vehicle_detail->registration_no}}</span></li>

		<li class="list-group-item">Status<span class="pull-right">{{$vehicle_detail->is_approved}}</span></li>

		<li class="list-group-item"><a href="{{ route('activate.vehicle', Crypt::encrypt($vehicle_detail->id)) }}">Activate Vehicle</a></li>
	</ul>
	@endforeach
@endsection





















