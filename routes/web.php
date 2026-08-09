<?php

use App\Http\Controllers\AchievementController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpmbController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (Website Sekolah)
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil', [ProfileController::class, 'index'])->name('profile');

Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/{slug}', [JurusanController::class, 'show'])->name('jurusan.show');

Route::get('/guru', [GuruController::class, 'index'])->name('guru');

Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurricular.index');
Route::get('/ekstrakurikuler/{id}', [ExtracurricularController::class, 'show'])->name('extracurricular.show');

Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery');

Route::get('/berita', [NewsController::class, 'index'])->name('news.index');
Route::get('/berita/{slug}', [NewsController::class, 'show'])->name('news.show');

Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievement');

Route::get('/spmb', [SpmbController::class, 'index'])->name('spmb');


/*
|--------------------------------------------------------------------------
| ADMIN AUTH (Login / Logout)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
});


/*
|--------------------------------------------------------------------------
| ADMIN PANEL (CRUD — dilindungi middleware auth)
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Jurusan + sub galeri per jurusan
    Route::resource('jurusan', \App\Http\Controllers\Admin\JurusanController::class)
        ->except(['show'])
        ->parameters(['jurusan' => 'jurusan']);
    Route::post('/jurusan/{jurusan}/galeri', [\App\Http\Controllers\Admin\JurusanController::class, 'storeGaleri'])->name('jurusan.galeri.store');
    Route::delete('/jurusan/{jurusan}/galeri/{galeri}', [\App\Http\Controllers\Admin\JurusanController::class, 'destroyGaleri'])->name('jurusan.galeri.destroy');

    // Berita
    Route::resource('berita', \App\Http\Controllers\Admin\BeritaController::class)
        ->except(['show'])
        ->parameters(['berita' => 'berita']);

    // Guru
    Route::resource('guru', \App\Http\Controllers\Admin\GuruController::class)
        ->except(['show'])
        ->parameters(['guru' => 'guru']);

    // Ekstrakurikuler
    Route::resource('ekstrakurikuler', \App\Http\Controllers\Admin\EkstrakurikulerController::class)
        ->except(['show'])
        ->parameters(['ekstrakurikuler' => 'ekstrakurikuler']);

    // Galeri (tambah & hapus foto saja)
    Route::get('/galeri', [\App\Http\Controllers\Admin\GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/galeri/create', [\App\Http\Controllers\Admin\GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [\App\Http\Controllers\Admin\GaleriController::class, 'store'])->name('galeri.store');
    Route::delete('/galeri/{galeri}', [\App\Http\Controllers\Admin\GaleriController::class, 'destroy'])->name('galeri.destroy');

    // Prestasi
    Route::resource('prestasi', \App\Http\Controllers\Admin\PrestasiController::class)
        ->except(['show'])
        ->parameters(['prestasi' => 'prestasi']);

    // Testimonial
    Route::resource('testimonial', \App\Http\Controllers\Admin\TestimonialController::class)
        ->except(['show'])
        ->parameters(['testimonial' => 'testimonial']);

    // Pengaturan Profil Sekolah (singleton)
    Route::get('/pengaturan', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('setting.edit');
    Route::put('/pengaturan', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('setting.update');

    // Informasi SPMB (singleton)
    Route::get('/spmb', [\App\Http\Controllers\Admin\SpmbController::class, 'edit'])->name('spmb.edit');
    Route::put('/spmb', [\App\Http\Controllers\Admin\SpmbController::class, 'update'])->name('spmb.update');
});
