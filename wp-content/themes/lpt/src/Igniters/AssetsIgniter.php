<?php

namespace App\Igniters;

use App\Support\Manifest;

final class AssetsIgniter implements IgniterInterface
{

	/**
	 * @inheritDoc
	 */
	function wpFilters(): void
	{
		//
	}


	/**
	 * @inheritDoc
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	function wpActions(): void
	{
		add_action('wp_enqueue_scripts', function () {
			$manifest = Manifest::instance();
			if ($manifest->hasAsset("index.css")) {
				wp_enqueue_style('main-style', $manifest->getAsset("index.css"), [], null);
			}
//	Cannot use the WP way, because it adds the host (with port) and brake the dev workflow
//	wp_enqueue_script('main-script', asset($manifest->getAsset("index.js")), [], null);
		});
	}
}