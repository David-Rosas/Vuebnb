<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', 'ListingController@get_home_web');

Route::get('/listing/{listing}', 'ListingController@getListingsWeb');

Route::get('/api/listing/{listing}', 'ListingController@getListingsApi');

Route::get('/api', 'ListingController@get_home_api');

Auth::routes();

