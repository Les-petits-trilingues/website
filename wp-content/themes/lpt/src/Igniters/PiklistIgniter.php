<?php

namespace App\Igniters;

use App\Core\PluginsChecker;
use ErrorException;

final class PiklistIgniter implements IgniterInterface
{

	/**
	 * @inheritDoc
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	function wpFilters(): void
	{
		if (! PluginsChecker::instance()->isActivated("piklist")) {
			return;
		}

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


	/**
	 * @inheritDoc
	 */
	function wpActions(): void
	{
		//
	}
}