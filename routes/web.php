<?php

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

Route::get('/', [HomeController::class, 'index']);
Route::get('aws-details', [AwsController::class, 'index']);
Route::get('aws', [AwsController::class, 'show']);
Route::get('wl-details', [WaterLevelController::class, 'index']);
