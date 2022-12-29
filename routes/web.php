<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AlamatPengirimanController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartDetailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/aboutus', [AboutUsController::class, 'index'])->name('aboutus');
    //Cart detail
    Route::resource('cartdetail', CartDetailController::class);
    // cart
    Route::resource('cart', CartController::class);
    Route::patch('kosongkan/{id}', [CartController::class, 'kosongkan']);
    //transaksi
    Route::resource('transaksi', TransaksiController::class);
    // alamat pengiriman
    Route::resource('alamatpengiriman', AlamatPengirimanController::class);
    // checkout
    Route::get('checkout', [CartController::class, 'checkout'])->name('checkout');
    Route::prefix('/produk')->group(function () {
        //filter
        Route::get('/', [ProdukController::class, 'index'])->name('produk');
        Route::get('/sayur', [BarangController::class, 'sayur'])->name('sayur');
        Route::get('/buah', [BarangController::class, 'buah'])->name('buah');
        Route::get('/lahan', [BarangController::class, 'lahan'])->name('lahan');
    });
});

// Admin Rule and change is here.
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('product', BarangController::class);
    Route::get('admin-home', [HomeController::class, 'adminHome'])->name('admin.home');
    Route::resource('editbarang', BarangController::class);
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::put('/update', [UserController::class, 'update'])->name('user.update');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });
});