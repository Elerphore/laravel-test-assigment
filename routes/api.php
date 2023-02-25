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
    $jsonContent = $request->getContent();
    $content = json_decode($jsonContent);

    $user_id = $request->user()->id;


    $entity_id = Artisan::call(
        'command:update',
        [
            'executable' => $content->executable,
            'user_id' => $user_id,
            'entity_id' => $content->entity_id
        ]);

    return json_encode(['entity_id' => $entity_id]);
});
