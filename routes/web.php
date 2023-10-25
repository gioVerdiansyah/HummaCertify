<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\DemoTestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\detailCertificateController;

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

Route::middleware('User')->group(function () {

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
        Route::resource('/certificate', CertificateController::class);
        Route::get('/certificate/create/exist', [CertificateController::class, 'createExist'])->name('certificate.create_exist');
        Route::post('/certificate/store/exist',[CertificateController::class, 'storeExists'])->name('certificate.store_exist');

        // print
        Route::get('/get_certificate/{id}', [CertificateController::class, 'getCertificate'])->name('getCertificate');
        Route::get('/print_certificate/{ct}', [CertificateController::class, 'printAllCertificate'])->name('printAllCertificate');
        Route::post('/send_certificate/{id}', [CertificateController::class, 'sendCertificate'])->name('sendCertificate');
    });
});

// testing
Route::get('/send-mail', [DemoTestController::class, 'sendMail']);
Route::get('/show-certificate', [DemoTestController::class, 'showCertificate']);
Route::get('/form-repeater', [DemoTestController::class, 'repeater']);
