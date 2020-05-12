<?php

namespace App\Providers;

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
        view()->composer('layouts.sidebar' , function($view) {
            $categories = \App\Category::all();
            $categories = $categories->chunk(round($categories->count() / 2));

            $view->with(compact('categories')) ;
        });
    }
}
