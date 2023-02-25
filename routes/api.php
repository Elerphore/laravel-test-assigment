<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/create', function () {

});

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/update', function () {

});
