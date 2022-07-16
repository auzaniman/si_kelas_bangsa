<?php

use App\Http\Controllers\UserMember\Auth\GoogleController;
use App\Http\Controllers\UserMember\Auth\LoginController;
use App\Http\Controllers\UserMember\Auth\SignupController;
use App\Http\Controllers\UserMember\DashboardController;
use App\Http\Controllers\UserOfficer\Auth\LoginController as OfficerLoginController;
use App\Http\Controllers\UserOfficer\DashboardController as OfficerDashboardController;
use App\Http\Controllers\UserOfficer\EventController;
use App\Http\Controllers\UserOfficer\InformasiBeritaController;
use App\Http\Controllers\UserOfficer\KategoriPeminatanController;
use App\Http\Controllers\UserOfficer\UserMemberController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

//Auth User Members
Route::get('login_member', [LoginController::class, 'index'])->name('login_member');
Route::post('login_member',[LoginController::class, 'login'])->name('auth.login_member');
Route::get('logout_member', [LoginController::class, 'logout'])->name('auth.logout_member');

Route::get('signup_member', [SignupController::class, 'index'])->name('signup_member');
Route::post('signup_member', [SignupController::class, 'signup'])->name('auth.signup_member');

Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.redirectToGoogle');
Route::get('auth/google/callback',[GoogleController::class, 'handleGoogleCallback'])->name('auth.handleGoogleCallback');

Route::middleware(['auth.user_member'])->name('user_member.')->prefix('user_member')->group(function () {
    // Dashboard
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


//Auth User Officers
Route::get('login_officer', [OfficerLoginController::class, 'index'])->name('login_officer');
Route::post('login_officer', [OfficerLoginController::class, 'login'])->name('auth.login_officer');
Route::get('logout_officer', [OfficerLoginController::class, 'logout'])->name('auth.logout_officer');

Route::middleware(['auth.user_officer'])->name('user_officer.')->prefix('user_officer')->group(function () {
    // Dashboard
    Route::get('dashboard', [OfficerDashboardController::class, 'index'])->name('dashboard');
    Route::get('user_member', [UserMemberController::class, 'index'])->name('table_member');
    Route::get('informasi_berita', [InformasiBeritaController::class, 'index'])->name('informasi_berita');
    Route::get('kategori_peminatan', [KategoriPeminatanController::class, 'index'])->name('kategori_peminatan');
    Route::get('event', [EventController::class, 'index'])->name('event');
});
