<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

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
    return view('home');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/menu', [ProdukController::class, 'index']);
Route::get('/search', [ProdukController::class, 'search']);
Route::get('/pesanan/{id}', [ProdukController::class, 'pesanan'])->name('pesanan');
Route::post('/pesanan/{id}', [ProdukController::class, 'pesan'])->name('pesan');
Route::get('/co', [ProdukController::class, 'co'])->name('co');
Route::delete('/co/{id}', [ProdukController::class, 'delete'])->name('delete');
Route::get('/konfirmasi-co', [ProdukController::class, 'konfirmasi'])->name('konfirmasi');

Route::get('/history', [ProdukController::class, 'history'])->name('history');
Route::get('/history/{id}', [ProdukController::class, 'detail'])->name('detail');



require __DIR__.'/auth.php';
