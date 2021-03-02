<?php

namespace App\Core;

use App\Support\Environment;

final class Localization
{
	/** @var string */
	static private string $locale;
	static private string $bundlesPath;
	/** @var array<string, array> */
	static private array $bundles = [];
	static private string $defaultNamespace = "general";


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

		self::$bundlesPath = __DIR__ . "/../../languages";
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


	/**
	 * Load a translation bundle.
	 *
	 * @param string $namespace The namespace of the bundle (usally a filename without .php extension)
	 * @param string $locale The locale to load
	 *
	 * @noinspection PhpIncludeInspection
	 */
	static private function loadBundle(string $namespace, string $locale): void
	{
		if (self::isBundleLoaded($namespace, $locale)) {
			return;
		}

		if (! is_array(self::$bundles[$locale] ?? null)) {
			self::$bundles[$locale] = [];
		}

		$bundlePath = join(DIRECTORY_SEPARATOR, [self::$bundlesPath, $locale, "$namespace.php"]);
		self::$bundles[$locale][$namespace] = include $bundlePath;
	}


	/**
	 * Check if a bundle has already been loaded.
	 *
	 * @param string $namespace The namespace of the bundle (usally a filename without .php extension)
	 * @param string $locale The locale to load
	 *
	 * @return bool
	 */
	static private function isBundleLoaded(string $namespace, string $locale): bool
	{
		return isset(self::$bundles[$locale]) && isset(self::$bundles[$locale][$namespace]);
	}


	/**
	 * Get a loaded bundle and automatically load if not loaded.
	 *
	 * @param string $namespace The namespace of the bundle (usally a filename without .php extension)
	 * @param string|null $forceLocale The locale to load. If not set, the current locale is used.
	 *
	 * @return array
	 */
	static private function getBundle(string $namespace, string $forceLocale = null): array
	{
		$locale = $forceLocale ?? self::getLocale();

		if (! self::isBundleLoaded($namespace, $locale)) {
			self::loadBundle($namespace, $locale);
		}

		return self::$bundles[$locale][$namespace] ?? [];
	}


	/**
	 * Get a translation string.
	 *
	 * @param string $key The key of the translation string
	 * @param string|null $locale The locale to load. If not set, the current locale is used.
	 *
	 * @return string The translation string, or $key if the translation string does not exist.
	 */
	static public function trans(string $key, string $locale = null): string
	{
		return self::getBundle(self::$defaultNamespace, $locale)[$key] ?? $key;
	}
}