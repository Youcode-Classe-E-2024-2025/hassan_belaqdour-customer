<?php

use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\ResponseController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('tickets.responses', ResponseController::class)->shallow();
});