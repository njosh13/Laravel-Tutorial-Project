<?php

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;


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
Route::resource('listings', ListingController::class);

// // All Listing
Route::get('/', [ListingController::class, 'index']);

// // Show Create Form
// Route::get('/listings/create', [ListingController::class, 'create'] );


// // Create Listing Data
// Route::post('/listings', [ListingController::class, 'store']);

// // Create Listing Data
// Route::get('/listings/{listing}/edit', [ListingController::class, 'edit']);

// //  Update listing
// Route::put('/listings/{listing}', [ListingController::class, 'update'] );

// //  Update listing
// Route::delete('/listings/{listing}', [ListingController::class, 'destroy'] );

// //Single Listing
// Route::get('/listings/{listing}', [ListingController::class, 'show']);

// Show Register/Create Form
Route::get('/register', [UserController::class, 'create']);

// Show Register/Create Form
Route::post('/users', [UserController::class, 'store']);

// Log user out
Route::post('/logout', [UserController::class, 'logout']);

// Show Login Form
Route::get('/login', [UserController::class, 'login']);

//Login User
Route::post('/users/authenticate' , [UserController::class, 'authenticate']);

