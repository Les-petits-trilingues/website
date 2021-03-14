<?php

namespace App\Igniters;

final class SettingsIgniter implements IgniterInterface
{
	static public array $socials = [
		"wechat" => "Wechat",
		"facebook" => "Facebook",
		"youtube" => "Youtube",
		"linkedin" => "LinkedIn",
	];


	/** @noinspection PhpUndefinedFunctionInspection */
	function wpFilters(): void
	{
		add_filter('piklist_admin_pages', function ($pages) {
			$pages[] = [
				'page_title' => "Social networks",
				'menu_title' => "Socials",
				'sub_menu' => 'options-general.php',
				'capability' => 'manage_options',
				'menu_slug' => 'custom_settings',
				'setting' => 'lpt_social_networks',
				'menu_icon' => 'dashicons-rest-api',
				'page_icon' => 'dashicons-rest-api',
				'single_line' => true,
				'default_tab' => 'Basic',
				'save_text' => 'Save',
			];

			return $pages;
		});
	}


	function wpActions(): void
	{
		//
	}
}