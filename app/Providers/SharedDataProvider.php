<?php

namespace App\Providers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Banco;
use App\Models\Comuna;
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

        Inertia::share([
            'clientes' => function () {
                return User::all();
            },
        ]);

        Inertia::share([
            'comunas' => function () {
                return Comuna::all();
            },
        ]);
    }
}
