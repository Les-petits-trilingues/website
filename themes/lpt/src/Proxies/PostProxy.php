<?php
/** @noinspection PhpUndefinedClassInspection */

namespace App\Proxies;

use WP_Post;
use WP_Query;

/**
 * Class PostProxy
 *
 * @package App\Proxies
 * @property-read int $ID
 * @property-read string $post_author
 * @property-read string $post_date
 * @property-read string $post_date_gmt
 * @property-read string $post_content
 * @property-read string $post_title
 * @property-read string $post_excerpt
 * @property-read string $post_status
 * @property-read string $comment_status
 * @property-read string $ping_status
 * @property-read string $post_password
 * @property-read string $post_name
 * @property-read string $to_ping
 * @property-read string $pinged
 * @property-read string $post_modified
 * @property-read string $post_modified_gmt
 * @property-read string $post_content_filtered
 * @property-read int $post_parent
 * @property-read string $post_guid
 * @property-read int $menu_order
 * @property-read string $post_type
 * @property-read string $post_mime_type
 * @property-read int $comment_count
 * @property-read string $filter
 */
class PostProxy
{
	/** @var WP_Post|object */
	public WP_Post $post;
	private array $metas = [];
	private bool $isMetasLoaded = false;


	public function __construct(WP_Post $post)
	{
		$this->post = $post;
	}


	public function __get($name)
	{
		if (isset($this->post->$name)) {
			return $this->post->$name;
		}

		return $this->$name;
	}


	/**
	 * @return object|WP_Post
	 */
	public function getPost(): WP_Post
	{
		return $this->post;
	}


	public function getMeta(string $id)
	{
		if (! $this->isMetasLoaded) {
			$this->loadMetas();
		}

		return $this->metas[ $id ] ?? null;
	}


	/** @noinspection PhpUndefinedFunctionInspection */
	public function getLink(): string
	{
		return get_post_permalink($this->post);
	}


	/** @noinspection PhpUndefinedFunctionInspection */
	private function loadMetas(): void
	{
		$metas_raw = get_post_meta($this->post->ID, '', false);
		// If we have an array with a single value it might be a non-array field, so we unwrap the array
		// note: isset($value[0]) is to check if it is a sequential array
		$metas = array_map(fn($val) => is_array($val) && count($val) === 1 && isset($val[0]) ? $val[0] : $val, $metas_raw);
		$this->metas = array_map('maybe_unserialize', $metas);
		$this->isMetasLoaded = true;
	}


	static public function query(): WP_Query
	{
		return new WP_Query([]);
	}


	/**
	 * @return static[]
	 */
	static public function fetchAll(): array
	{
		/** @noinspection PhpUndefinedMethodInspection */
		return array_map(fn($post) => new static($post), static::query()->get_posts());
	}
}