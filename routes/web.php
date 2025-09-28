<?php

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PpdbControllers\PpdbController;
use App\Http\Controllers\PiketControllers\PiketController;
use App\Http\Controllers\PpdbControllers\OCRScanController;
use App\Http\Controllers\PpdbControllers\StudentController;
use App\Http\Controllers\PiketControllers\Admin\KelasController;
use App\Http\Controllers\PiketControllers\Admin\DashboardController;
use App\Http\Controllers\PiketControllers\Admin\MessageTemplateController;
use App\Http\Controllers\PiketControllers\Admin\AttendanceExportController;
use App\Http\Controllers\PiketControllers\Admin\AttendanceReportController;
use App\Http\Controllers\ManagementControllers\DashboardController as ManagementControllersDashboardController;

// Welcome display
Route::get('/', function () {
    return view('welcome');
});
Auth::routes();


# Login & Registration
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('store-register');


# SPMB System 
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


# Attendance System  
Route::get('/absen-hari-ini/form', function () {
    return view('absencePages.pages.input-token');
})->name('absen.token-form');

Route::post('/absensi/validate', [PiketController::class, 'validateToken'])->name('absen.validate');
Route::post('/absen-hari-ini/signature', [PiketController::class, 'sign'])->name('absen.sign');
Route::get('/absen-hari-ini', [PiketController::class, 'index'])
    ->middleware('absen_token_verified') // opsional pakai middleware
    ->name('absen.index');
Route::post('/absen-hari-ini', [PiketController::class, 'create'])->name('absen.create');

Route::middleware(['auth'])->group(function () {
    Route::resource('/presence-dash/message-templates', MessageTemplateController::class)
        ->except(['create', 'store', 'destroy']);
    Route::get('/presence-dash', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/presence-dash/kelola-kelas', [KelasController::class, 'index'])->name('dashboard.pengelolaan');
    Route::get('/presence-dash/kelola-kelas/{id}', [KelasController::class, 'show'])->name('dashboard.show');
    Route::post('/presence-dash/kelola-kelas/{id}/tambah-siswa', [KelasController::class, 'tambahSiswa'])->name('dashboard.tambahSiswa');
    Route::get('/presence-dash/attendance-report', [AttendanceReportController::class, 'index'])->name('attendance.report');
    Route::post('/presence-dash/attendance-report/generate', [AttendanceReportController::class, 'generateReport'])->name('attendance.report.generate');

    Route::get('/export', [AttendanceExportController::class, 'index'])->name('attendance.export.index');
    Route::get('/export/process', [AttendanceExportController::class, 'export'])->name('attendance.export');
});


# Management System
Route::get('/management-system', [ManagementControllersDashboardController::class, 'index'])->name('manage.dashboard');
