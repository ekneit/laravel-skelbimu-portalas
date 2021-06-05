<?php

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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/register',[RegistrationController::class,'index'])->name('authentication.registration');
Route::post('/register',[RegistrationController::class,'save']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
