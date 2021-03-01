<?php

namespace App\Igniters;

interface IgniterInterface
{
	/**
	 * Applies Wordpress filters (add_filter).
	 * This method is automatically called after "boot".
	 */
	function wpFilters(): void;


	/**
	 * Applies Wordpress actions (add_action).
	 * This method is automatically called after "boot".
	 */
	function wpActions(): void;
}