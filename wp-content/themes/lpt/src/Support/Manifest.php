<?php

namespace App\Support;

final class Manifest
{
	private static ?Manifest $_instance = null;
	private array $assets = [];


	private function __construct()
	{
		$manifestPath = Tree::assets("manifest.json");

		if (file_exists($manifestPath)) {
			$this->assets = json_decode(file_get_contents($manifestPath) ?? "{}", true);
		}
	}


	public static function instance(): self
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}


	public function hasAsset(string $filename): bool
	{
		return isset($this->assets[$filename]);
	}


	public function getAsset(string $filename, string $default = null): string
	{
		if (! $this->hasAsset($filename)) {
			return $default ?? $filename;
		}

		return $this->assets[$filename];
	}
}