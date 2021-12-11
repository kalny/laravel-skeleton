<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\User\Create as CreateUserService;

class CreateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create new user';
    /**
     * @var CreateUserService
     */
    private $createUserService;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CreateUserService $createUserService)
    {
        parent::__construct();
        $this->createUserService = $createUserService;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->ask('Enter user name');
        $email = $this->ask('Enter user email');
        $password = $this->secret('Enter password');
        $passwordConfirm = $this->secret('Repeate password');

        if ($password !== $passwordConfirm) {
            $this->error('Passwords do not match!');
            return Command::SUCCESS;
        }

        $this->line('Generate user...');

        try {
            $this->createUserService->handle($name, $email, $password);
            $this->info('Success!');
        } catch (\Throwable $exception) {
            $this->error($exception->getMessage());
        }

        return Command::SUCCESS;
    }
}
