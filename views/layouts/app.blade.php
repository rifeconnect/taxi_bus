<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                       @if (Auth::guest())
                       <li><a href="/about_us">About Us</a></li>
                       <li><a href="/contact_us">Contact Us</a></li>
                       @else
                       @role('customer_care')
                          <li><a href="/customer_care">Customer Care</a></li>
                       @endrole
                       @role('admin')
                          <li><a href="/admin">Admin Home</a></li>
                       @endrole
                       @role('super_admin')   
                          <li><a href="/super_admin">Super Admin</a></li>
                       @endrole
                       @role('partner')
                          <li><a href="/partner">Partner Home</a></li>
                       @endrole
                       @role('automedic')
                          <li><a href="/automedics">Automedic Home</a></li>
                       @endrole
                       @role('driver')
                          <li><a href="/driver">Driver Home</a></li>
                       @endrole
                       <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    View <span class="caret"></span>
                                </a>
                            <ul class="dropdown-menu alert-info" role="menu">
                                <li><a href="/booking/create">Book a trip</a></li>
                                <li><a href="/booking">Your Bookings</a></li>
                                <li><a href="/available_trips">Available trips</a></li>
                                <li><a href="/about_us">About Us</a></li>
                            </ul>
                        </li>
                       @role('general_user')
                       <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Options <span class="caret"></span>
                                </a>
                            <ul class="dropdown-menu alert-info" role="menu">
                                <li><a href="/driver">Become a Driver</a></li>
                                <li><a href="/partner">Become a Partner</a></li>
                                <li><a href="/automedics">Register as Automedic</a></li>
                            </ul>
                        </li>
                        @endrole
                       <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    Our Services <span class="caret"></span>
                                </a>
                            <ul class="dropdown-menu alert-info" role="menu">
                                <li><a href="/services/shuttle_services">Shuttle</a></li>
                                <li><a href="/services/travel_services">Travel</a></li>
                            </ul>

                        </li>
                        <li><a href="/contact_us">Contact Us</a></li>
                       @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                                <a class="btn btn-primary navbar-btn" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-success navbar-btn" href="{{ route('register') }}">Register</a>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu alert-info" role="menu">
                                    <li>
                                        <a class="btn btn-warning navbar-btn" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav><br><br><br>
          <div class="container-fluid" style="color: black;">
              <div class="row-fluid">
                  <div class="col-md-8 col-md-offset-2">
                      <div class="panel panel-primary">
                          <div class="panel-heading"><center><h3>@yield('heading')</h3></center>
                          </div>
                          <div class="panel-body" style="max-height: 100vh; min-height: 50vh; overflow-y: scroll; font-family: serif; font-size: 2.5vh">
                          @if(session()->has('driver_re-register'))
                            <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('driver_re-register')}}</center>
                          @elseif(session()->has('automedic_re-register'))
                            <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('automedic_re-register')}}</center>
                          @elseif(session()->has('partner_re-register'))
                            <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('partner_re-register')}}</center>
                          @elseif(session()->has('account_saved'))
                            <center class="alert alert-success" style="font-weight: bold;">{{session()->get('account_saved')}}</center>
                           @elseif(session()->has('account_updated'))
                            <center class="alert alert-success" style="font-weight: bold;">{{session()->get('account_updated')}}</center>
                           @elseif(session()->has('no_trip'))
                            <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('no_trip')}}</center>
                            @elseif(session()->has('dont_have_vehicle'))
                            <center class="alert alert-danger" style="font-weight: bold;">{{session()->get('dont_have_vehicle')}}</center>
                          @endif

                             @section('body')
                             @show
                          </div>
                      </div>
                      <footer><center style=" font-size: 3vh;">&copy; 2017 RifeConnect Services</center></footer>
                  </div>
              </div>
          </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
