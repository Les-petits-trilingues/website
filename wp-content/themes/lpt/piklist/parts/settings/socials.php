<?php
/*
Title: Links
Setting: lpt_social_networks
*/

use App\Igniters\SettingsIgniter;

foreach (SettingsIgniter::$socials as $key => $label) {
	/** @noinspection PhpUndefinedFunctionInspection */
	piklist('field', [
		'type' => 'text',
		'field' => "{$key}_link",
		'label' => $label,
		'attributes' => [
			'placeholder' => 'Link to the social page',
		],
		'columns' => 12,
	]);
}
