<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TicketController;
use App\Http\Controllers\Api\ResponseController;

Route::group(['prefix' => 'api', 'middleware' => ['auth:sanctum']], function () {
    Route::apiResource('tickets', TicketController::class);
    Route::apiResource('tickets.responses', ResponseController::class)->shallow();
});

Route::get('api/documentation', [\L5Swagger\Http\Controllers\SwaggerController::class, 'index']);