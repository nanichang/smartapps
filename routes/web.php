<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', function () {
    return view('layouts.master');
});

Route::group(['prefix'=> 'auth'], function () {
    Route::get('register', [RegisterController::class,'register'])->name('auth.register.get');
    Route::post('register', [RegisterController::class,'store'])->name('auth.register.post');

    Route::get('login', [LoginController::class, 'getLogin'])->name('auth.login.get');
    Route::post('login', [LoginController::class, 'login'])->name('auth.login.post');

    Route::get('logout', [LogoutController::class, 'signOut'])->name('auth.logout.get');
});

Route::group(['prefix'=> 'dashboard'], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/profile-picture-upload', [DashboardController::class, 'update'])->name('dashboard.profile.patch');
});
