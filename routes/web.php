<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LoginAdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::post('/logout-admin', [LoginAdminController::class, 'logout'])->name('logout-admin');

Route::middleware('AdminDown')->group(function () {
Route::get('/login-admin', [LoginAdminController::class, 'showLoginForm']);
Route::post('/login-admin', [LoginAdminController::class, 'login'])->name('login-admin');

    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin Sudah Login
Route::middleware('AdminUp')->group(function () {
    Route::get('/home-admin', [HomeController::class, 'adminIndex'])->name('homeAdmin');
});
