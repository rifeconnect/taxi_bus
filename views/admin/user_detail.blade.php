@extends('layouts.app')

@section('title', 'Admin | User Details')

@section('heading', 'User Details')

@section('body')
<p><a href="/admin" class="btn btn-info">Back Home</a></p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>User Id</th>
				<th>Name</th>
				<th>Username</th>
				<th>Roles</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($user_details as $user_detail)
				<tr>
					<td>{{$user_detail->id}}</td>
					<td>{{$user_detail->name}}</td>
					<td>{{$user_detail->username}}</td>
					<td>
						@foreach($user_detail->roles as $role)
							{{$role->name}}
						@endforeach
					</td>
				<td>
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal-{{$user_detail->id}}">
						  Edit role
						</button>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>

	@foreach($user_details as $user_detail)
		<!-- Modal -->
			<div class="modal fade" id="myModal-{{$user_detail->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">{{$user_detail->name}} Role</h4>
			      </div>
			      <div class="modal-body">
			      	  <form action="{{route('user_role.update', $user_detail->id)}}" method="post" id="role-form-{{$user_detail->id}}">
			      	  	{{method_field('PATCH')}}
			      	  	{{csrf_field()}}
			      	  	<div class="form-group">
			      	  		<select name="roles[]" multiple>
			      	  			@foreach ($roles as $role)
			      	  				<option value="{{$role->id}}">{{$role->name}}</option>
			      	  			@endforeach
			      	  		</select>
			      	  	</div>
			      	  </form>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			        <button type="submit" class="btn btn-primary" onclick="$('#role-form-{{$user_detail->id}}').submit()">Update Role</button>
			      </div>
			    </div>
			  </div>
			</div>
	@endforeach

@endsection

































