<?php

use App\Http\Controllers\BarangkeluarController;
use App\Http\Controllers\BarangmasukController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('v_product/dashboard');
// });
Route::get('/', function () {
    return redirect('/login');
});
Route::middleware(['guest'])->group(function () {
    Route::get('login',[LoginController::class,'login'])->name('login');
    Route::post('login',[LoginController::class,'store']);
    Route::get('reg', function(){
        return view('register');
    });
    Route::post('register', [RegisterController::class,'store']);
});
Route::middleware(['auth'])->group(function () {
    // Route::get('dashboard', function(){
    //     return view('v_product.dashboard');
    // });
    Route::resource('dashboard', DashboardController::class);
    Route::resource('barang', ProductController::class);
    Route::resource('barangmasuk', BarangmasukController::class);
    Route::resource('barangkeluar', BarangkeluarController::class);
    Route::resource('kategori', KategoriController::class);
    Route::get('logout', [LoginController::class,'logout']);
});