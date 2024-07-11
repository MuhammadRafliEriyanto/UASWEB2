<?php

use App\Http\Controllers\perhitungancontroller;
use App\Models\Inputan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SubkriteriaController;
use App\Http\Controllers\alternatifcontroller;
use App\Http\Controllers\bobotcontroller;
use App\Http\Controllers\rekomendasicontroller;
use App\Http\Controllers\akuncontroller;
use App\Http\Controllers\calculateTOPSISController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\SocialiteController;

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
    return redirect()->route('landing');
});


Route::get('/landing', function () {
    return view('user.landing');
})->name('landing');

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');

// Rute logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/login/google', [SocialiteController::class, 'redirectToGoogle'])->name('google-login');

// Route for handling Google OAuth callback
Route::get('/auth/google/callback', [SocialiteController::class, 'handleGoogleCallback']);


Route::get('forgot-password', [LoginController::class, 'forgot_password'])->name('forgot-password');
Route::post('forgot-password', [LoginController::class, 'forgot_password_act'])->name('forgot-password-act');

Route::get('/validasi-forgot-password/{token}/{email}', [LoginController::class, 'validasi_forgot_password'])->name('validasi-forgot-password');
Route::post('/validasi-forgot-password-act/{email}', [LoginController::class, 'validasi_forgot_password_act'])->name('validasi-forgot-password-act');

Route::post('login-proses', [LoginController::class, 'login'])->name('login-proses');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::get('/email/verify/{id}', [LoginController::class, 'verifyEmail'])->name('verification.verify');

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Buat view ini sesuai kebutuhan Anda
    })->name('admin.dashboard');

    Route::get('admin/kriteria', [KriteriaController::class, 'index'])->name('admin.kriteria');
Route::get('/admin/kriteria/create', [KriteriaController::class, 'create'])->name('admin.kriteria.create');
Route::post('/admin/kriteria/store', [KriteriaController::class, 'store'])->name('admin.kriteria.store');
Route::get('chipsets/{id}/edit', [KriteriaController::class, 'edit'])->name('admin.kriteria.edit');
Route::put('chipsets/{id}', [KriteriaController::class, 'update'])->name('admin.kriteria.update');
Route::delete('admin/kriteria/{id}', [KriteriaController::class, 'destroy'])->name('admin.kriteria.destroy');

    Route::get('/admin/subkriteria', [SubkriteriaController::class, 'index'])->name('admin.subkriteria');
    Route::get('/admin/subkriteria/create', [SubkriteriaController::class, 'create'])->name('admin.subkriteria.create');
    Route::post('/admin/subkriteria', [SubkriteriaController::class, 'store'])->name('admin.subkriteria.store');
    Route::get('/admin/subkriteria/{id}/edit', [SubkriteriaController::class, 'edit'])->name('admin.subkriteria.edit');
    Route::put('/admin/subkriteria/{id}', [SubkriteriaController::class, 'update'])->name('admin.subkriteria.update');
    Route::delete('/admin/subkriteria/{id}', [SubkriteriaController::class, 'destroy'])->name('admin.subkriteria.destroy');

    Route::get('/admin/alternatif', [alternatifcontroller::class, 'index'])->name('admin.alternatif');
    Route::get('/admin/alternatif/create', [alternatifcontroller::class, 'create'])->name('admin.subkriteria.create');
    Route::post('/admin/alternatif', [alternatifcontroller::class, 'store'])->name('admin.alternatif.store');
    Route::get('/admin/alternatif/{id_alternatif}/edit', [alternatifcontroller::class, 'edit'])->name('admin.alternatif.edit');
    Route::put('/admin/alternatif/{id_alternatif}', [alternatifcontroller::class, 'update'])->name('admin.alternatif.update');
    Route::delete('/admin/alternatif/{id_alternatif}', [alternatifcontroller::class, 'destroy'])->name('admin.alternatif.destroy');

    Route::get('/admin/topsis', [calculateTOPSISController::class, 'calculateTOPSIS'])->name('admin.topsis');

    Route::get('/admin/akun', [akuncontroller::class, 'index'])->name('admin.akun');


});
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    Route::get('/user/rekomendasi', [rekomendasicontroller::class, 'index'])->name('user.rekomendasi');
    Route::post('/user/rekomendasi/process', [rekomendasicontroller::class, 'process'])->name('user.rekomendasi.process');
    Route::post('/user/rekomendasi/store', [rekomendasicontroller::class, 'store'])->name('rekomendasi.store');
    Route::delete('/rekomendasi/{id}', [RekomendasiController::class, 'destroy'])->name('rekomendasi.destroy');

    Route::get('/masukkan-bobot', [BobotController::class, 'masukkanBobot'])->name('user.input');
    Route::get('/bobot/create', [BobotController::class, 'create'])->name('bobot.create');
    Route::post('/bobot/store', [BobotController::class, 'store'])->name('bobot.store');
    Route::get('/bobot/edit/{id_bobot}', [BobotController::class, 'edit'])->name('bobot.edit');
    Route::put('/bobot/update/{id_bobot}', [BobotController::class, 'update'])->name('bobot.update');
    Route::delete('/bobot/destroy/{id_bobot}', [BobotController::class, 'destroy'])->name('bobot.destroy');
    Route::post('/simpan-bobot', [BobotController::class, 'simpanBobot'])->name('simpan.bobot');

    Route::post('/simpan-bobot', [RekomendasiController::class, 'addBobot'])->name('simpan.bobotUser');
    Route::post('/topsis/calculate', [RekomendasiController::class, 'PerhitunganTopsis'])->name('PerhitunganTopsis');


    

});


