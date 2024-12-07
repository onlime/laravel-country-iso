<?php

namespace Eelcol\LaravelCountryIso;

use Eelcol\LaravelCountryIso\Contracts\CountryIsoContract;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void
    {
        $this->app->singleton('CountryIso', fn () => new CountryIso);

        $this->app->bind(
            CountryIsoContract::class,
            'CountryIso'
        );
    }

    /**
     * Bootstrap the application events.
     */
    public function boot(): void
    {
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang/', 'countryiso');
    }
}
