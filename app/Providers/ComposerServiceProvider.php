<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //view()->composer('*','App\Http\ViewComposers\AppComposer');
        view()->composer('layouts.admin','App\Http\ViewComposers\AppComposer');
        view()->composer('layouts.admin1','App\Http\ViewComposers\AppComposer');
        //view()->composer('layouts.admin_dialog','App\Http\ViewComposers\AppComposer');
        view()->composer('*','App\Http\ViewComposers\PathComposer');
    }
    

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
