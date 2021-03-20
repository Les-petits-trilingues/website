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
			$pages[] = $this->lptTopLevel();
			$pages[] = $this->lptSocialPage();

			return $pages;
		});
	}


	private function lptTopLevel(): array
	{
		return [
			'page_title' => "LPT Website",
			'menu_title' => "LPT",
			'capability' => 'manage_options',
			'menu_slug' => 'lpt',
			'setting' => 'lpt_general',
			'menu_icon' => 'dashicons-edit',
			'page_icon' => 'dashicons-edit',
			'single_line' => true,
			'save_text' => 'Save',
		];
	}


	private function lptSocialPage(): array
	{
		return [
			'page_title' => "Social networks",
			'menu_title' => "Socials",
			'sub_menu' => 'lpt',
			'capability' => 'manage_options',
			'menu_slug' => 'lpt-socials',
			'setting' => 'lpt_social_networks',
			'single_line' => true,
			'save_text' => 'Save',
		];
	}


	function wpActions(): void
	{
		//
	}
}