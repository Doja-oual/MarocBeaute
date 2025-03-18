<?php

namespace App\Providers;

use App\Http\Repositories\ProductRepositorie;
use Illuminate\Support\ServiceProvider;
 use App\Http\Repositories\ProductRepositorieInterface;
 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepositorieInterface::class, ProductRepositorie::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
