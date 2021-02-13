<?php
/**
 * Title: Content of the page
 * Post Type: courses
 * Show for template: single-courses_images
 *
 * @noinspection PhpUndefinedFunctionInspection
 */


piklist("field", [
	"type" => "group",
	"field" => "sections",
	"label" => "Sections",
	"add_more" => true,
	"fields" => [
		[
			"type" => "text",
			"field" => "title",
			"label" => "Section title",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "textarea",
			"field" => "description",
			"label" => "Section description",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "file",
			"field" => "images",
			"label" => "Images",
			"options" => [
				"button" => "Add image",
				"save" => "url",
			],
		],
	],
]);