<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController; 
use App\Http\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

Route::controller(ApiController::class)->group(function () {
    Route::get('state-list', 'stateList');
    Route::get('city-list/{id}', 'cityList');
    Route::post('otp-verification', 'verifyOtp');
    Route::get('user-profile/{id}', 'userProfile');
    Route::post('update-password', 'updatePassword');  
    Route::get('xray-types', 'xrayTypes');
    Route::post('add-location', 'addLocation');
    Route::get('location-list/{id}', 'userLocations');
    Route::post('add-booking', 'AddBooking');
    Route::get('booking-details/{id}', 'bookingDetails');
    Route::post('forgot-password', 'forgotPassword');
    Route::post('verify-forgot-otp', 'verifyForgotOtp');
    Route::post('update-profile', 'updateUserProfile');
    Route::post('update-center-location', 'updateCenterlocation');
    Route::get('center-booking-list/{id}', 'centerBookingList');
    Route::post('add-center-operator', 'addOperator');
    Route::get('center-operator-list/{id}', 'operatorList');
    Route::get('doctor-list', 'doctorList');
    Route::get('doctor-dashbord', 'doctorDashbord');
    Route::get('center-dashbord', 'centerDashbord');
    Route::get('operator-dashbord', 'operatorDashbord');
});