<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Proxies;

use WP_Post;
use WP_Query;

/**
 * Class CoursePost
 *
 * @package App\Proxies
 */
final class CoursePost extends PostProxy
{
	static public function query(): WP_Query
	{
		return new WP_Query([
			"post_type" => "courses",
			"nopaging" => true,
			"posts_per_page" => -1,
			"order" => "ASC",
			"orderby" => "menu_order",
		]);
	}
}