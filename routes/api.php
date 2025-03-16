<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoomController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\FloorController;
use App\Http\Controllers\API\ReservationController;
use App\Http\Controllers\API\NotificationController;
use App\Models\Reservation;

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
// API Routes for Floor Management
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

        Route::group(['prefix' => 'users'], function () {
            Route::get('/list', [UserController::class, 'data']);
            Route::get('/profile', [UserController::class, 'profile']);
            Route::post('/create', [UserController::class, 'createUser']);
            Route::post('/update/{id}', [UserController::class, 'update']);
            Route::delete('/delete/{id}', [UserController::class, 'destroy']);
            Route::get('/show/{id}', [UserController::class, 'show']);
            Route::get('/reservations', [UserController::class, 'reservation']);
        });

        Route::prefix('/floors')->group(function () {
            Route::get('/', [FloorController::class, 'index']);
            Route::post('/store', [FloorController::class, 'store']);
            Route::put('/update/{id}', [FloorController::class, 'update']);
            Route::delete('/delete/{id}', [FloorController::class, 'destroy']);
        });

        Route::prefix('/rooms')->group(function () {
            Route::get('/', [RoomController::class, 'index']);
            Route::post('/store', [RoomController::class, 'store']);
            Route::post('/update/{id}', [RoomController::class, 'update']);
            Route::delete('/delete/{id}', [RoomController::class, 'destroy']);
        });

        Route::prefix('/reservations')->group(function () {
            Route::get('/', [ReservationController::class, 'index']);
            Route::get('/show/{id}', [ReservationController::class, 'show'] );
            Route::post('/store', [ReservationController::class, 'store']);
            Route::post('/update/{id}', [ReservationController::class, 'update']);
            Route::delete('/delete/{id}', [ReservationController::class, 'destroy']);
            Route::get('/export-excel', [ReservationController::class, 'downloadExcelReport']);
        });

        Route::get('/notifications', [NotificationController::class, 'getNotifications']);
        Route::post('/notifications/update/{id}', [NotificationController::class, 'update']);
        Route::get('/notifications/read-all', [NotificationController::class, 'readAll']);

    });
});


