<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WaterLevelController;
use Illuminate\Support\Facades\Route;

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


// Auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('auth', [AuthController::class, 'auth']);
Route::get('logout', [AuthController::class, 'logout']);

// Main Dashboard
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// AWS Device
Route::middleware('auth')->group(function () {
    Route::get('aws', [AwsController::class, 'show']);
    Route::get('aws-details/{sn}', [AwsController::class, 'index']);
});


// AWLR Device
Route::middleware('auth')->group(function () {
    Route::get('wl-details', [WaterLevelController::class, 'index']);
});


// User Management
Route::middleware('auth')->group(function () {
    Route::get('user', [AdminController::class, 'index']);
    Route::post('user/create', [AdminController::class, 'store']);
    Route::get('user/delete/{id}', [AdminController::class, 'destroy']);
    Route::post('user/edit', [AdminController::class, 'update']);
});
