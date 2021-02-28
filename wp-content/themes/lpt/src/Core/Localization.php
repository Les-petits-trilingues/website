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
		preg_match("/[?&]lang=([a-zA-Z\-]{2,5})(&.*)?$/", $_SERVER["REQUEST_URI"], $matches);
		$urlLocale = substr($matches[1] ?? "", 0, 2);
		self::$locale = self::isLocaleAccepted($urlLocale) ? $urlLocale : self::getDefaultLocale();

		/** @noinspection PhpUndefinedFunctionInspection */
		add_filter('locale', function () {
			return self::getLocale();
		}, 10);

		// We remove this filter because it's not possible to
		// have two posts with the same slug as we initially
		// expected to do for localized custom posts.
//		self::wpQueryFilter();
	}


	/**
	 * Add a filter to the query to only get posts for
	 * the current locale.
	 *
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	static private function wpQueryFilter()
	{
		add_filter('pre_get_posts', function ($query) {
			if (is_single() || is_page()) {
				$query->query_vars["meta_key"] = "locale";
				$query->query_vars["meta_value"] = self::getLocale();
			}
		});
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


	/**
	 * Check if the current locale is the same as the one given as parameter
	 *
	 * @param string $locale
	 *
	 * @return bool
	 */
	static function is(string $locale): bool
	{
		return self::getLocale() === $locale;
	}


	/**
	 * Adds the locale as a suffix to the given string.
	 *
	 * @param string $str The string to add a suffix to
	 * @param bool $skipDefault If true, does not add a prefix when the locale is set to the default one
	 * @param string $delimiter The delimiter between the string and the locale.
	 *
	 * @return string
	 */
	static function suffix(string $str, bool $skipDefault = true, string $delimiter = "_"): string
	{
		if ($skipDefault && self::getLocale() === self::getDefaultLocale()) {
			return $str;
		}

		return $str . $delimiter . self::getLocale();
	}
}