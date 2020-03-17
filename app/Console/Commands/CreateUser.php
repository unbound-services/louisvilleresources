<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\User;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'lr:createUser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email = $this->ask('Enter an email');
        $username = $this->anticipate('Enter a nickname', ['superadmin']);
        $password = $this->secret('Enter A Password');


        $user = User::create(["name"=>$username, "email"=>$email, "password"=> \Hash::make($password)]);
    }
}
