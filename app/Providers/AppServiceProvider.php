<?php

namespace App\Providers;

use App\Charts\AgesChart;
use App\Charts\SampleChart;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
//        $charts->register([
//            AgesChart::class,
//            SampleChart::class
//        ]);

    }
}
