<?php

use App\Proxies\MenuItem;
use App\Support\Environment;
use App\Support\Tree;

if (! function_exists("dump")) {
	function dump(...$params)
	{
		foreach (func_get_args() as $arg) {
			$styles = [
				"border: 1px solid #e6e6e6",
				"border-radius: 4px",
				"background: #f6f6f6",
				"padding: 1.5em",
				"margin: 1em 0",
				"color: #292929",
			];
			// Transform the array of styles into a CSS string
			$styles_str = join(";", $styles);

			echo "<pre style='$styles_str'>";
			echo preg_replace("/^\s{4}/m", "  ", print_r($arg, true));
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
	 * @param string $location
	 *
	 * @return array<int, MenuItem>
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	function getThemeMenu(string $location): array
	{
		// We fetch the available menu location to check if
		// the request location is valid, and get menus ids
		$locations = get_theme_mod('nav_menu_locations');

		if (empty($locations)) {
			return [];
		}

		if (! isset($locations[$location])) {
			return [];
		}

		// We fetch the menu items for the requested location, and wrap
		// them inside MenuItem to make them easier to manipulate
		$wpMenuItems = wp_get_nav_menu_items($locations[$location]);
		$proxiedMenuItems = array_map(fn($item) => new MenuItem($item), $wpMenuItems);

		// We use the items ID as array keys. That way, we will be
		// able to easily create relations between items.
		/** @var array<int, MenuItem> $menuItems */
		$menuItems = array_combine(
			array_map(fn($menuItem) => $menuItem->ID, $proxiedMenuItems),
			$proxiedMenuItems
		);

		if (empty($menuItems)) {
			return [];
		}

		// Adds the parent <- child (menu <- sub-menu) relation between menu items.
		foreach ($menuItems as $menuItem) {
			if (! $menuItem->hasParent()) {
				continue;
			}

			if (! $parent = $menuItems[intval($menuItem->menu_item_parent)]) {
				// TODO(eliepse): add an error, or a warning about the fact there is no valid parent in the nav menu list.
				continue;
			}

			$parent->addChildren($menuItem);
		}

		// Before returning, we only keep the top-level element.
		// Any children (sub-menu) is kept inside them as a descendant.
		// The menu tree has been reconstructed (or "un-flatten").
		// We also reset keys with array_values.
		return array_values(array_filter($menuItems, fn($menuItem) => ! $menuItem->hasParent()));
	}
}