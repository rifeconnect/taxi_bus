@extends('layouts.app')

@section('title', 'User | Account Details')

@section('heading', 'Account Details')

@section('body')
	<div class="table-responsive">
		<table class="table table-striped table-bordered">
			<tr>
				<th>Bank_Name</th>
				<th>Name_Of_User</th>
				<th>Account_Name</th>
				<th>Account_Number</th>
			</tr>
			@foreach($account_details as $account_detail)
			<tr>
				<td>{{ $account_detail->bank_name }}</td>
				<td>{{ $account_detail->user->name }}</td>
				<td>{{ $account_detail->account_name }}</td>
				<td>{{ $account_detail->account_number }}</td>
			</tr>
			@endforeach
		</table>
	</div>
@endsection




































