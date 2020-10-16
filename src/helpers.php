<?php 

use Eelcol\LaravelCountryIso\Facades\CountryIsoFacade;

if(!function_exists('convert_iso'))
{
	/**
	* Convert an iso code to a readable string
	*
	* @param $iso string
	* @return string | null
	*/
	function convert_iso(string $iso, string $language = null)
	{
		return CountryIsoFacade::convert($iso, $language);
	}
}

if(!function_exists('convert_to_iso'))
{
	/**
	* Convert a country name to an iso
	*
	* @param $country_name string
	* @return string | null
	*/
	function convert_to_iso(string $country_name, string $language = null)
	{
		return CountryIsoFacade::convertToIso($country_name, $language);
	}
}