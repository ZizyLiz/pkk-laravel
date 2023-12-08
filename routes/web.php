<?php

use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
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
    return view('v_product/dashboard');
});
Route::resource('login',LoginController::class);
Route::get('reg', function(){
    return view('register');
});
Route::post('register', [RegisterController::class,'store']);

Route::resource('barang', ProductController::class);
Route::resource('barangmasuk', BarangmasukController::class);
Route::resource('barangkeluar', BarangkeluarController::class);
Route::resource('kategori', KategoriController::class);