<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Currency;
use App\Models\DepositRate;
use App\Models\DepositType;
use App\Models\Disability;
use App\Models\MaritalStatus;
use App\Models\Nationality;
use App\Models\User;
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
        $this->depositForm();
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

    public function depositForm() {
        View::composer([
            'deposit.partials.form'
        ], function ($view) {
            $view->with([
                'users' => User::get()->lists('fio_passport_number', 'id'),
                'deposit_type' => DepositType::lists('name', 'id'),
                'currency' => Currency::lists('name', 'code'),
                'deposit_rate' => DepositRate::lists('name', 'id'),
                //'jsValidator' => JsValidator::formRequest('App\Http\Requests\StoreClientRequest')
            ]);
        });
    }
}
