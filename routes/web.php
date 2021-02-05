<?php

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

Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('getRegisterForm');
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');

Route::get('/login', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('getLoginForm');
Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

Route::get('/appeal', [\App\Http\Controllers\UserAppealController::class, 'showAppealForm'])->name('getAppealForm');
Route::post('/appeal', [\App\Http\Controllers\UserAppealController::class, 'appeal'])->name('appeal');
