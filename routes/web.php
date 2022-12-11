<?php

use App\Http\Controllers\beritaController;
use App\Http\Controllers\homepageController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/





Route::controller(homepageController::class)->group(function () {
    Route::get('/', 'home')->name('home');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/berita/{id}', 'tampilberita')->name('tampilberita');
});


Route::middleware('auth')->group(function () {
    Route::controller(beritaController::class)->group(function () {
        Route::get("/dashboard", 'berita')->name('dashboard');
        Route::get("/tambahberita", 'tambah_berita')->name('tambahberita');
        Route::post('/tambahberita', 'tambah_berita_proccess')->name('tambah_berita_process');

        Route::get("/updateberita/{id}", 'edit_berita')->name('editberita');
        Route::put("/updateberita/{id}/{image}", 'edit_berita_proccess')->name('edit_berita_process');

        Route::get('/hapusberita/{id_berita}', 'hapus_berita')->name('hapusberita');

        Route::get('/detailberita/{id}', 'detail_berita')->name('detailberita');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

require __DIR__ . '/auth.php';
