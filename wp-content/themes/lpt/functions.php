<?php
/** @noinspection PhpUndefinedFunctionInspection */

use App\Core\PluginsChecker;
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

if (! PluginsChecker::instance()->pass()) {
	$checker = PluginsChecker::instance();

	if ($checker->hasMissing()) {
		add_action('admin_notices', function () use ($checker) {
			echo '<div class="notice notice-error">' .
				'<p>You must install those plugins: ' . join(", ", $checker->getMissing()) . '.</p>' .
				'</div>';
		});
	}

	$installedUnactivated = array_diff($checker->getUnactivated(), $checker->getMissing());

	if (! empty($installedUnactivated)) {
		add_action('admin_notices', function () use ($installedUnactivated) {
			echo '<div class="notice notice-error">' .
				'<p>You must activate those plugins: ' . join(", ", $installedUnactivated) . '.</p>' .
				'</div>';
		});
	}
}