<?php

namespace App\Core;

use App\Support\Environment;

final class PluginsChecker
{
	private static ?PluginsChecker $_instance = null;

	private array $required;
	private array $missing = [];
	private array $unactivated = [];


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


	public function check(): bool
	{
		$plugins_folders = scandir(Theme::getInstance()->basePath() . '/../../plugins') ?: [];
		$this->missing = array_diff($this->required, $plugins_folders);
		/** @noinspection PhpUndefinedFunctionInspection */
		$activated_folders = array_map(fn($path) => explode(DIRECTORY_SEPARATOR, $path)[0] ?? "", get_option('active_plugins', []));
		$this->unactivated = array_diff($this->required, $activated_folders);

		if ($this->hasMissing()) {
			return false;
		}

		if ($this->hasUnactivated()) {
			return false;
		}

		return true;
	}


	public function hasMissing(): bool
	{
		return ! empty($this->missing);
	}


	public function getMissing(): array
	{
		return $this->missing;
	}


	public function hasUnactivated(): bool
	{
		return ! empty($this->unactivated);
	}


	public function getUnactivated(): array
	{
		return $this->unactivated;
	}


	public function pass(): bool
	{
		return ! $this->hasMissing() && ! $this->hasUnactivated();
	}
}