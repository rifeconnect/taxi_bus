@extends('layouts.app')

@section('title', 'RifeAdmin | Driver Applicants')

@section('heading', 'Driver Applicants')

@section('body')

	@if(session()->has('driver_application_deleted'))
		<center style="font-weight: bold;" class="alert alert-danger">{{ session()->get('driver_application_deleted') }}</center>
	@elseif(session()->has('driver_invited'))
		<center style="font-weight: bold;" class="alert alert-danger">{{ session()->get('driver_invited') }}</center>
	@endif
	
	<div class="table-responsive">
	@if(count($driver_applicants) > 0)
       <table style="text-align: center;" class="table table-striped table-bordered">
		<tr>
			<th>Driver Name</th>
			<th>State</th>
			<th>Address</th>
			<th>Age_Group</th>
			<th>Years of Experience</th>
			<th>Phone Number</th>
			<th>Interview Centre / Date</th>
			<th>Action</th>
		</tr>
	@foreach ($driver_applicants as $driver_applicant)
		
		<tr>
			<td>{{ $driver_applicant->driver_name['name'] }}</td>
			<td>{{ $driver_applicant->state['name'] }}</td>
			<td>{{ $driver_applicant['address'] }}</td>
			<td>{{ $driver_applicant->age_group['age_group'] }}</td>
			<td>{{ $driver_applicant['years_of_experience'] }}</td>
			<td>{{ $driver_applicant['phone_no'] }}</td>
			<td>
				<form action="{{ route('driver.invite', Crypt::encrypt($driver_applicant->id)) }}" method="post" id="driver_applicant-form-{{$driver_applicant->id}}">
		      	  	{{csrf_field()}}
		      	  	<div class="form-group">
			        	<select class="form-control" style="width: auto;" id="select" required autofocus name="interview_centre">
				          <option selected disabled>Choose Centre</option>
				          @forelse($interview_centres as $interview_centre)
				          	<option value="{{$interview_centre->id}}">{{$interview_centre->address}}</option>
				          @empty
				          	<option>No Centre is found</option>
				          @endforelse
				        </select>
		      	  	</div>
		      	  	<div class="form-group">
		      	  		<input type="text" class="form-control" name="interview_date" required placeholder="Driver Interview Date">
		      	  	</div>
		      	  </form>
			</td>
			<td>
				<button type="submit" class="btn btn-success" onclick="$('#driver_applicant-form-{{$driver_applicant->id}}').submit()">Send Invitation</button><br><br>
				<form action="{{route('driver_application.delete', Crypt::encrypt($driver_applicant->id))}}" method="POST">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input class="btn btn-sm btn-danger" type="submit" value="Delete Application">
					</form>
			</td>
		</tr>
		@endforeach
		</table>
	@else
		<table class="table table-bordered">
			<center class="alert alert-danger" style="font-weight: bold">No Driver Applicant.</center>
		</table>
	@endif
</div>
@endsection









































