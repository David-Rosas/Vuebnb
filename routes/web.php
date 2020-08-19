<?php

use App\Listing;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
Use App\Listings;
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

Route::get('/listing/{listing}', 'ListingController@getListingsWeb');

Route::get('api/listings/{listing}', 'ListingController@getListingsApi');

Auth::routes();

