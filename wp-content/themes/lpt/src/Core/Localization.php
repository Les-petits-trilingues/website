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

		self::wpQueryFilter();
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
}