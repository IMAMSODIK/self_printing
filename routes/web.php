<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/',[DocumentController::class,'uploadForm']);
Route::post('/upload',[DocumentController::class,'upload'])->name('upload');

Route::get('/range/{id}',[DocumentController::class,'rangeForm'])->name('range.form');
Route::post('/range/{id}',[DocumentController::class,'setRange']);

Route::get('/payment/{id}',[PaymentController::class,'paymentForm'])->name('payment.form');
Route::post('/pay/{id}',[PaymentController::class,'pay']);
Route::post('/midtrans/callback',[PaymentController::class,'callback']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']); 

    // Route::get('/daftar-peserta', [PesertaController::class, 'index']);
    // Route::get('/daftar-peserta/edit', [PesertaController::class, 'edit']);
    // Route::post('/daftar-peserta/store', [PesertaController::class, 'store']);
    // Route::post('/daftar-peserta/update/{id}', [PesertaController::class, 'update']);
    // Route::post('/daftar-peserta/delete', [PesertaController::class, 'delete']);
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginCheck']);
});