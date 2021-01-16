<?php
/** @noinspection PhpUndefinedFunctionInspection */

use App\Core\PluginsChecker;
use App\Core\Theme;
use App\Support\Environment;

require_once __DIR__ . '/../vendor/autoload.php';

Environment::boot(__DIR__ . '/..');
$theme = Theme::getInstance();
$theme->boot();

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

//add_action('wp_enqueue_scripts', function () {
//	$version = Theme::isLocal() ? time() : false;
//	wp_enqueue_script('script-name', '/wp-content/themes/lpt/assets/main.js', [], $version, true);
//});