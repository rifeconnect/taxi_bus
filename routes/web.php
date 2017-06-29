<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//This is to ensure everyone is authenticated.
Route::group(['middleware' => ['web']], function(){

	Route::get('/', function () {
	    return view('welcome');
	});

	Auth::routes();

	Route::get('/home', 'HomeController@index');

	Route::get('/about_us', function(){

		return view('about_us');

	});



	Route::get('/contact_us', function(){

		return view('contact_us');

	});
	Route::post('/contact_us', ['uses'=>'HomeController@contact_us', 'as'=>'contact_us']);

//This ensures only customer care unit can visit these routes
Route::group(['middleware' => ['role:customer_care|admin|super_admin']], function(){

	//All about customer Care.
	Route::get('customer_care', 'customer_careController@index');

	Route::get('/customer_care/view_bookings', 'customer_careController@viewBooking');

	Route::post('/customer_care/view_bookings/approve/{id}', ['as'=>'booking.approve', 'uses'=>'customer_careController@approveBooking']);

	Route::get('/customer_care/start_a_trip', 'customer_careController@start_a_trip');

	Route::get('/customer_care/view_paid_bookings', 'customer_careController@view_paid_bookings');

	Route::post('/customer_care/add_booking_to_trip/{id}', ['uses'=>'customer_careController@add_booking_to_trip', 'as'=>'booking.add_to_trip']);
	Route::get('/customer_care/view_trips', 'customer_careController@view_trips');
});


//This will ensure that only general users can become can access these routes

	//Automedics Routes
	Route::get('/automedics/register', 'AutomedicsController@register');
	Route::get('/automedics', 'AutomedicsController@index');
	Route::get('/automedics/search', 'AutomedicsController@search_details');
	Route::get('/automedics/activate/{id}', ['as'=>'activate.vehicle','uses'=>'AutomedicsController@activate_vehicle']);
	Route::post('/automedics', 'AutomedicsController@accept_registration');


//Get requests for Drivers
	Route::get('/driver', 'DriversController@index');

	//We will allow anyone to register to become a driver.
	Route::get('/driver/register', 'DriversController@register');
	Route::post('/driver', ['uses'=>'DriversController@AcceptRegistration', 'as'=>'driver.register']);
	Route::get('/driver/vehicle_details', ['uses'=>'DriversController@vehicle_details','as'=>'vehicle.details']);
	Route::get('/driver/available_trips', 'DriversController@view_trips');
	Route::get('/driver/trip/view/{id}', ['uses'=>'DriversController@view_trip_details', 'as'=>'trip.details']);

	Route::get('/driver/trip/accept/{id}', ['uses'=>'DriversController@accept_trip', 'as'=>'trip.accept']);

	Route::get('/driver/view_your_trips', [ 'uses'=>'DriversController@view_your_trips','as'=>'driver.view_your_trips']);

	//Get requests for Partners
	Route::get('/partner', 'PartnersController@index');
	Route::post('/partner/register', ['uses'=>'PartnersController@register_partner', 'as'=>'partner.register']);
	Route::get('/partner/register', 'PartnersController@register');
	Route::get('/partner/submit_bus', 'PartnersController@submit_bus');

	Route::get('/partner/vehicles', 'PartnersController@vehicles');
	Route::get('/partner/vehicle/{id}', ['uses'=>'PartnersController@vehicle_trips', 'as'=>'vehicle.view_trips']);

	//Post request for Partners' registration
	Route::post('/partner/submit_bus', 'PartnersController@accept_vehicle_registration');
	Route::get('/partner/view_vehicle_application', 'PartnersController@view_vehicle_application');

	//Services Controller to allow people check for the servies we offer.
	Route::get('services/shuttle_services', 'ServicesController@Shuttle_Services');
	Route::get('services/travel_services', 'ServicesController@Travel_Services');
	Route::resource('trip', 'TripController');

	//For people to check their trips and all available trips.
	Route::get('/mytrips','ViewTripController@myTrips');
	Route::get('/available_trips', 'ViewTripController@availableTrips');

	//For payment page
	Route::get('/payment', 'paymentController@index');
	Route::post('/payment/{id}', ['uses'=>'paymentController@getPayment', 'as'=>'booking.payment']);

	//Booking controller for the Passenger
	Route::resource('booking', 'BookingController');


//These routes are only accessible to Partners


//This ensures only drivers can access these routes.


//Ensure only admin can access these routes
Route::group(['middleware' => ['role:admin|super_admin']], function(){
	Route::resource('bus_stop', 'BusStopController');
	//Admin Get requests
	Route::get('/admin', ['uses'=>'AdminController@index','as'=>'admin.index']);
	Route::get('/admin/create_new', 'AdminController@create_new');
	Route::get('/admin/new_country', 'AdminController@new_country');
	Route::get('/admin/new_state', 'AdminController@new_state');
	Route::get('/admin/new_city', 'AdminController@new_city');
	Route::get('/admin/new_vehicle_driver', 'AdminController@new_vehicle_driver');
	Route::get('/admin/view_partners_requests', 'AdminController@view_partners_requests');
	Route::get('/admin/search/account_details', 'AdminController@search_account_details');
	Route::get('/admin/submitted_vehicles', 'AdminController@view_submitted_vehicles');
	Route::get('/admin/submitted_vehicles/approve/{id}', ['as'=>'vehicle.approve','uses'=>'AdminController@approve_vehicle_for_inspection']);
	Route::get('/admin/search_user', 'AdminController@searchUserDetail');
	Route::get('/admin/applicants/drivers', 'AdminController@view_driver_applicants');
	Route::get('/admin/applicants/partners', 'AdminController@view_partners_applicants');

	//Admin Post Requests.
	Route::post('admin/new_country', ['uses'=>'AdminController@store_country','as'=>'country.store']);
	Route::post('admin/new_state', ['uses'=>'AdminController@store_state','as'=>'state.store']);
	Route::post('admin/new_city', ['uses'=>'AdminController@store_city','as'=>'city.store']);
	Route::post('admin/vehicle_driver', 'AdminController@assign_vehicle_driver');
	Route::post('admin/user_details', 'AdminController@getUserDetails');
	Route::post('admin/applicants/driver/invite/{id}',['uses'=>'AdminController@invite_driver','as'=>'driver.invite']);
	Route::post('admin/account_details', ['uses'=>'AdminController@account_details','as'=>'user.account_details']);
	Route::post('admin/accept_partner/{id}', ['uses'=>'AdminController@accept_partner','as'=>'partner.accept']);
	Route::delete('admin/delete_partner/{id}', ['uses'=>'AdminController@delete_partner','as'=>'partner.delete']);


	Route::delete('admin/delete_driver_application/{id}', ['uses'=>'AdminController@delete_driver_application', 'as'=>'driver_application.delete']);
});


Route::group(['middleware' => ['role:automedic|admin']], function()
{
	//Get Automedics request


	//Resource controller for the roles
	Route::resource('role', 'RolesController');
	Route::resource('user_role', 'UserRoleController');
});
//This accounts details controller is accessible to everyone
Route::resource('account_details', 'AccountDetailsController');


Route::get('verify/{email}/{verifyToken}', 'Auth\RegisterController@verifyDone')->name('verifyDone');

});






















