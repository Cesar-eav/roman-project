<?php

namespace App\Providers;

use Inertia\Inertia;
use App\Models\Banco;
use App\Models\CiaAseguradora;
use Illuminate\Support\ServiceProvider;

class SharedDataProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Inertia::share([
            'bancos' => function () {
                return Banco::all();
            },
        ]);
    }
}
