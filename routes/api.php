<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PreLoginController;
use App\Http\Controllers\API\PostLoginController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group([
    'middleware' => 'auth:api'
  ], function() {
	Route::post('/create-event', [postLoginController::class, 'CreateEvent']);
  });

Route::post('/login', [preLoginController::class, 'Login']);
Route::post('/register', [preLoginController::class, 'Register']);
Route::get('/banner', [preLoginController::class, 'Banner']);
Route::post('/send-otp', [preLoginController::class, 'sendOtp']);
Route::post('/submit-otp', [preLoginController::class, 'submitOtp']);
Route::get('/profile/{id}', [preLoginController::class, 'Profile']);
Route::get('/users', [preLoginController::class, 'Users']);
Route::get('/event', [preLoginController::class, 'Event']);
Route::post('/search-event', [preLoginController::class, 'searchEvent']);

Route::get('/society', [preLoginController::class, 'society']);
Route::post('/tower', [preLoginController::class, 'Tower']);
Route::post('/flat', [preLoginController::class, 'Flat']);
Route::get('/event', [preLoginController::class, 'event']);
Route::get('/splashscreen', [preLoginController::class, 'Splashscreen']);
Route::post('/profile-update', [postLoginController::class, 'profileUpdate']);
