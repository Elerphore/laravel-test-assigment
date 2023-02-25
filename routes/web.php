<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('create-form');
});

Route::get('/update', function () {
    return view('update-form');
});
