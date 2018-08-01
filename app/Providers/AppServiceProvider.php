<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\Schema; //Import Schema



class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    //     DatabaseCart::add('23213293ad', 'Product 1', 1, 9.99, ['size' => 'large']);
        Schema::defaultStringLength(191); //Solved by increasing StringLength
        
       
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
