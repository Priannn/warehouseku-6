<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakturpembayaranController;
use App\Http\Controllers\FakturpembelianController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemesananstokController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\StokterbuangController;
use App\Http\Controllers\SuperadminController;
use App\Http\Controllers\SupplierController;
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
// login
Route::get('/',[LoginController::class,'index'])->name('login')->middleware('guest');
Route::post('/',[LoginController::class,'authenticate']);
Route::post('/logout',[LoginController::class,'logout']);

// Register
Route::get('/register',[RegisterController::class,'index'])->middleware('guest');
Route::post('/register',[RegisterController::class,'store']);
Route::post('/register/outlet',[RegisterController::class,'outlet']);

// Admin
Route::get('/admin/daftaruser/{userId}',[SuperadminController::class,'index'])->middleware('auth','superadmin')->name('admin');
Route::post('/daftaruser/create',[SuperadminController::class,'store'])->name('store');
Route::patch('/daftaruser/{id}',[SuperadminController::class,'update'])->name('update');
Route::delete('/daftaruser/{id}',[SuperadminController::class,'destroy'])->name('destroy');

// Dashboard
Route::get('/dashboard/{userId}',[DashboardController::class,'index'])->middleware('auth')->name('dashboard');

//Profile
Route::get('/dashboard/userprofile/{userId}',[ProfileController::class,'index'])->middleware('auth','admin')->name('profile');
Route::patch('/userprofile/{id}',[ProfileController::class,'update'])->name('updateProfile');

// Faktur Pembelian
Route::get('/dashboard/fakturpembelian/{userId}',[FakturpembelianController::class,'index'])->middleware('auth','admin')->name('pembelian');
Route::post('/fakturpembelian/create',[FakturpembelianController::class,'store']);
Route::patch('/fakturpembelian/{id}',[FakturpembelianController::class,'update'])->name('update'); 
Route::delete('/fakturpembelian/{id}',[FakturpembelianController::class,'destroy'])->name('deletePembelian'); 

// Faktur Pembayaran
Route::get('/dashboard/fakturpembayaran/{userId}',[FakturpembayaranController::class,'index'])->middleware('auth','admin')->name('pembayaran');
Route::post('/fakturpembayaran/create',[FakturpembayaranController::class,'store']);
Route::patch('/fakturpembayaran/{id}',[FakturpembayaranController::class,'update'])->name('update'); 
Route::delete('/fakturpembayaran/{id}',[FakturpembayaranController::class,'destroy'])->name('deletePembayaran'); 

// Pemesanan Stok
Route::get('/dashboard/pemesananstok/{userId}',[PemesananstokController::class,'index'])->middleware('auth','admin')->name('pemesanan');
Route::post('/pemesananstok/create',[PemesananstokController::class,'store']);
Route::patch('/pemesananstok/{id}',[PemesananstokController::class,'update'])->name('update'); 
Route::delete('/pemesananstok/{id}',[PemesananstokController::class,'destroy'])->name('deletePemesanan'); 

// Daftar Stok
Route::get('/dashboard/daftarstok/{userId}',[StokController::class,'index'])->middleware('auth','admin')->name('daftarstok');
Route::post('/daftarstok/create',[StokController::class,'store']);
Route::patch('/daftarstok/{id}',[StokController::class,'update'])->name('updateStok'); 
Route::delete('/daftarstok/{id}',[StokController::class,'destroy'])->name('deleteStok'); 

// Daftar Supplier
Route::get('/dashboard/daftarsupplier/{userId}',[SupplierController::class,'index'])->middleware('auth','admin')->name('supplier');
Route::post('/daftarsupplier/create',[SupplierController::class,'store']); 
Route::patch('/daftarsupplier/{id}',[SupplierController::class,'update'])->name('update'); 
Route::delete('/daftarsupplier/{id}',[SupplierController::class,'destroy'])->name('deleteSupplier'); 

// Daftar Stok Terbuang
Route::get('/dashboard/stokterbuang/{userId}',[StokterbuangController::class,'index'])->middleware('auth','admin')->name('stokterbuang');
Route::post('/stokterbuang/create',[StokterbuangController::class,'store']); 
Route::patch('/stokterbuang/{id}',[StokterbuangController::class,'update']); 
Route::delete('/stokterbuang/{id}',[StokterbuangController::class,'destroy'])->name('deleteTerbuang'); 

