<?php

namespace App\Core;

final class Theme
{
	private static ?Theme $_instance = null;


	private function __construct() { }


	public static function getInstance(): Theme
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}


	public static function isProd(): bool
	{
		return in_array(Environment::get("THEME_ENV"), ["prod", "production"], true);
	}


	public static function isLocal(): bool
	{
		return ! self::isProd();
	}


	public function basePath(): string
	{
		return realpath(__DIR__ . '/../../');
	}


	public function boot(): Theme
	{
		PluginsChecker::instance()->check();
		return $this;
	}
}