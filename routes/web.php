<?php

use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\ProfileController;
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
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

    Route::post('/send_notif', [ContactMeController::class, 'sending'])->name('send_notif');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/certificate/{id}/view', [CertificateController::class, 'downloadCertificate'])->name('downloadCertificate');
});

Route::middleware('User')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/sertifikatku', [HomeController::class, 'sertifikatKu'])->name('sertifikat.user');
    Route::patch('/updateEmail', [ProfileController::class, 'updateEmail'])->name('update.email');
});

// Admin Sudah Login
Route::middleware('AdminUp')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'adminIndex'])->name('admin.home');
        Route::post('/logoutAdmin', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('/datatable', function () {
            return view('admin.ListSertifikat');
        });
        Route::get('/upload/background', [detailCertificateController::class, 'uploadBackground']);
        Route::get('/list', function (){
            return view('admin.certificate.listSertifikat');
        });
        Route::resource('/certificate', CertificateController::class);
        Route::get('/tambahKategori', [detailCertificateController::class, 'tambahKategori'])->name('tambahKategori');
        Route::get('/certificate/create/exist', [CertificateController::class, 'createExist'])->name('certificate.create_exist');
        Route::post('/certificate/store/exist',[CertificateController::class, 'storeExists'])->name('certificate.store_exist');

        // Untuk Fitur Print
        Route::get('/get_certificate/{id}', [CertificateController::class, 'getCertificate'])->name('getCertificate');
        Route::get('/print_certificate', [CertificateController::class, 'printAllCertificate'])->name('printAllCertificate');
        Route::post('/send_certificate/{id}', [CertificateController::class, 'sendCertificate'])->name('sendCertificate');

        // notifikasi
        // Route::put('/read', [ContactMeController::class, 'read'])->name('read_notif');
        Route::delete('/delete_notif', [ContactMeController::class, 'delete'])->name('delete_notif');
    });
});

// Testing
Route::get('/send-mail', [DemoTestController::class, 'sendMail']);
Route::get('/show-certificate', [DemoTestController::class, 'showCertificate']);
Route::get('/form-repeater', [DemoTestController::class, 'repeater']);
Route::get('/copy', [DemoTestController::class, 'copy']);
Route::get('/p', function () {
    return view('user.profile');
});

Route::get('/tes', function () {
    return view('errors.certificatenotfound')->name(

    );
});
