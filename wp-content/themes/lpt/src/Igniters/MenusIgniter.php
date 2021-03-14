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
				"primary_fr" => "Main navigation (Fr)",
				"footer_left" => "Footer left column",
				"footer_left_fr" => "Footer left column (Fr)",
				"footer_right" => "Footer right column",
				"footer_right_fr" => "Footer right column (Fr)",
			]);
		});
	}
}