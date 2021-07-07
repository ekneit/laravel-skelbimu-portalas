<?php

use App\Http\Controllers\Api\UserNotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReportsController;
use App\Http\Controllers\Api\CategoryController;

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

Route::middleware('auth.basic')->apiResource('/user', UserController::class);
Route::middleware('auth.basic')->apiResource('/category', CategoryController::class);
Route::middleware('auth.basic')->apiResource('/notification', UserNotificationController::class);
Route::apiResource('/post', PostController::class);
Route::get('/reports/most-stared-by-category', [ReportsController::class, 'mostStarredByCategory']);

