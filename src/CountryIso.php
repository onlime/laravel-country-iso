<?php 

namespace Eelcol\LaravelCountryIso;

use Eelcol\LaravelCountryIso\Contracts\CountryIsoContract;
use Eelcol\LaravelCountryIso\Country;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Lang;

class CountryIso implements CountryIsoContract
{
    /**
    * @var array
    */
    protected $loaded_languages;

    /**
    * @var array
    */
    protected $countries;

    /**
    * @method getCountries
    * Returns all countries ordered by ISO-code asc
    */
    public function getCountries($lang = null):Collection
    {
        $list = Lang::get('countryiso::countries', [], $lang);

        return $this->convertListToObjects($list);
    }

    /**
    * @method convert
    * Converts ISO to readable country name
    * @return string | null
    */
    public function convert(string $iso, string $lang = null)
    {
        return Lang::get("countryiso::countries.{$iso}", [], $lang);
    }

    /**
    * @method getCountryFromIso
    * @return Eelco\LaravelCountryIso\Country
    */
    public function getCountryFromIso(string $iso, string $lang = null):Country
    {
        return $this->getCountries($lang)
                ->where('iso', strtoupper($iso))
                ->first();
    }

    /**
    * @method convertToIso
    * Converts a country to ISO
    * @return string | null
    */
    public function convertToIso(string $readable_name, string $lang = null)
    {
        return $this->getCountries($lang)
                ->where('readable_name', $readable_name)
                ->first()
                ->iso ?? null;
    }

    private function convertListToObjects(array $list)
    {
        array_walk($list, function(&$val, $key) {

            $val = new Country($key, $val);

        });

        return collect(array_values($list));
    }
}