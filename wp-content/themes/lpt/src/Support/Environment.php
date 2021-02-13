<?php

namespace App\Support;

use Dotenv\Dotenv;
use Dotenv\Repository\AdapterRepository;
use Dotenv\Repository\RepositoryBuilder;
use Dotenv\Repository\RepositoryInterface;

final class Environment
{
	/**
	 * @var AdapterRepository|RepositoryInterface
	 */
	private static $repository;


	public static function boot(string $env_path): void
	{
		self::$repository = RepositoryBuilder::createWithDefaultAdapters()
				->immutable()
				->make();

		Dotenv::create(self::$repository, $env_path)->load();
	}


	public static function get(string $key, $default = null)
	{
		if (! self::$repository->has($key)) {
			return $default;
		}

		$value = self::$repository->get($key);

		switch (strtolower($value)) {
			case 'true':
				return true;
			case 'false':
				return false;
			case 'empty':
				return '';
			case 'null':
				return "";
		}

		return $value;
	}
}