<?php

namespace App\Igniters;

use App\Proxies\CoursePost;

final class CoursesIgniter implements IgniterInterface
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
	}
}