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

// ROUTE REKSADANA
Route::get('/mastertemplates', 'CitimasterController@index');

Route::get('rdct_fundmanagers/{rdct_fundmanager}/delete', 'CitifundmanagersController@destroy');
Route::resource('rdct_fundmanagers', 'CitifundmanagersController');

Route::get('rdct_fundnames/{rdct_fundname}/delete', 'CitifundnamesController@destroy');
Route::resource('rdct_fundnames', 'CitifundnamesController');

Route::get('rdct_prices/{rdct_price}/delete', 'CitipricesController@destroy');
Route::resource('rdct_prices', 'CitipricesController');

Route::get('/invoices', 'CitiinvoicesController@index');
Route::get('/invoices/create/{rdct_fundname}', 'CitiinvoicesController@create');
Route::post('/invoices', 'CitiinvoicesController@store');
Route::post('/invoices/{rdct_invoice}/', 'CitiinvoicesController@update');
Route::get('/invoices/{rdct_invoice}/print', 'CitiinvoicesController@print');

// ROUTE LABEL WAKI
Route::get('waki_prices/{waki_price}/delete', 'WakipricesController@destroy');
Route::resource('waki_prices', 'WakipricesController');

Route::resource('waki_invoices', 'WakiinvoicesController');
Route::post('/waki_invoices/{waki_invoice}/', 'WakiinvoicesController@update');
Route::get('/waki_invoices/{waki_invoice}/print', 'WakiinvoicesController@print');

// ROUTE BHI
Route::resource('bhi_prices', 'BhipricesController');
Route::get('bhi_prices/{bhi_price}/delete', 'BhipricesController@destroy');

Route::resource('bhi_invoices', 'BhiinvoicesController');
Route::get('/bhi_invoices/getproduk/{id}', 'BhiinvoicesController@getproduk');


Auth::routes(['verify' => true]);
