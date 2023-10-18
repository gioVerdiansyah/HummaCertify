<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\CertificateInterface;
use App\Contracts\Interfaces\userCategoriInterface;
use App\Contracts\Interfaces\DaftarPesertaInterface;
use App\Contracts\Repositories\CertificateRepository;
use App\Contracts\Repositories\userCategoriRepositori;
use App\Contracts\Repositories\DaftarPesertaRepository;
use App\Contracts\Interfaces\DetailCertificateInterface;
use App\Contracts\Interfaces\CertificateCategoriInterface;
use App\Contracts\Repositories\CertificateCategoriRepositori;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        DaftarPesertaInterface::class => DaftarPesertaRepository::class,
        CertificateCategoriInterface::class => CertificateCategoriRepositori::class,
        CertificateInterface::class => CertificateRepository::class,
        DetailCertificateInterface::class => DetailCertificateRepository::class,
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
