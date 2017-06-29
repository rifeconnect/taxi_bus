@extends('layouts.app')

@section('title', 'Role | Home')

@section('heading', 'User Roles')

@section('body')
	
	<center><a class="btn btn-success" href="{{route('role.create')}}">Create Role</a></center><br>
	@if(session()->has('role_updated'))
      <center class="alert alert-success" style="font-weight: bold;">{{session()->get('role_updated')}}</center>
    @endif
    @if(session()->has('role_created'))
      <center class="alert alert-success" style="font-weight: bold;">{{session()->get('role_created')}}</center>
    @endif
	<table cellpadding="10px" class="table table-striped table-hover table-bordered">
	<tbody>
		<tr>
			<th>Name</th>
			<th>Display Name</th>
			<th>Description</th>
			<th>Action</th>
		</tr>
		@forelse($roles as $role)
			<tr>
				<td>{{$role->name}}</td>
				<td>{{$role->display_name}}</td>
				<td>{{$role->description}}</td>
				<td style="text-align: center;">
					<a class="btn btn-sm btn-info" href="{{route('role.edit', Crypt::encrypt($role->id))}}">Edit</a>

					<form action="{{route('role.destroy', $role->id)}}" method="POST">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<input class="btn btn-sm btn-danger" type="submit" value="Delete">
					</form>

				</td>
			</tr>
		@empty
			<tr>
				<center class="alert alert-info" style="font-weight: bold;">No Roles available</center>
			</tr>
		@endforelse
	</tbody>
	</table>
@endsection





























