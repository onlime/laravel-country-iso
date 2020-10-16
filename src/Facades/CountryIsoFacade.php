<?php 

namespace Eelcol\LaravelCountryIso\Facades;

use Illuminate\Support\Facades\Facade;

class CountryIsoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CountryIso';
    }
}