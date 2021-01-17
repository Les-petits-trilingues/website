<?php

use App\Support\Environment;
use App\Support\Tree;

if (! function_exists("dump")) {
	function dump(...$params)
	{
		foreach (func_get_args() as $arg) {
			echo "<pre style='border: 1px solid #e6e6e6; border-radius: 4px; background: #f6f6f6; padding: 1.5em;margin: 1em 0;'>";
			var_dump($arg);
			echo "</pre>";
		}
	}
}

if (! function_exists("dd")) {
	function dd(...$params)
	{
		call_user_func_array('dump', func_get_args());
		dump();
		die();
	}
}

if (! function_exists("env")) {
	function env(string $key, $default = null)
	{
		return Environment::get($key, $default);
	}
}

if (! function_exists("asset")) {
	/**
	 * @param string $path
	 *
	 * @return string
	 */
	function asset(string $path = ""): string
	{
		return "/wp-content/themes/lpt/assets/$path";
	}
}

if (! function_exists("webpack")) {
	/**
	 * @param string $path Path to asset file (relative to assets folder)
	 * @param string|null $default Fallback filepath if not present in manifest
	 *
	 * @return string
	 * @todo(eliepse): use a singleton to prevent multiple read on filesystem
	 */
	function webpack(string $path, string $default = null): string
	{
		$manifestPath = Tree::assets("manifest.json");

		if (! file_exists($manifestPath)) {
			return asset($default ?? $path);
		}

		$manifest = json_decode(file_get_contents($manifestPath) ?? "{}", true);

		return ! empty ($manifest[$path]) ? asset($manifest[$path]) : asset($path);
	}
}

if (! function_exists("getThemeMenu")) {
	/**
	 * @return object[]
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	function getThemeMenu(string $location): array
	{
		$locations = get_theme_mod('nav_menu_locations');

		if (empty($locations)) {
			return [];
		}

		if (! isset($locations[$location])) {
			return [];
		}

		return wp_get_nav_menu_items($locations[$location]);
	}
}