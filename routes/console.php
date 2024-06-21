<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

// Artisan::command('app:client-role-command', function () {
//     $clients = \App\Models\User::all();

//     foreach ($clients as $client) {
//         if (!$client->hasRole('client')) {
//             $client->assignRole('client');
//         }
//     }

//     $this->info('The roles have been assigned successfully.');
// })->describe('Assign "client" role to users who do not have it');
