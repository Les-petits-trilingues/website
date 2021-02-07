<?php
/**
 * Title: Content of the page
 * Post Type: courses
 * Show for template: single-courses_cardsOnly
 *
 * @noinspection PhpUndefinedFunctionInspection
 */

piklist("field", [
	"type" => "file",
	"field" => "contentTopImages",
	"label" => "Photos",
	"options" => [
		"button" => "Add image",
		"save" => "url",
	],
	"columns" => 12,
	"add_more" => true,
]);

function cardPartParams(string $suffix): array
{
	return [
		[
			"type" => "file",
			"field" => "image",
			"label" => "Image $suffix",
			"options" => [
				"button" => "Add image",
				"save" => "url",
			],
		],
		[
			"type" => "text",
			"field" => "title",
			"label" => "Title $suffix",
		],
		[
			"type" => "textarea",
			"field" => "description",
			"label" => "Description $suffix",
		],
	];
}


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
			"field" => "subtitle",
			"label" => "Section subtitle",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "group",
			"field" => "left",
			"columns" => 6,
			"fields" => cardPartParams("left"),
		],
		[
			"type" => "group",
			"field" => "right",
			"columns" => 6,
			"fields" => cardPartParams("right"),
		],
	],
]);