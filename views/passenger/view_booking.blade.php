@extends('layouts.app')

@section('title', 'RifePassenger | View_Booking')

@section('heading', 'Your Bookings')

@section('body')
@if(count($Bookings) > 0)
   <div class="col-lg-13">
   	<ul class="list-group">
   		@foreach ($Bookings as $Booking)
   		<li class="list-group-item">
   			<a href="{{'/booking/'.Crypt::encrypt($Booking->id)}}">{{ $Booking->dropOffBusStop->address }}</a>
   			<span class="pull-right">{{ $Booking->created_at }}</span>
   		</li>
   		@endforeach
   	</ul>
   </div>
@else
      <p><center class="alert alert-info" style="font-weight: bold">Sorry, you have no Bookings yet.</center></p>
@endif
@endsection
















