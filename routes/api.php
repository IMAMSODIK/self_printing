<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrinterApiController;

Route::prefix('printer')->group(function () {
    Route::post('/printer/login', [PrinterApiController::class, 'login']);
    Route::get('/printer/documents/{printerCode}', [PrinterApiController::class, 'getDocuments']);
    Route::get('/printer/download/{id}', [PrinterApiController::class, 'download']);
    Route::post('/printer/update-status', [PrinterApiController::class, 'updateStatus']);
});
