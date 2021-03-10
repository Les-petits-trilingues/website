<?php

namespace App\Support;

final class Arr
{
	/**
	 * @param mixed $val
	 *
	 * @return array
	 */
	static public function wrap($val): array
	{
		if (is_null($val)) {
			return [];
		}
		
		return is_array($val) ? $val : [$val];
	}
}