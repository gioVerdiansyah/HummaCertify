<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\DaftarPesertaInterface;
use App\Contracts\Repositories\DaftarPesertaRepository;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        DaftarPesertaInterface::class => DaftarPesertaRepository::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
