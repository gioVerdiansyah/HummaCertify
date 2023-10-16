<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\CertificateInterface;
use App\Contracts\Interfaces\userCategoriInterface;
use App\Contracts\Interfaces\DaftarPesertaInterface;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\userCategoriRepositori;
use App\Contracts\Repositories\DaftarPesertaRepository;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        DaftarPesertaInterface::class => DaftarPesertaRepository::class,
        userCategoriInterface::class => userCategoriRepositori::class,
        CertificateInterface::class => CertificateRepository::class,
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
