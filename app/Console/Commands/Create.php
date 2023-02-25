<?php

namespace App\Console\Commands;

use App\Models\Entity;
use Illuminate\Console\Command;

class Create extends Command
{
    protected $signature = 'command:create
                            {data : JSON ENTITY}
                            {user_id : User id}';

    protected $description = 'Serialize json to db entity.';

    public function handle()
    {
        $entity = Entity::create([
            'data' => $this->argument('data'),
            'user_id' => $this->argument('user_id'),
        ]);

        return $entity->id;
    }
}
