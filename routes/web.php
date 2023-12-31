<?php

use App\Http\Controllers\ContactMeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\CategoryController ;

Auth::routes(['register' => false, 'confirm' => false]);

Route::middleware('AdminDown')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/toEmail', [LoginController::class, 'toEmail'])->name('toEmail');

    Route::post('/send_notif', [ContactMeController::class, 'sending'])->name('send_notif');
    Route::get('/search', [HomeController::class, 'search'])->name('search');
    Route::get('/certificate/{id}/view', [CertificateController::class, 'downloadCertificate'])->name('downloadCertificate');
});

Route::middleware('User')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/sertifikatku', [HomeController::class, 'sertifikatKu'])->name('sertifikat.user');
    Route::patch('/updateEmail', [ProfileController::class, 'updateEmail'])->name('update.email');
    Route::patch('/updatePassword', [ProfileController::class, 'changePassword'])->name('update.password');
});

// Admin Sudah Login
Route::middleware('AdminUp')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [HomeController::class, 'adminIndex'])->name('admin.home');
        Route::post('/logoutAdmin', [LoginController::class, 'logout'])->name('admin.logout');

        Route::resource('/certificate', CertificateController::class)->except(['destroy', 'show']);
        Route::resource('/category', CategoryController::class);
        Route::patch('/category/restore/{category}', [CategoryController::class,'restore'])->name('category.restore');
        Route::delete('/category/force_delete/{category}', [CategoryController::class, 'forceDelete'])->name('category.force_delete');

        Route::get('/certificate/create/exist', [CertificateController::class, 'createExist'])->name('certificate.create_exist');
        Route::post('/certificate/store/exist',[CertificateController::class, 'storeExists'])->name('certificate.store_exist');

        // Untuk Fitur Print
        Route::get('/get_certificate/{id}', [CertificateController::class, 'getCertificate'])->name('getCertificate');
        Route::get('/print_certificate', [CertificateController::class, 'printAllCertificate'])->name('printAllCertificate');
        Route::post('/send_certificate/{id}', [CertificateController::class, 'sendCertificate'])->name('sendCertificate');

        // notifikasi
        // Route::put('/read', [ContactMeController::class, 'read'])->name('read_notif');
        Route::delete('/delete_notif', [ContactMeController::class, 'delete'])->name('delete_notif');

        // Preview
        Route::get('/preview/{ct}', [CategoryController::class, 'preview'])->name('get_preview');
    });
});
