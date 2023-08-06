<?php

namespace App\Providers;

use App\Interfaces\DepartamentoRepositoryInterface;
use App\Interfaces\EmpleadoRepositoryInterface;
use App\Repositories\DepartamentoRepository;
use App\Repositories\EmpleadoRepository;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(EmpleadoRepositoryInterface::class, EmpleadoRepository::class,);
        $this->app->bind(DepartamentoRepositoryInterface::class, DepartamentoRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
