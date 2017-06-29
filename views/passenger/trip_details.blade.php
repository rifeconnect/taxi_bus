@extends('layouts.app')

@section('title', 'Trip Details')

@section('heading', 'Trip Details')

@section('body')
	<center style="font-weight: bold;"><h3>TRIP DETAILS</h3>
	DRIVER NAME: {{$person_trip->trip->vehicle_driver->driver->driver_name->name}}<br>
	VEHICLE MAKE: {{$person_trip->trip->vehicle_driver->vehicle_details->make}}<br>
	VEHICLE REGISTRATION NUMBER: {{$person_trip->trip->vehicle_driver->vehicle_details->registration_no}}<br>
	PICK UP CITY: {{$person_trip->booking->pickUpCity->name}}<br>
	PICK UP ADDRESS: {{$person_trip->booking->pickUpAdd}}<br>
	PICK UP DATE: {{$person_trip->booking->pickUpDate}}<br>
	DESTINATION CITY: {{$person_trip->booking->destinationCity->name}}<br>
	DROP OFF ADDRESS: {{$person_trip->booking->destination}}<br></center>

@endsection



































