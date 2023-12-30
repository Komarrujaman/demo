<?php

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


Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('aws-details/{sn}', [AwsController::class, 'index']);
Route::get('aws', [AwsController::class, 'show']);
Route::get('wl-details', [WaterLevelController::class, 'index']);
