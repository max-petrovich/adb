<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Disability;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use Illuminate\Support\ServiceProvider;
use JsValidator;
use View;
use Cache;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->clientForm();
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

    public function clientForm()
    {
        View::composer([
            'client.partials.form',
            'client.show'
        ], function ($view) {

            $view->with([
                'marital_statuses' => MaritalStatus::lists('name', 'id'),
                'nationalities' => Nationality::lists('name', 'id'),
                'cities' => City::lists('name', 'id'),
                'disabilities' => Disability::lists('name', 'id'),
                'jsValidator' => JsValidator::formRequest('App\Http\Requests\StoreClientRequest')
            ]);
        });
    }
}
