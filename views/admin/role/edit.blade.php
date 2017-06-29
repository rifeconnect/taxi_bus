@extends('layouts.app')

@section('title', 'RifeAdmin | Edit Roles')

@section('heading', 'Edit Roles')

@section('body')
	<form class="form-horizontal" method="POST" action="{{route('role.update', $role->id)}}">
		{{method_field('PATCH')}}

		{{csrf_field()}}

	  <fieldset>
	    <legend>Edit Role</legend>

	    <div class="form-group">
	      <label for="name" class="col-lg-2 control-label">Name of Role</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="name" placeholder="Enter Name of Role" type="text" required autofocus name="name" value="{{$role->name}}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="display_name" class="col-lg-2 control-label">Display Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="display_name" placeholder="Display Name" type="text" required autofocus name="display_name" value="{{$role->display_name}}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="description" class="col-lg-2 control-label">Role Description</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="display_name" placeholder="Description" type="text" required autofocus name="description" value="{{$role->description}}">
	      </div>
	    </div>
	    <div class="form-group">
	     <label for="inputPassword" class="col-lg-2 control-label">Permission</label>
	      <div class="col-lg-10">
	        <div class="checkbox" >
	          <label>
	          @foreach($permissions as $permission)
	            <input type="checkbox" {{in_array($permission->id, $permission_roles)?"checked":""}} name="permission[]" value="{{$permission->id}}">{{$permission->name}}<br>
	          @endforeach
	          </label>
	        </div>
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-default">Cancel</button>
	        <button type="submit" class="btn btn-primary">Submit</button>
	        <br><br>
	        <p><a href="/admin" class="btn btn-info">Back Home</a></p>
	      </div>
	    </div>
	  </fieldset>
	</form>
@endsection








































