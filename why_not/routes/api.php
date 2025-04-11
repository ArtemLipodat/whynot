<?php

use Illuminate\Support\Facades\Route;

Route::middleware('json')->group(function () {
    Route::get('cars/available', [\App\Http\Controllers\CarController::class, 'available']);
    Route::apiResource('cars', \App\Http\Controllers\CarController::class);
    Route::apiResource('options', \App\Http\Controllers\OptionController::class);
    Route::apiResource('configurations', \App\Http\Controllers\ConfigurationController::class);
    Route::apiResource('configurations-options', \App\Http\Controllers\ConfigurationOptionController::class);
    Route::apiResource('prices', \App\Http\Controllers\PriceController::class);
});
