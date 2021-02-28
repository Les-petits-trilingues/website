<?php
/**
 * Title: Header of the page
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
	"field" => "subtitle_fr",
	"label" => "Subtitle (fr)",
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
	"type" => "text",
	"field" => "caracteristics_fr",
	"label" => "Caracteristics (fr)",
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
		[
			"type" => "text",
			"field" => "period_fr",
			"label" => "Time range (fr)",
			"columns" => 2,
			"attributes" => ["placeholder" => "an"],
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