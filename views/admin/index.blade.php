@extends('layouts.app')

@section('title', 'RifeAdmin | Home')

@section('heading', 'Admin | Dashboard')

@section('body')
	Please choose from the options below.
	<p>
		<ol class="tags" style="font-weight: bold;">
			<li><a href="admin/new_country">Update Countries</a></li>
			<li><a href="admin/new_state">Add State to a Country</a></li>
			<li><a href="admin/new_city">Add City to State</a></li>
			<li><a href="{{ route('bus_stop.create') }}">Add Bus stop to cities</a></li>
			<li><a href="admin/new_vehicle_driver">Assign Vehicle to Driver</a></li>
			<li><a href="admin/submitted_vehicles">View Submitted vehicles</a></li>
			<li><a href="admin/search_user">Assign Users to Roles</a></li>
			<li><a href="{{route('role.index')}}">Roles</a></li>
			<li><a href="admin/applicants/drivers">View Driver Applicants</a></li>
			<li><a href="admin/applicants/partners">Interested Partners</a></li>
			<li><a href="admin/search/account_details">View Account Details</a></li>
			
		</ol>
	</p>
		@if(session()->has('message'))
          <center class="alert alert-success" style="font-weight: bold;">{{session()->get('message')}}</center>
        @endif
@endsection



