<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Pasien;
use App\Gejala;
use Charts;
use Carbon;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('chart');
        view()->share('pasien', Pasien::all());
        view()->share('suhurendah');
        view()->share('nadirendah');
        view()->share('rekammedis', Gejala::all());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
