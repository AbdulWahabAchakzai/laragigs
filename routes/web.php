<?php

use App\Http\Controllers\ListingController;
use Illuminate\Support\Facades\Route;
use App\Models\Listing;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',  [ListingController::class, 'index']);


Route::get('/listings/{listing}',  [ListingController::class, 'show']);


/*
 ** Common resource routes **

index - Show all listings
show - Show single listing
create - Show form to create new listing
store - Store new listing
edit - show form to edit form
update - Update listing
destroy - Delete listing

*/
