<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Update extends Command
{
    protected $signature = 'command:name';

    protected $description = 'Command description';

    public function handle()
    {
        return Command::SUCCESS;
    }
}
