<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PpdbControllers\PpdbController;
use App\Http\Controllers\PiketControllers\PiketController;
use App\Http\Controllers\PpdbControllers\OCRScanController;
use App\Http\Controllers\PpdbControllers\StudentController;
use App\Http\Controllers\AdminStaffControllers\AdminStaffController;

// Home App
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();

# System Login & Registration
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store-register');
# System End

# PPDB Route
Route::middleware(['auth'])->group(function () {
    Route::get('/ppdb/home', [PpdbController::class, 'index']);
    Route::get('/ppdb/tambah-data', [PpdbController::class, 'tambahData']);
    // Route::get('/ppdb/export-data', [PpdbController::class, 'exportData'])->name('export-data');
    // Route::get('/ppdb/export-data-view', [PpdbController::class, 'exportForm'])->name('export-form-view')->middleware('userRole');
    Route::get('/ppdb/excel-export', [PpdbController::class, 'exportDataToExcel']);
    Route::get('/ppdb/students/show', [PpdbController::class, 'show'])->name('students.show');
    Route::resource('ppdb/data-siswa', StudentController::class)->names(
        [
            'show' => 'data-siswa.show',
        ]
    );

    // OCR Relationship 
    Route::get('/ppdb/scan', [OCRScanController::class, 'showform'])->name('scan');
    Route::post('/ppdb/upload', [OCRScanController::class, 'uploadImage'])->name('upload');
    Route::post('/ppdb/store', [OCRScanController::class, 'store'])->name('store');
});

# ADMIN (Staff) Route
// Route::get('/admin/staff/home', [AdminStaffController::class, 'index'])->name('admin-staff');

# Absensi 
// routes/web.php
Route::get('/absen-hari-ini/form', function () {
    return view('absencePages.pages.input-token');
});
Route::get('/absensi/validate', [PiketController::class, 'validateToken'])->name('absen.validate');
Route::get('/absen-hari-ini', [PiketController::class, 'index'])->name('absen.index');
Route::post('/absen-hari-ini', [PiketController::class, 'create'])->name('absen.create');


Route::middleware(['auth'])->group(function () {
    // khusus admin disini
});
