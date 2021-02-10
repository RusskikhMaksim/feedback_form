<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\UserAppealController;
use App\Http\Controllers\UserController;
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

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('getRegisterForm');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('getLoginForm');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::group(['middleware' => 'checkRole'], function () {
    Route::get('/appeal', [UserAppealController::class, 'showAppealForm'])->name('getAppealForm');
    Route::post('/appeal', [UserAppealController::class, 'appeal'])->name('appeal');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'checkAdmin', 'prefix' => 'admin_panel'], function () {
    Route::get('/', [ManagerController::class, 'showAdminPanel'])->name('getAdminPanel');
    Route::get('/reviewed', [ManagerController::class, 'showReviewedAppeals'])->name('getReviewedAppeals');
    Route::post('/{id}', [ManagerController::class, 'reviewAppeal'])->name('reviewAppeal');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logoutAdmin');
});

