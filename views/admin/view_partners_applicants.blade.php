@extends('layouts.app')

@section('title', 'Interested Partners')

@section('heading', 'Interested Partners')

@section('body')

		@if(session()->has('partner_accepted'))
			<center class="alert alert-danger" style="font-weight: bold;">{{session()->get('partner_accepted')}}</center>
		@elseif(session()->has('partner_deleted'))
			<center class="alert alert-danger" style="font-weight: bold;">{{session()->get('partner_deleted')}}</center>
		@endif

	<div class="table-responsive">
	@if(count($interested_partners) > 0)
		<table class="table table-striped table-bordered" style="text-align: center;">
			<tr>
				<th>Partner's Name</th>
				<th>Occupation</th>
				<th>State</th>
				<th>Sex</th>
				<th>Address</th>
				<th>Age Group</th>
				<th>Phone Number</th>
				<th>Action</th>
			</tr>
			@foreach($interested_partners as $interested_partner)
			<tr>
				<td>{{$interested_partner->user->name}}</td>
				<td>{{$interested_partner->occupation}}</td>
				<td>{{$interested_partner->state->name}}</td>
				@if($interested_partner->sex == 1)
					<td>Female</td>
				@elseif($interested_partner->sex == 2)
					<td>Male</td>
				@endif
				<td>{{$interested_partner->address}}</td>
				<td>{{$interested_partner->age->age_group}}</td>
				<td>{{$interested_partner->phone_no}}</td>
				<td>
					<form action="{{route('partner.accept', Crypt::encrypt($interested_partner->id))}}" method="POST">
						{{csrf_field()}}
						<input class="btn btn-sm btn-success" type="submit" value="Accept Partner">
					</form>
					<form action="{{route('partner.delete', Crypt::encrypt($interested_partner->id))}}" method="POST">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input class="btn btn-sm btn-danger" type="submit" value="Delete Application">
					</form>
				</td>
			</tr>
			@endforeach
		</table>
		@else
		<table>
			<tr><center class="alert alert-danger" style="font-weight: bold;">Sorry, there is No new Partnership Applicant.</center></tr>
		</table>
		@endif
	</div>

@endsection


































































