<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class APIController extends Controller
{
    public function create(Request $request) {
        Log::channel('view')->info("API create started");

        $start_time = time();

        Log::channel('view')->info("$start_time: " . $start_time);

        $jsonEntity = $request->data;

        Log::channel('view')->info("$jsonEntity: " . $jsonEntity);

        $user_id = $request->user()->id;

        Log::channel('view')->info("$user_id: " . $user_id);

        $entity_id = Artisan::call('command:create', ['data' => $jsonEntity, 'user_id' => $user_id]);

        $memory_mb = round((memory_get_usage() / 1024) / 1024, 3);
        return json_encode(['entity_id' => $entity_id, 'memory' => $memory_mb, 'time' => time() - $start_time]);
    }

    public function update(Request $request) {
        Log::channel('view')->info("API update started");

        $user_id = $request->user()->id;

        Log::channel('view')->info("$user_id: " . $user_id);

        $entity_id = Artisan::call(
            'command:update',
            [
                'executable' => $request->executable,
                'user_id' => $user_id,
                'entity_id' => $request->entity_id
            ]);

        Log::channel('view')->info("$user_id: " . $user_id);

        return json_encode(['$entity_id' => $entity_id]);
    }

    public function receive(Request $request) {
        Log::channel('view')->info("API receive started");
        $user_id = $request->user()->id;

        Log::channel('view')->info("$user_id: " . $user_id);

        $entities = Entity::where('user_id', $user_id)->get();

        return json_encode(['entities' => $entities]);
    }

    public function delete(Int $id, Request $request) {
        Log::channel('view')->info("API delete started");

        $user_id = $request->user()->id;

        Log::channel('view')->info("$user_id: " . $user_id);

        $entity = Entity::where('id', $id)->where('user_id', $user_id)->first();
        $entity->delete();

        $entities = Entity::where('user_id', $user_id)->get();

        return json_encode(['entities' => $entities]);
    }}
