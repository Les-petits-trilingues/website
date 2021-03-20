<?php

namespace App\Core;

use App\Igniters\IgniterInterface;
use App\Support\Environment;

final class Theme
{
	private static ?Theme $_instance = null;
	private $locale;
	private $options = [];


	private function __construct() { }


	public static function getInstance(): Theme
	{
		if (self::$_instance === null) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}


	public static function isProd(): bool
	{
		return ! self::isLocal();
	}


	public static function isLocal(): bool
	{
		return Environment::get("THEME_ENV") === "local";
	}


	public function basePath(): string
	{
		return realpath(__DIR__ . '/../../');
	}


	public function getLocale(): string
	{
		return $this->locale;
	}


	public function boot(): Theme
	{
		PluginsChecker::instance()->boot();
		Localization::boot();
		$this->locale = Localization::getLocale();
		if (! PluginsChecker::instance()->pass()) {
			$checker = PluginsChecker::instance();

			if ($checker->hasMissing()) {
				/** @noinspection PhpUndefinedFunctionInspection */
				add_action('admin_notices', function () use ($checker) {
					echo '<div class="notice notice-error">' .
						'<p>You must install those plugins: ' . join(", ", $checker->getMissing()) . '.</p>' .
						'</div>';
				});
			}

			$installedUnactivated = array_diff($checker->getUnactivated(), $checker->getMissing());

			if (! empty($installedUnactivated)) {
				/** @noinspection PhpUndefinedFunctionInspection */
				add_action('admin_notices', function () use ($installedUnactivated) {
					echo '<div class="notice notice-error">' .
						'<p>You must activate those plugins: ' . join(", ", $installedUnactivated) . '.</p>' .
						'</div>';
				});
			}
		}
		return $this;
	}


	/**
	 * Ignite the Theme with the given classes.
	 *
	 * @param string[] $igniters List of igniters classnames
	 *
	 * @return $this
	 */
	public function ignite(array $igniters): Theme
	{
		foreach ($igniters as $igniterClassname) {
			// Does not implement igniters
			if (! in_array(IgniterInterface::class, class_implements($igniterClassname), true)) {
				continue;
			}

			// Ignite !
			/** @var IgniterInterface $igniter */
			$igniter = new $igniterClassname();
			$igniter->wpFilters();
			$igniter->wpActions();
		}
		return $this;
	}


	/**
	 * @param string $optionKey The key of the option
	 * @param string|null $fieldKey The key of the field to take from the option
	 * @param null $default Fallback value
	 *
	 * @return mixed|null Returns the whole option if $field not set, otherwise the field value. If the field value does
	 *   not exists, falls back to the default value.
	 * @noinspection PhpUndefinedFunctionInspection
	 */
	public function getOption(string $optionKey, string $fieldKey = null, $default = null)
	{
		if (! isset($this->options[$optionKey])) {
			$this->options[$optionKey] = get_option($optionKey) ?? null;
		}

		$option = $this->options[$optionKey];

		if (empty($option)) {
			return $default;
		}

		if (is_null($fieldKey)) {
			return $option;
		}

		return $option[$fieldKey] ?? $default;
	}
}