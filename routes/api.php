<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrinterApiController;

Route::prefix('printer')->group(function () {
    Route::post('/login', [PrinterApiController::class, 'login']);
    Route::get('/documents/{printerCode}', [PrinterApiController::class, 'getDocuments']);
    Route::get('/download/{id}', [PrinterApiController::class, 'download']);
    Route::post('/update-status', [PrinterApiController::class, 'updateStatus']);
});
