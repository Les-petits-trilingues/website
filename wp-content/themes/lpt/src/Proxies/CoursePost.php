<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Proxies;

use WP_Post;
use WP_Query;

/**
 * Class CoursePost
 *
 * @package App\Proxies
 * @property-read string $summup_title
 * @property-read string $summup_description
 * @property-read string $summup_image
 * @property-read string $subtitle
 * @property-read string $register_link
 * @property-read string[] $caracteristics
 * @property-read array<string, string> $price
 * @property-read string $headerImage
 * @property-read array $sections
 */
final class CoursePost extends PostProxy
{
	static public string $type = "courses";


	static public function query(array $parameters = []): WP_Query
	{
		return parent::query(array_merge([
			"post_type" => "courses",
			"nopaging" => true,
			"posts_per_page" => -1,
			"order" => "ASC",
			"orderby" => "menu_order",
		], $parameters));
	}


	static public function fetchForHomepage(): array
	{
		$query = CoursePost::query([
			'meta_key' => 'onHomepage',
			'meta_value' => 'true',
		]);
		/** @noinspection PhpUndefinedMethodInspection */
		return array_map(fn($post) => new static($post), $query->get_posts());
	}
}