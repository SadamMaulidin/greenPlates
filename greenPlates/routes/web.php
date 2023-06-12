<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\AdminController;
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

Route::get('/dashboard_admin', function () {
    return view('admin.dashboard-admin');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::get('/admin', function () {
//     return view('admin.admin-login');
// });

Route::get('/menu', [ProdukController::class, 'index']);
Route::get('/search', [ProdukController::class, 'search']);
Route::get('/pesanan/{id}', [ProdukController::class, 'pesanan'])->name('pesanan');
Route::post('/pesanan/{id}', [ProdukController::class, 'pesan'])->name('pesan');
Route::get('/co', [ProdukController::class, 'co'])->name('co');
Route::delete('/co/{id}', [ProdukController::class, 'delete'])->name('delete');
Route::get('/konfirmasi-co', [ProdukController::class, 'konfirmasi'])->name('konfirmasi');

Route::get('/history', [ProdukController::class, 'history'])->name('history');
Route::get('/history/{id}', [ProdukController::class, 'detail'])->name('detail');


// Route::get('admin', function () { return view('admin.admin-dashboard'); })->middleware('checkRole:admin');
// Route::get('penjual', function () { return view('penjual'); })->middleware(['checkRole:kurir,admin']);
// Route::get('pembeli', function () { return view('dashboard'); })->middleware(['checkRole:customer,admin']);


/*---------------Admin Route----------------*/

// Route::prefix('admin')->group(function(){
//     Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
//     Route::post('/login/admin', [AdminController::class, 'Login'])->name('admin.login');
//     Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
// });

// Route::get('admin', function () { return view('admin.admin-dashboard'); })->middleware('checkRole:admin');
// Route::get('penjual', function () { return view('penjual'); })->middleware(['checkRole:kurir,admin']);
// Route::get('pembeli', function () { return view('dashboard'); })->middleware(['checkRole:customer,admin']);


/*---------------Admin Route----------------*/

Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'Index'])->name('login_form');
    Route::post('/login/admin', [AdminController::class, 'Login'])->name('admin.login');
    Route::post('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
    Route::get('/konfirmasi-order/{id}', [AdminController::class, 'konfirmasiOrder'])->name('admin.konfirmasiOrder')->middleware('admin');
    Route::get('/dashboard', [AdminController::class, 'ListOrder'])->name('admin.dashboard')->middleware('admin');
});

// Route::post('/konfirmasi-order/{id}', [AdminController::class, 'konfirmasiOrder'])->name('konfirmasiOrder');


/*---------------Admin Route----------------*/

/*---------------Admin Route----------------*/

require __DIR__.'/auth.php';
