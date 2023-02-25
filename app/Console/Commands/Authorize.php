<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class Authorize extends Command
{
    protected $signature = 'command:authorize
                            {login : User login}
                            {password : User password}';

    protected $description = 'Generate authorize token';

    public function handle()
    {
        $user = User::where('name', $this->argument('login'))->first();

        if($user == null) {
            $this->error("Unable to find the user");
            return;
        }

        $validCredentials = Hash::check($this->argument('password'), $user->getAuthPassword());

        if(!$validCredentials) {
            $this->error("Incorrect password");
            return;
        }

        $token = $user->createToken('token-name', ['server:update'])->plainTextToken;
        $this->info('token: '.$token);

        return Command::SUCCESS;
    }
}
