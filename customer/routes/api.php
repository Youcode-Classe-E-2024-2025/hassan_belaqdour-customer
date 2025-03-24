<?php

use App\Http\Controllers\TicketController;
use App\Http\Controllers\ResponseController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tickets', TicketController::class);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tickets.responses', ResponseController::class)->shallow();
});