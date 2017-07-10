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

Route::get('/', function () {
    return view('welcome');
});

Route::get('listen', 'PlayerController@listen');
/* Player */
Route::get('listen/{alias?}/{version?}', 'PlayerController@listen');

/* User Interface */
Route::get('conference/manage/{conferenceID}/{pin}', 'ConferenceController@manage');
Route::get('conference/login','ConferenceController@manage');

/* Generate Configuration Files */
Route::get('configuration/icecast2','ConfigurationController@icecast2');
Route::get('configuration/freeswitch_dialplan','ConfigurationController@freeswitch_dialplan');

/* Icecast Control */
Route::post('icecast_control/mount_add','IcecastController@mount_add');
Route::post('icecast_control/mount_remove','IcecastController@mount_remove');
Route::post('icecast_control/listener_add','IcecastController@listener_add');
Route::post('icecast_control/listener_remove','IcecastController@listener_remove');
Route::post('icecast_control/stream_auth','IcecastController@stream_auth');

Auth::routes();
Route::get(config('backpack.base.route_prefix', 'admin') . '/logout', 'Auth\LoginController@logout');
Route::get('/home', 'HomeController@index')->name('home');

  /*
 * Start on Admin Sites
 */
 Route::get(config('backpack.base.route_prefix', 'admin') . '/', function() {
     return Redirect::to(config('backpack.base.route_prefix', 'admin') . '/dashboard');
 });

Route::group(['middleware' => ['role:admin,access_admin_site']], function () {
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.

  Route::get(config('backpack.base.route_prefix', 'admin') . '/dashboard', 'Admin\DashboardController@index');
  Route::get(config('backpack.base.route_prefix', 'admin') . '/cdr_billing', 'Admin\BillingController@index');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/permission', 'Permission\PermissionCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/role', 'Permission\RoleCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/user', 'Permission\UserCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/conference', 'Admin\ConferenceCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/did', 'Admin\DidCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/mount', 'Admin\MountCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/vendor', 'Admin\VendorCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/salesperson', 'Admin\SalespersonCrudController');
  CRUD::resource(config('backpack.base.route_prefix', 'admin') . '/user_group', 'Admin\UserGroupCrudController'); 
  // API

  Route::post('api/conference/bride/create', 'Api\Conference\BridgeController@create');
});

Route::post('api/conference/turbobridge/action', 'Api\Conference\TurboBridgeActionController@index');
