<?php 

namespace Eelcol\LaravelCountryIso;

class Country
{
	protected $attributes = [];

	public function __construct(string $iso, string $readable_name)
	{
		$this->attributes['iso'] = $iso;
		$this->attributes['readable_name'] = $readable_name;
	}

	public function __get($key)
	{
		return $this->attributes[$key];
	}

	public function __isset($key)
	{
		return isset($this->attributes[$key]);
	}

	public function getIso()
	{
		return $this->attributes['iso'];
	}

	public function getReadableName()
	{
		return $this->attributes['readable_name'];
	}
}