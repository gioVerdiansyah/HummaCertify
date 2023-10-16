<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DemoTestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DaftarPesertaController;

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

// Auth::routes();

Route::middleware('AdminDown')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/loguot', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin Sudah Login
Route::middleware('AdminUp')->group(function () {
    Route::get('/home-tambah', function () {
       return view('admin.TambahAdd');
    });
    Route::get('/home-tambah-sudahada', function () {
        return view('admin.TambahExist');
    });
    Route::get('/datatable', function () {
        return view('admin.ListSertifikat');
    });
    Route::get('/home-admin', [HomeController::class, 'adminIndex'])->name('homeAdmin');
    Route::post('/logout-admin', [LoginController::class, 'logout'])->name('logout-admin');
    Route::post('DaftarPesertaCreate', [DaftarPesertaController::class, 'store'])->name('DaftarPesertaCreate');
    Route::put('DaftarPesertaUpdate/{id}', [DaftarPesertaController::class, 'update'])->name('DaftarPesertaUpdate');
    Route::delete('DaftarPesertaDelete/{id}', [DaftarPesertaController::class, 'destroy'])->name('DaftarPesertaDelete');
});

// testing
Route::get('/send-mail', [DemoTestController::class, 'sendMail']);
Route::get('/show-certificate', [DemoTestController::class, 'showCertificate']);
