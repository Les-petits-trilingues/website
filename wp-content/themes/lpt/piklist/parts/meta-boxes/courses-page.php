<?php
/**
 * Title: Content on the page
 * Post Type: courses
 *
 * @noinspection PhpUndefinedFunctionInspection
 */

piklist("field", [
	"type" => "text",
	"field" => "subtitle",
	"label" => "Subtitle",
	"columns" => 10,
]);

piklist("field", [
	"type" => "text",
	"field" => "caracteristics",
	"label" => "Caracteristics",
	"columns" => 10,
	"add_more" => true,
]);

piklist("field", [
	"type" => "group",
	"field" => "price",
	"label" => "Price",
	"fields" => [
		[
			"type" => "text",
			"field" => "value",
			"label" => "Value",
			"columns" => 2,
			"attributes" => ["placeholder" => 400],
		],
		[
			"type" => "text",
			"field" => "period",
			"label" => "Time range",
			"columns" => 2,
			"attributes" => ["placeholder" => "年"],
		],
	],
]);

piklist("field", [
	"type" => "file",
	"field" => "headerImage",
	"label" => "Header image",
	"options" => [
		"button" => "Add image",
		"save" => "url",
	],
]);