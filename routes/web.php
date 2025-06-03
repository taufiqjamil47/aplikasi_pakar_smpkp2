<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PpdbControllers\PpdbController;
use App\Http\Controllers\PpdbControllers\StudentController;
use App\Http\Controllers\AdminStaffControllers\AdminStaffController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/ppdb/export-data', [PpdbController::class, 'exportData'])->name('export-data');
    Route::get('/ppdb/export-data-view', [PpdbController::class, 'exportForm'])->name('export-form-view')->middleware('userRole');
    Route::get('/ppdb/students/show', [PpdbController::class, 'show'])->name('students.show');
    Route::get('/get-total-siswa', [PpdbController::class, 'totalSiswa']);

    Route::resource('ppdb/data-siswa', StudentController::class)->names(
        [
            'show' => 'data-siswa.show',
        ]
    );
});

# ADMIN (Staff) Route
Route::get('/admin/staff/home', [AdminStaffController::class, 'index'])->name('admin-staff');
