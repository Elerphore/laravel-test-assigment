<?php

use Illuminate\Support\Facades\Route;

Route::get('/crud', function () {
    return view('crud');
});

Route::get('/', function () {
    return view('create-form');
});

Route::get('/update', function () {
    return view('update-form');
});
