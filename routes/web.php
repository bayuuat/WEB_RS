<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\pemesananController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Controller;

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

Route::get('/', [pemesananController::class, 'index']);
Route::get('/pemesanan/{id}', [pemesananController::class, 'pemesanan'])->name('pemesanan');
Route::post('/pesan/{id}', [pemesananController::class, 'store'])->name('pesan.store');

Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/registered', [RegisterController::class, 'store'])->name('registered');

Route::prefix('dashboard')
    ->namespace('Dashboard')
    ->group(function () {
        Route::get('/', [homeController::class, 'dashboard'])->name('dashboard');
        Route::resource('user', 'UserController');
        Route::resource('rs', 'RumahSakitController');
        Route::resource('pesan', 'PemesananController');
    });
