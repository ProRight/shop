<?php

namespace App\Providers;

use App\Models\Currency;
use App\Models\Product;
use App\Observers\ProductObserver;
use App\Services\CurrencyConvert;
use Illuminate\Support\Facades\View;
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
        Product::observe(ProductObserver::class);
        View::share('Currencies', CurrencyConvert::getCurrencies());
        //View::share('Currency_symbol', CurrencyConvert::getCurrencySymbol());
    }
}
