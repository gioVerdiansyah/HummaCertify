<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\DemoTestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\detailCertificateController;

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
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});

// Admin Sudah Login
Route::middleware('AdminUp')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'adminIndex'])->name('admin.home');
        Route::post('/logoutAdmin', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('/datatable', function () {
            return view('admin.ListSertifikat');
        });

        Route::get('/list', function (){
            return view('admin.certificate.listSertifikat');
        });
        Route::resource('/certificate', PesertaController::class);
        Route::get('/get_certificate/{id}', [CertificateController::class, 'getCertificate'])->name('getCertificate');
        Route::post('/send_detail/{id}', [CertificateController::class, 'storeDetailSertifikat'])->name('storeDetailCertificate');
        Route::post('/detailCertificate/{id}', [detailCertificateController::class, 'store'])->name('detailCertificate');
    });
});

// testing
Route::get('/send-mail', [DemoTestController::class, 'sendMail']);
Route::get('/show-certificate', [DemoTestController::class, 'showCertificate']);
