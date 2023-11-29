<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\ForgotPasswordController;

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
Route::get('/galeri', [GaleriController::class,'index']);


Route::get('/berita', function () {
    return view('user/berita');
});

Route::get('admin-page', function() {
    return view('admin/index');
})->middleware('role:admin')->name('admin.page');

Route::get('user-page', function() {
    return view('index');
})->middleware('role:user')->name('user.page');

// Route::get('/galeri', function () {
//     return view('user/galeri');
// });

Route::get('/detail', function () {
    return view('user/detail-berita');
});

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


Route::get('/tarif', function () {
    return view('user/tariftol');
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

Route::get('/finance_sk_direksi', function () {
    return view('dokumen_perusahaan/finance_sk_direksi');
});

Route::get('/finance', function () {
    return view('dokumen_karyawan/finance');
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Admin', 'middleware' => ['role:admin']], function () {
    Route::resource('user', UserController::class);
    Route::resource('tarif', TarifTolController::class);
    Route::controller(UserController::class)->group(function () {
        Route::get('trash', 'trash')->name('trash');
        Route::post('{id}/restore', 'restore')->name('restore');
        Route::delete('{id}/delete-permanent', 'deletePermanent')->name('deletePermanent');
        Route::get('{id}/change-password', 'changePassword')->name('change-password');
        Route::put('{id}/update-password', 'updatePassword')->name('update-password');

    });
    Route::controller(UploadController::class)->group(function () {
        Route::get('upload', 'upload')->name('upload');
        Route::post('file-upload', 'fileUpload')->name('fileUpload');
    });
});