<?php
/**
 * Title: Content shown on homepage
 * Post Type: courses
 *
 * @noinspection PhpUndefinedFunctionInspection
 */

piklist("field", [
	"type" => "select",
	"field" => "onHomepage",
	"label" => "Display on homepage",
	"value" => "false",
	"choices" => [
		"true" => "Yes",
		"false" => "No",
	],
]);

piklist("field", [
	"type" => "text",
	"field" => "summup_title",
	"label" => "Title",
	"conditions" => [
		[
			"field" => "onHomepage",
			"value" => "true",
		],
	],
]);

piklist("field", [
	"type" => "text",
	"field" => "summup_title_fr",
	"label" => "Title (fr)",
	"conditions" => [
		[
			"field" => "onHomepage",
			"value" => "true",
		],
	],
]);

piklist("field", [
	"type" => "textarea",
	"field" => "summup_description",
	"label" => "Description",
	"conditions" => [
		[
			"field" => "onHomepage",
			"value" => "true",
		],
	],
]);

piklist("field", [
	"type" => "textarea",
	"field" => "summup_description_fr",
	"label" => "Description (fr)",
	"conditions" => [
		[
			"field" => "onHomepage",
			"value" => "true",
		],
	],
]);

piklist("field", [
	"type" => "file",
	"field" => "summup_image",
	"label" => "Image",
	"options" => [
		"button" => "Add image",
		"save" => "url",
	],
	"conditions" => [
		[
			"field" => "onHomepage",
			"value" => "true",
		],
	],
]);