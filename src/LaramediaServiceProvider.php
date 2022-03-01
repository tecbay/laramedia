<?php

namespace Tecbay\Laramedia;

use Illuminate\Support\ServiceProvider;

class LaramediaServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/config.php', 'laramedia',
        );
    }

    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/../routes/api.php');

        $this->publishes([
            __DIR__.'/../config/config.php' => config_path('laramedia.php'),
        ], 'config');


//        // Register a macro, extending the Illuminate\Collection class
//        Collection::macro('rejectEmptyFields', function () {
//            return $this->reject(function ($entry) {
//                return $entry === null;
//            });
//        });
//
//        // Register an authorization policy
//        Gate::define('delete-post', function ($user, $post) {
//            return $user->is($post->author);
//        });
    }
}
