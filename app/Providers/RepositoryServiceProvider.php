<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EmpleadoRepository;
use App\Interfaces\EmpleadoRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmpleadoRepositoryInterface::class, EmpleadoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}