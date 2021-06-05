<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegistrationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login',[LoginController::class,'index'])->name('authentication.login');
Route::post('/login',[LoginController::class,'login']);

Route::get('/logout',[LoginController::class,'logout'])->name('authentication.logout');

Route::get('/register',[RegistrationController::class,'index'])->name('authentication.registration');
Route::post('/register',[RegistrationController::class,'save']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('/', function () {
    return view('home');
})->name('home');
