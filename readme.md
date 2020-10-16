## Laravel country ISO codes

This package makes it easy to convert country ISO-codes to readable country-names, and the otherway around. Multiple languages are supported.

### Usage

This package used language files to convert an ISO-code to a readable country-name and the otherway around. It uses the language that is setup in `config/app.php` as `locale`.

The `CountryIso` object can be used as facade or loaded using dependency injection. There are also 2 helper functions.

````
<?php

use Eelcol\LaravelCountryIso\CountryIso;

class SomeController
{
	public function view(CountryIso $countryIso)
	{
		$countryIso->getCountries();
	}
}
````

````
<?php

use Eelcol\LaravelCountryIso\Facades\CountryIsoFacade;

class SomeController
{
	public function view()
	{
		CountryIsoFacade::getCountries();
	}
}
````

```
convert_to_iso('Netherlands'); // -> NL
convert_iso('NL'); // -> Netherlands
```

### Examples

Retrieve country name from ISO:

```
CountryIsoFacade::convert('NL'); // -> Netherlands
CountryIsoFacade::convert('unknown'); // -> null
```

Retrieve `Eelcol\LaravelCountryIso\Country` model from ISO. 

```
CountryIsoFacade::getCountryFromIso('NL'); // -> Country instance
CountryIsoFacade::getCountryFromIso('unknown'); // -> null
```

Convert a country name to ISO:

```
CountryIsoFacade::convertToIso('Netherlands'); // -> NL
```

All methods have an optional second parameter to indicate the language. By default the package will use the language setup in your app config. However, if you want to use another language, you can use the second parameter:

```
CountryIsoFacade::convert('NL', 'nl'); // -> Nederland
```

### Overwrite language file or add a new language

You can overwrite the language file or add a new language. Create a file called `countries.php` in the folder `resources/lang/vendor/countryiso/{locale}`.

### Installation
Install this package with composer:
```
php composer.phar require eelcol/laravel-country-iso
```

Laravel 5.5 and up uses Package Auto-Discovery, so doesn't require you to manually add the ServiceProvider.

If you don't use auto-discovery, add the ServiceProvider to the providers array in config/app.php

```
Eelcol\LaravelCountryIso\ServiceProvider::class,
```