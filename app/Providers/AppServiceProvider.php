<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Interface\ReceptionInterface;
use App\Classes\ReceptionUsers;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ReceptionInterface::class, ReceptionUsers::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
