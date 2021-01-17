<?php

namespace App\Support;

use App\Core\Theme;

final class Tree
{
	static public function root(string $path = ""): string
	{
		return Theme::getInstance()->basePath() . DIRECTORY_SEPARATOR . $path;
	}


	static public function assets(string $path = ""): string
	{
		return static::root("assets/$path");
	}
}