<?php

use Eelcol\LaravelCountryIso\Facades\CountryIsoFacade;

if (! function_exists('convert_iso')) {
    /**
     * Convert an iso code to a readable string
     */
    function convert_iso(string $iso, ?string $language = null): ?string
    {
        return CountryIsoFacade::convert($iso, $language);
    }
}

if (! function_exists('convert_to_iso')) {
    /**
     * Convert a country name to an iso
     */
    function convert_to_iso(string $country_name, ?string $language = null): ?string
    {
        return CountryIsoFacade::convertToIso($country_name, $language);
    }
}
