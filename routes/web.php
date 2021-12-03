<?php

use App\Http\Controllers\pemesananController;
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

Route::get('/', [pemesananController::class, 'index']);
Route::get('/pemesanan/{id}', [pemesananController::class, 'pemesanan'])->name('pemesanan');
Route::post('/pesan/{id}', [pemesananController::class, 'store'])->name('pesan.store');

// Route::resource('pesan', 'pemesananController');
