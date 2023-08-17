<?php

use App\Http\Controllers\SaldoController;
use App\Http\Controllers\TransaksiController;
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
    return view('welcome');
});

Route::get('/transaksi',[TransaksiController::class,'index'])->name('transaksi');
Route::get('/transaksi/create',[TransaksiController::class,'create'])->name('transaksi.create');
Route::post('/transaksi/store',[TransaksiController::class,'store'])->name('transaksi.store');
Route::get('/transaksi/edit/{id}',[TransaksiController::class,'edit'])->name('transaksi.edit');
Route::post('/transaksi/update/{id}',[TransaksiController::class,'update'])->name('transaksi.update');
Route::get('/transaksi/delete/{id}',[TransaksiController::class,'destroy'])->name('transaksi.delete');



Route::get('/saldo',[SaldoController::class,'index'])->name('saldo');
Route::get('/saldo/create',[SaldoController::class,'create'])->name('saldo.create');
Route::post('/saldo/store',[SaldoController::class,'store'])->name('saldo.store');
Route::get('/saldo/edit/{id}',[SaldoController::class,'edit'])->name('saldo.edit');
Route::post('/saldo/update/{id}',[SaldoController::class,'update'])->name('saldo.update');
Route::get('/saldo/delete/{id}',[SaldoController::class,'destroy'])->name('saldo.delete');
