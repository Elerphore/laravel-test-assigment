<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/create', [APIController::class, 'create']);
Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/update', [APIController::class, 'update']);
Route::middleware('auth:sanctum')->get( '/receive', [APIController::class, 'receive']);
Route::middleware('auth:sanctum')->post('/delete/{id}', [APIController::class, 'delete']);
