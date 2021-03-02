<?php
/** @noinspection PhpUndefinedFunctionInspection */

use App\Core\Theme;
use App\Igniters\AssetsIgniter;
use App\Igniters\CoursesIgniter;
use App\Igniters\MenusIgniter;
use App\Igniters\PiklistIgniter;
use App\Support\Environment;

require_once __DIR__ . '/../../../vendor/autoload.php';

Environment::boot(__DIR__ . '/../../..');
$theme = Theme::getInstance();
$theme->boot();
$theme->ignite([
	AssetsIgniter::class,
	MenusIgniter::class,
	PiklistIgniter::class,
	CoursesIgniter::class,
]);