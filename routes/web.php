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

Auth::routes(['verify' => true]);

Route::view('/', 'landing');
Route::redirect('/dashboard', '/home');
Route::view('/examples/plugin', 'examples.plugin');
Route::view('/examples/blank', 'examples.blank');


Route::group(['middleware' => ['auth']], function () {
//    Route::view('/device', 'device');
//    Route::view('/manage-device', 'manage-device');
    Route::view('/configurator', 'configurator');
    Route::view('/ferment', 'ferment');
    Route::view('/user-profile', 'user-profile');
    Route::view('/user-notify', 'user-notify');
    Route::view('/user-set', 'user-set');

    Route::view('/mqtt', 'mqtt');
    Route::view('/table', 'table');
    Route::view('/calendar', 'calendar');
    Route::view('/schedule', 'schedule');
});

//New Routes ////

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::match(['get', 'post'], '/profile', 'UserController@profile');
    //devices Routes
    Route::resource("devices", "DeviceController");
    Route::get("/getHeart", "DeviceController@heartDevice");
    Route::get("/deviceFormData", "DeviceController@getFormData");
    Route::get("/checkServer", function () {
        return response()->json(null, 200);
    });
    Route::view("/test", 'test');
});


