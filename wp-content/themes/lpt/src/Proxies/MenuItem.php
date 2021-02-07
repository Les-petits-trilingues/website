<?php

namespace App\Proxies;

/**
 * Class MenuItem
 *
 * @package App\Proxies
 * @property-read int $menu_item_parent
 * @property-read string $title
 * @property-read string $url
 * @property-read int $description
 */
final class MenuItem extends PostProxy
{
	/**
	 * @var MenuItem[]
	 */
	private array $children = [];


	/**
	 * Add a sub-menu item
	 *
	 * @param MenuItem $child
	 */
	public function addChildren(MenuItem $child): void
	{
		$this->children[$child->ID] = $child;
	}


	/**
	 * Get the sub-menu items
	 *
	 * @return MenuItem[]
	 */
	public function getChildren(): array
	{
		return $this->children;
	}


	/**
	 * Check if the menuItem has sub-menu or not.
	 *
	 * @return bool
	 */
	public function hasChildren(): bool
	{
		return ! empty($this->children);
	}


	public function hasParent(): bool
	{
		return intval($this->menu_item_parent) !== 0;
	}


}