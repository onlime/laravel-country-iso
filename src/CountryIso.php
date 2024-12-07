<?php

namespace Eelcol\LaravelCountryIso;

use Eelcol\LaravelCountryIso\Contracts\CountryIsoContract;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Lang;

class CountryIso implements CountryIsoContract
{
    protected array $loaded_languages;

    protected array $countries;

    /**
     * Returns all countries ordered by ISO-code asc
     */
    public function getCountries(?string $lang = null): Collection
    {
        $list = Lang::get('countryiso::countries', [], $lang);

        return $this->convertListToObjects($list);
    }

    /**
     * Converts ISO to readable country name
     */
    public function convert(string $iso, ?string $lang = null): ?string
    {
        return Lang::get("countryiso::countries.{$iso}", [], $lang);
    }

    public function getCountryFromIso(string $iso, ?string $lang = null): Country
    {
        return $this->getCountries($lang)
            ->where('iso', strtoupper($iso))
            ->first();
    }

    /**
     * Converts a country to ISO
     */
    public function convertToIso(string $readable_name, ?string $lang = null): ?string
    {
        return $this->getCountries($lang)
            ->where('readable_name', $readable_name)
            ->first()
            ->iso ?? null;
    }

    private function convertListToObjects(array $list): Collection
    {
        array_walk($list, function (&$val, $key) {
            $val = new Country($key, $val);
        });

        return collect(array_values($list));
    }
}