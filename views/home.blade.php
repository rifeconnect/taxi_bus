@extends('layouts.app')

@section('title', 'RifePassenger | Home')

@section('heading', 'Dashboard')

@section('body')

    <p>You are heartily welcome to RifeConnect online service. First and foremost, we need to let you know that we are glad to have you check out our service.</p> 
    <p>For now, we render the following services:</p>
    <ul class="tags"><li><a href="services/travel_services"><strong>Travel Services</strong></a></li>
    @role('general_user')
    <li><a href="/partner"><strong>Partnership</strong></a></li>
    @endrole
    </ul>
    @role('general_user')
      Please click on the Options in the menubar to view some of the available options.
    @endrole
    <p>This travel service works by making your travel experience a <strong>DOORSTEP</strong> to <strong>DOORSTEP</strong> experience.</p>
       @if(session()->has('message'))
          <center style="font-weight: bold" class="alert alert-success">{{session()->get('message')}}</center>
       @endif 

@endsection
