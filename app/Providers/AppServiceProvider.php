<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('min_value', function($attribute, $value, $parameters, $validator) {
            return $value > $parameters[0];
        });

        Validator::replacer('min_value', function($message, $attribute, $rule, $parameters) {
            return str_replace(':min', $parameters[0], $message);
        });

        $this->app->singleton('AccountHelper', function ($app) {
            return new \App\Helpers\AccountHelper();
        });
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
