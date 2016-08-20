<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Hardware APIs
Route::get('alarm', "AlarmController@alarm");
// Route::get('alarm_stop', "AlarmController@alarm");
Route::get('gsm_status', "GsmController@status");
Route::get('reset', "GsmController@reset");

// Panel Fire Alarm
Route::get('panel', "AlarmController@panel");
Route::get('areas', "AlarmController@areas");
