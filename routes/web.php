<?php

use App\Http\Controllers\ViewController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

Route::get('/', [ViewController::class, 'createView']);
Route::get('/crud', [ViewController::class, 'crudView']);
Route::get('/update', [ViewController::class, 'updateView']);

Route::get('/logs', function () {
    return Storage::disk('logs')->response('view.log');
});
