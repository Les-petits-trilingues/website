<?php
/**
 * Title: Content of the page
 * Post Type: courses
 * Show for template: single-courses_cardsOnly
 *
 * @noinspection PhpUndefinedFunctionInspection
 */

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
			"type" => "text",
			"field" => "title_fr",
			"label" => "Title $suffix (fr)",
		],
		[
			"type" => "textarea",
			"field" => "description",
			"label" => "Description $suffix",
		],
		[
			"type" => "textarea",
			"field" => "description_fr",
			"label" => "Description $suffix (fr)",
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
			"type" => "text",
			"field" => "title_fr",
			"label" => "Section title (fr)",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "text",
			"field" => "subtitle",
			"label" => "Section subtitle",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "text",
			"field" => "subtitle_fr",
			"label" => "Section subtitle (fr)",
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