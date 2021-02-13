<?php

namespace App\Core;

use App\Support\Environment;

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
		return ! self::isLocal();
	}


	public static function isLocal(): bool
	{
		return Environment::get("THEME_ENV") === "local";
	}


	public function basePath(): string
	{
		return realpath(__DIR__ . '/../../');
	}


	public function boot(): Theme
	{
		PluginsChecker::instance()->boot();
		return $this;
	}
}