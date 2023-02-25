<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class Authorize extends Command
{
    protected $signature = 'command:authorize
                            {login : User login}
                            {password : User password}';

    protected $description = 'Generate authorize token';

    public function handle()
    {
        $this->info($this->argument('login').':'.$this->argument('password'));
    }
}
