<?php

namespace App\Providers;

use App\Interfaces\DepartamentoRepositoryInterface;
use App\Repositories\DepartamentoRepository;
use Illuminate\Support\ServiceProvider;

class DepartamentoServiceProvider extends ServiceProvider
{
    protected $listen = [
        Registered::class => [
            DepartamentoRepository::class,
        ],
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DepartamentoRepositoryInterface::class, DepartamentoRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
