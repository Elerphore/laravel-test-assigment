<?php

use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/create', function (Request $request) {
    $jsonEntity = json_decode($request->getContent())->data;
    $user_id = $request->user()->id;

    $entity_id = Artisan::call('command:create', ['data' => json_encode($jsonEntity), 'user_id' => $user_id]);

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

Route::middleware('auth:sanctum')->match(['GET', 'POST'], '/receive', function (Request $request) {
    $user_id = $request->user()->id;
    $entities = Entity::where('user_id', $user_id)->get();

    return json_encode(['entities' => $entities]);
});

Route::middleware('auth:sanctum')->post('/delete/{id}', function (Int $id, Request $request) {
    $user_id = $request->user()->id;
    $entity = Entity::where('id', $id)->where('user_id', $user_id)->first();
    $entity->delete();

    $entities = Entity::where('user_id', $user_id)->get();

    return json_encode(['entities' => $entities]);
});
