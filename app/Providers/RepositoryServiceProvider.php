<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    protected array $repos = [
        \App\Contracts\DomainContract::class => \App\Repositories\DomainRepository::class,
        \App\Contracts\ServiceContract::class => \App\Repositories\ServiceRepository::class,
        \App\Contracts\AdminContract::class => \App\Repositories\AdminRepository::class,
        \App\Contracts\ClientContract::class => \App\Repositories\ClientRepository::class
    ];
    public function register(): void
    {
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        foreach($this->repos as $abstract => $concrete){
            $this->app->singleton($abstract , $concrete);
        }
    }
}
