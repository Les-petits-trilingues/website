<?php

namespace App\Core;

use App\Support\Environment;

final class PluginsChecker
{
	private static ?PluginsChecker $_instance = null;

	private array $required;
	private array $installed = [];
	private array $activated = [];


	private function __construct()
	{
		$this->required = array_map('trim', explode(",", Environment::get("PLUGINS", "")));
	}


	public static function instance(): self
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}


	/** @noinspection PhpUndefinedFunctionInspection */
	public function boot(): bool
	{
		$this->installed = scandir(Theme::getInstance()->basePath() . '/../../plugins') ?: [];
		$this->activated = array_map(fn($path) => explode(DIRECTORY_SEPARATOR, $path)[0] ?? "", get_option('active_plugins', []));

		return ! $this->hasMissing() && ! $this->hasUnactivated();
	}


	public function hasMissing(): bool
	{
		return ! empty($this->getMissing());
	}


	public function getMissing(): array
	{
		return array_diff($this->required, $this->installed);
	}


	public function hasUnactivated(): bool
	{
		return ! empty($this->getUnactivated());
	}


	public function getUnactivated(): array
	{
		return array_diff($this->required, $this->activated);
	}


	public function pass(): bool
	{
		return ! $this->hasMissing() && ! $this->hasUnactivated();
	}
}