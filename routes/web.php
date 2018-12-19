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



Route::group(['middleware' => ['auth','verified']], function()
{
    Route::view('/configurator', 'configurator');
    Route::view('/mqtt', 'mqtt');
    Route::view('/device', 'device');
    Route::view('/calendar', 'calendar');
    Route::view('/schedule', 'schedule');
});

//New Routes ////
Route::group(['middleware' => ['auth','verified']], function()
{
    Route::get('/home', 'HomeController@index')->name('home');
    Route::match(['get','post'],'/profile', 'UserController@profile');

});
