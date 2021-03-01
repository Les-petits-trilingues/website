<?php

namespace App\Igniters;

final class MenusIgniter implements IgniterInterface
{
	function wpFilters(): void
	{
		//
	}


	/**
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	function wpActions(): void
	{
		add_action('after_setup_theme', function () {
			register_nav_menus([
				"primary" => "Main navigation",
				"adresses" => "Offices and schools addresses",
				"contacts" => "Contact links, phones, etc.",
			]);
		});
	}
}