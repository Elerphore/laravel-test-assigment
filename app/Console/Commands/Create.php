<?php

namespace App\Console\Commands;

use App\Models\Entity;
use Illuminate\Console\Command;

class Create extends Command
{
    protected $signature = 'command:create
                            {data : JSON ENTITY}';

    protected $description = 'Serialize json to db entity.';

    public function handle()
    {
        return Entity::create([
            'data' => $this->argument('data'),
        ]);
    }
}
