<?php


use App\Http\Controllers\Administrative\ScanController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Administrative\AuthController;
use App\Http\Controllers\Administrative\HomeController;
use App\Http\Controllers\Administrative\RoleController;
use App\Http\Controllers\Administrative\UserController;
use App\Http\Controllers\Administrative\InstanceController;
use App\Http\Controllers\Administrative\CategoryController;
use App\Http\Controllers\Administrative\PermissionController;
use App\Http\Controllers\Frontend\InvitationController;
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

Route::get('/',function (){
    return view('frontend.welcome');
});
Route::get('/show-invitation/{type}/{instance_code}/{guest_code}', [InvitationController::class, 'invitation'])->name('show-invitation');
// Backend Routes
Auth::routes();

Route::namespace('Administrative')->middleware('guest')->group(function () {

    Route::get('/administrator/login', [AuthController::class, 'index'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])->name('login.post');
});

Route::namespace('Administrative')->middleware('auth')->prefix('administrative')->name('administrative.')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('permission:read_dashboard')->get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // category
    Route::prefix('category')->group(function () {
        Route::get('/list', [CategoryController::class, 'index'])->name('category');
        Route::get('user-data', [CategoryController::class, 'data'])->name('category.data');
        Route::get('create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('create', [CategoryController::class, 'store'])->name('category.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('delete/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    });
    // sub-category
    Route::prefix('sub-category')->group(function () {
        Route::get('/list', [InstanceController::class, 'index'])->name('sub-category');
        Route::get('instance-data', [InstanceController::class, 'data'])->name('sub-category.data');
        Route::get('show/{id}', [InstanceController::class, 'show'])->name('sub-category.show');
        Route::get('create', [InstanceController::class, 'create'])->name('sub-category.create');
        Route::post('create', [InstanceController::class, 'store'])->name('sub-category.store');
        Route::get('edit/{id}', [InstanceController::class, 'edit'])->name('sub-category.edit');
        Route::put('update/{id}', [InstanceController::class, 'update'])->name('sub-category.update');
        Route::delete('delete/{id}', [InstanceController::class, 'destroy'])->name('sub-category.destroy');
    });
   // sub-category
    Route::prefix('team')->group(function () {
        Route::get('/list', [InstanceController::class, 'index'])->name('team');
        Route::get('instance-data', [InstanceController::class, 'data'])->name('team.data');
        Route::get('show/{id}', [InstanceController::class, 'show'])->name('team.show');
        Route::get('create', [InstanceController::class, 'create'])->name('team.create');
        Route::post('create', [InstanceController::class, 'store'])->name('team.store');
        Route::get('edit/{id}', [InstanceController::class, 'edit'])->name('team.edit');
        Route::put('update/{id}', [InstanceController::class, 'update'])->name('team.update');
        Route::delete('delete/{id}', [InstanceController::class, 'destroy'])->name('team.destroy');
    });




});
