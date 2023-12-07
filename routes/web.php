<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;
use Illuminate\Support\Facades\User;
use App\Http\Controllers\User\GaleriController;
use App\Http\Controllers\User\BeritaController;
use App\Http\Controllers\TarifTolController;
use App\Http\Controllers\User\DokumenController;
use App\Http\Controllers\User\KaryawanController;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/galeri', [GaleriController::class,'index'])->name('galeri');
Route::get('/berita', [BeritaController::class,'index'])->name('berita');
Route::get('{id}/detail-berita', [BeritaController::class,'show'])->name('detail-berita');
Route::get('/tarif', [TarifTolController::class,'index']);
Route::get('/perusahaan', [DokumenController::class,'index'])->name('perusahaan');
Route::get('/karyawan', [KaryawanController::class,'index'])->name('karyawan');

Route::get('admin-page', function() {
    return view('admin/index');
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return view('index');
})->middleware('role:user')->name('user.page');

// Route::get('/detail', function () {
//     return view('user/detail-berita');
// });

Route::get('/profile', function () {
    return view('user/user-profile');
});

Route::get('/SetProfile', function () {
    return view('user/Profile-page');
});

Route::get('/visimisi', function () {
    return view('profil_perusahaan/visimisi');
});

Route::get('/struktur-organisasi', function () {
    return view('profil_perusahaan/struktur-organisasi');
});

Route::get('/susunan-dewan-komisaris', function () {
    return view('profil_perusahaan/susunan-dewan-komisaris');
});

Route::get('/susunan-direksi', function () {
    return view('profil_perusahaan/susunan-direksi');
});

Route::get('/link', function () {
    return view('profil_perusahaan/link');
});

Route::get('/pustaka', function () {
    return view('profil_perusahaan/pustaka');
});

Route::get('/about', function () {
    return view('user/aboutUs');
});

Route::get('/service', function () {
    return view('user/service');
});

Route::get('/contact', function () {
    return view('user/contact');
});

Route::get('/database', function () {
    return view('monitoring_lereng/database');
});

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

