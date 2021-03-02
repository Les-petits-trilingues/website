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
				"primary_fr" => "Main navigation (Fr version)",
				"adresses" => "Offices and schools addresses",
				"adresses_fr" => "Offices and schools addresses (Fr version)",
				"contacts" => "Contact links, phones, etc.",
				"contacts_fr" => "Contact links, phones, etc. (Fr version)",
			]);
		});
	}
}