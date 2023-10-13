<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();
Route::get('/login-admin', [LoginController::class, 'showLoginForm']);
Route::post('/login-admin', [LoginController::class, 'login'])->name('login');
Route::post('/logout-admin', [LoginController::class, 'login'])->name('logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Sudah Login
Route::middleware('AdminUp')->group(function () {

});

// Admin Belum Login
Route::middleware('AdminDown')->group(function () {

});
