<?php

namespace App\Console\Commands;

use App\Models\Entity;
use Illuminate\Console\Command;

class Update extends Command
{
    protected $signature = 'command:update
                            {executable : Code to execute}
                            {user_id : User id}
                            {entity_id : Entity id}';

    protected $description = 'Command description';

    public function handle()
    {
        $code = $this->argument('executable');

        $entity = Entity::where('user_id', $this->argument('user_id'))
                            ->where('id', $this->argument('entity_id'))
                            ->first();

        $data = json_decode($entity->data);

        eval($code);

        $entity->data = json_encode($data);

        $entity->save();

        return $entity->id;
    }
}
