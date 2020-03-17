<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index')
  ->name('home');

Route::prefix('dashboard')
  ->namespace('Admin')
  ->middleware('auth')
  ->group(function () {
    Route::get('/', 'DashboardController@index')
      ->name('dashboard');
  });

Route::get('rdct_fundmanagers/{rdct_fundmanager}/delete', 'CitifundmanagersController@destroy');
Route::resource('rdct_fundmanagers', 'CitifundmanagersController');
Auth::routes(['verify' => true]);
