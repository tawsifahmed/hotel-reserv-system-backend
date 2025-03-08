<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Administrative\AuthController;
use App\Http\Controllers\Administrative\HomeController;
use App\Http\Controllers\Administrative\NewsController;
use App\Http\Controllers\Administrative\RoleController;
use App\Http\Controllers\Administrative\UserController;
use App\Http\Controllers\Administrative\SliderController;
use App\Http\Controllers\Administrative\HistoryController;
use App\Http\Controllers\Administrative\PermissionController;
use App\Http\Controllers\Administrative\GalleryImageController;

// use Artisan;
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


Auth::routes();

Route::get('/',  function () {
    return view('welcome');
});
