<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/create', function (Request $request) {

    $jsonEntity = $request->getContent();
    $user_id = $request->user()->id;

    $entity_id = Artisan::call('command:create', ['data' => $jsonEntity, 'user_id' => $user_id]);

    return json_encode(['entity_id' => $entity_id]);
});

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/update', function (Request $request) {
    return "OK";
});
