<?php

use App\Http\Controllers\TicketController;

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

Route::resource('/tickets', 'TicketController');
Route::resource('/vehicles', 'VehicleController');
Route::resource('/settings', 'SettingsController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
