<?php

namespace Yk\LaravelUsers;

use Illuminate\Support\ServiceProvider;

class LaravelUsersServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return  void
     */
    public function boot()
    {
        $this->app->router->group(['namespace' => 'Yk\LaravelUsers\App\Http\Controllers', 'middleware' => ['web']],
            function(){
                require __DIR__.'/routes/web.php';
            }
        );

        $this->loadViewsFrom(resource_path('views/vendor/yk/laravel-users'), 'Yk\LaravelUsers');
        $this->loadViewsFrom(__DIR__.'/resources/views', 'Yk\LaravelUsers');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        $this->publishes([
            __DIR__.'/resources/assets' => public_path('vendor/yk/laravel-users'),
        ], 'public');

        $this->publishes(
            [
                __DIR__.'/resources/views' => base_path('resources/views/vendor/yk/laravel-users'),
            ]
        );
    }
    
    /**
     * Register the application services.
     *
     * @return  void
     */
    public function register()
    {

    }
}