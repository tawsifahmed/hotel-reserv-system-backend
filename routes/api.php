<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\FloorController;
use App\Http\Controllers\API\ReservationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// authentication
Route::group(['prefix' => 'v1', 'as' => 'api', 'namespace' => 'Api'], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('invite-user-register', [AuthController::class, 'guestUserRegister']);
    Route::post('verify-email', [AuthController::class, 'verifyEmail']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('forgot-password-otp', [AuthController::class, 'forgotPasswordOtp']);
    Route::post('resend-otp', [AuthController::class, 'resentOtp']);

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('reset-password', [AuthController::class, 'resetPassword']);
        Route::post('logout', [AuthController::class, 'logout']);
    });
});

// floors
Route::prefix('/floors')->group(function () {
    Route::get('/', [FloorController::class, 'index']);
    Route::post('/', [FloorController::class, 'store']);
    Route::put('/{id}', [FloorController::class, 'update']);
    Route::delete('/{id}', [FloorController::class, 'destroy']);
});

// rooms
Route::prefix('/rooms')->group(function () {
    Route::get('/', [RoomController::class, 'index']);
    Route::post('/', [RoomController::class, 'store']);
    Route::put('/{id}', [RoomController::class, 'update']);
    Route::delete('/{id}', [RoomController::class, 'destroy']);
});

// reservation 
Route::prefix('reservations')->group(function () {
    Route::get('/', [ReservationController::class, 'index']);
    Route::post('/', [ReservationController::class, 'store']);
    Route::put('/{id}', [ReservationController::class, 'update']);
    Route::delete('/{id}', [ReservationController::class, 'destroy']);
});
