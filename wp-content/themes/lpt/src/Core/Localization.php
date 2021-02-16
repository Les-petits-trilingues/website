<?php

namespace App\Core;

use App\Support\Environment;

final class Localization
{
	/** @var string */
	static private $locale;


	/**
	 * Check the url to see if a locale has been requested
	 * as a prefix (/fr, /zh/foo-bar), and add a wordpress
	 * filter to handle it.
	 */
	public static function boot(): void
	{
		$urlLocale = explode("/", $_SERVER["REQUEST_URI"])[1] ?? "";
		self::$locale = self::isLocaleAccepted($urlLocale) ? $urlLocale : self::getDefaultLocale();

		/** @noinspection PhpUndefinedFunctionInspection */
		add_filter('locale', function () {
			return self::getLocale();
		}, 10);
	}


	static function getDefaultLocale(): string
	{
		return Environment::get("DEFAULT_LOCALE");
	}


	static function getLocales(): array
	{
		return array_map("trim", explode(",", Environment::get("LOCALES", [])));
	}


	static function getLocale(): string
	{
		return self::$locale;
	}


	static function isLocaleAccepted(string $locale): bool
	{
		return in_array($locale, self::getLocales());
	}
}