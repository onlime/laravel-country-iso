<?php 

namespace Eelcol\LaravelCountryIso;

use Eelcol\LaravelCountryIso\Contracts\CountryIsoContract;
use Eelcol\LaravelCountryIso\CountryIso;
use Illuminate\Routing\Router;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /**
        * Register singleton
        */
        $this->app->singleton('CountryIso', function ($app) {

            return new CountryIso;
        });

        $this->app->bind(
            CountryIsoContract::class,
            'CountryIso'
        );
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot(Router $router)
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'countryiso');
    }
}