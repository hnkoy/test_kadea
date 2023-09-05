<?php

namespace App\Providers;

use App\Repositories\Movie\MovieContract;
use App\Repositories\Movie\MovieRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
       //here we bind repository and contract
       $this->app->bind(MovieContract::class, MovieRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
