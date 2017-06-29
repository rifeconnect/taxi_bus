@extends('layouts.app')

@section('title', 'Edit Account Detail')

@section('heading', 'Edit Account Details')

@section('body')
	
	<form class="form-horizontal" method="POST" action="{{route('account_details.update', Crypt::encrypt($account_details[0]['id']))}}">
		{{method_field('PATCH')}}
		{{csrf_field()}}
	  	<fieldset>
	    	<legend>Fill Your Account Details</legend>
	    <div class="form-group">
	      <label for="inputBankName" class="col-lg-2 control-label">Bank Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" id="inputBankName" placeholder="Enter your Bank Name" type="text" required name="bank_name" value="{{$account_details[0]['bank_name']}}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputAccountName" class="col-lg-2 control-label">Account Name</label>
	      <div class="col-lg-10">
	        <input class="form-control" type="text" name="account_name" id="inputAccountName" required placeholder="Enter your account Name" value="{{$account_details[0]['account_name']}}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="inputAccountNumber" class="col-lg-2 control-label">Account Number</label>
	      <div class="col-lg-10">
	       <input class="form-control" type="text" name="account_number" id="inputAccountNumber" placeholder="Enter your account Number" required value="{{$account_details[0]['account_number']}}">
	      </div>
	    </div>
	    <div class="form-group">
	      <div class="col-lg-10 col-lg-offset-2">
	        <button type="reset" class="btn btn-danger">Cancel</button>
	        <button type="submit" class="btn btn-success">Update</button>
	      </div>
	  </fieldset>
	</form>

@endsection













































