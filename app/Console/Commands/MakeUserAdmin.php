<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Permission\Exceptions\RoleDoesNotExist;
use Spatie\Permission\Models\Role;

class MakeUserAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {user}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes a user as admin.';

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
     * @return int
     */
    public function handle(): int
    {
        $user = User::find($this->argument('user'));

        if (! $user) {
            $this->error('User does not exists!');

            return 0;
        }

        if (! empty($user->roles->first()))
            $user->removeRole($user->roles->first());

        try {
            $user->assignRole('admin');
        } catch (RoleDoesNotExist $exception) {
            $this->error('Please, run seeder (db:seed), after make user as admin again!');

            return 0;
        }

        $this->info("{$user->name} is admin now.");

        return 0;
    }
}
