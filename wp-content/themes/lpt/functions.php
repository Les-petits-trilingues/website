<?php
/** @noinspection PhpUndefinedFunctionInspection */

use App\Core\PluginsChecker;
use App\Core\Theme;
use App\Proxies\CoursePost;
use App\Support\Environment;
use App\Support\Manifest;

require_once __DIR__ . '/../../../vendor/autoload.php';

Environment::boot(__DIR__ . '/../../..');
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

add_action('after_setup_theme', function () {
	register_nav_menus([
		"primary" => "Main navigation",
		"adresses" => "Offices and schools addresses",
		"contacts" => "Contact links, phones, etc.",
	]);
});

add_action('wp_enqueue_scripts', function () {
	$manifest = Manifest::instance();
	if ($manifest->hasAsset("index.css")) {
		wp_enqueue_style('main-style', asset($manifest->getAsset("index.css")), [], null);
	}
//	Cannot use the WP way, because it adds the host (with port) and brake the dev workflow
//	wp_enqueue_script('main-script', asset($manifest->getAsset("index.js")), [], null);
});

/*
 * [Piklist]
 */

if (PluginsChecker::instance()->isActivated("piklist")) {
	add_filter('piklist_post_types', function (array $post_types = []): array {
		$post_types["courses"] = [
			"labels" => piklist("post_type_labels", "Courses pages"),
			"menu_icon" => "dashicons-welcome-learn-more",
			"menu_position" => 20,
			"public" => true,
			"supports" => ["title", "page-attributes", "post-formats"],
			"delete_with_user" => false,
			'show_in_nav_menus' => true,
			// Extended with Piklist
			"title" => "Course name",
//			"hide_screen_options" => true,
		];

		return $post_types;
	});

	// A filter to parse new comment-block tags on meta-boxes
	add_filter('piklist_part_data', function ($data, $folder) {
		// Abort if not a Meta-box
		if ($folder !== 'meta-boxes') {
			return $data;
		}

		// Map new comment-block tags
		$data['hide_for_template'] = 'Hide for Template';
		$data['show_for_template'] = 'Show for template';

		return $data;
	}, 10, 2);

	// The filter to show/hide piklist Meta-box against template
	add_filter('piklist_part_process_callback', function ($part, $type) {
		global $post;

		// Abort if not a Meta-box
		if ($type !== 'meta-boxes') {
			return $part;
		}

		$excluded_templates = array_filter(array_map('trim', explode(',', $part['data']['hide_for_template'] ?? '')));
		$included_templates = array_filter(array_map('trim', explode(',', $part['data']['show_for_template'] ?? '')));

		// Abort if we try to include AND exlude
		if (! empty($excluded_templates) && ! empty($included_templates)) {
			throw new ErrorException("Not possible to include and exclude template in the same time. Check you Meta-box" .
				" parameters: {$part["part"]}");
		}

		// Get the active page template
		$active_template = pathinfo(get_page_template_slug($post->ID), PATHINFO_FILENAME) ?: 'default';

		// Hide Meta-box if listed in $hide_template
		if (! empty($excluded_templates) && in_array($active_template, $excluded_templates)) {
			// Change meta-box access to user role: no-role
			$part['data']['role'] = 'no-role';
		}

		// Hide Meta-box if NOT listed in $show_template
		if (! empty($included_templates) && ! in_array($active_template, $included_templates)) {
			// Change meta-box access to user role: no-role
			$part['data']['role'] = 'no-role';
		}

		return $part;
	}, 10, 2);
}

add_action('edit_form_after_title', function ($post) {
	if (! CoursePost::validType($post)) {
		return;
	}

	piklist('field', [
		'type' => 'text',
		'field' => 'post_title_fr',
		'label' => 'Title (fr)',
		'columns' => '12',
	]);
});