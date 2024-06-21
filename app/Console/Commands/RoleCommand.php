<?php

namespace App\Console\Commands;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Console\Command;

class RoleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:client-role-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $clients = User::all();
        foreach($clients as $client){
            if(!$client->hasRole('client')){
                $client->assignRole('client');
            }
        }

        $employees = Employee::all();
        foreach($employees as $employee){
            if(!$employee->hasRole('employee')){
                $employee->assignRole('employee');
            }
        }
        $this->info('the roles has been assgined successfully');
    }
}
