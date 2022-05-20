<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
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
        View::composer(['layouts.default', 'categories'], 'App\ViewComposers\CategoriesComposer');
        View::composer('layouts.default', 'App\ViewComposers\BestProductsComposer');
        View::composer('*', function ($view) {
            $ZALUPA = '+++';
            $view->with('ZALUPA', $ZALUPA);
        });
    }
}
