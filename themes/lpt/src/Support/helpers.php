<?php

use App\Support\Environment;

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