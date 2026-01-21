<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\BackgroundImageController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\AdminController;

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

// Display Page (Public)
Route::get('/', [DisplayController::class, 'index'])->name('display');

// Display API Endpoints (untuk AJAX)
Route::prefix('api')->group(function () {
    Route::get('/jadwal', [DisplayController::class, 'getJadwalApi']);
    Route::get('/carousel', [DisplayController::class, 'getCarouselApi']);
    Route::get('/video', [DisplayController::class, 'getVideoApi']);
    Route::get('/background', [DisplayController::class, 'getBackgroundApi']);
});

// Admin Panel
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('informasi', InformasiController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('carousel', CarouselController::class);
    Route::resource('video', VideoController::class);
    Route::resource('background', BackgroundImageController::class);

    // Auth (Simplified for now)
    Route::post('/logout', function () {
        auth()->logout();
        return redirect('/');
    })->name('logout');
});

// Keep this for backward compatibility
Route::resource('informasi', InformasiController::class);
