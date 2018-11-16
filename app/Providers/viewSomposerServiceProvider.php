<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class viewSomposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer([
            'auth.register',
         
        ], 'App\Http\ViewComposer\AuthStateViewComposer');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
