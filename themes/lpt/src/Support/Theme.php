<?php

namespace App\Support;

final class Theme
{
	public static function isProd(): bool
	{
		return in_array(Environment::get("THEME_ENV"), ["prod", "production"], true);
	}


	public static function isLocal(): bool
	{
		return ! self::isProd();
	}
}