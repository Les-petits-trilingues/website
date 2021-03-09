<?php
/**
 * Title: Content of the page
 * Post Type: courses
 * Show for template: default
 *
 * @noinspection PhpUndefinedFunctionInspection
 */

$sectionCardItem = [
	[
		"type" => "file",
		"field" => "images",
		"label" => "Images",
		"options" => [
			"button" => "Add image",
			"save" => "url",
		],
//		"add_more" => true,
	],
	[
		"type" => "text",
		"field" => "title",
		"label" => "Title",
	],
	[
		"type" => "text",
		"field" => "title_fr",
		"label" => "Title (fr)",
	],
	[
		"type" => "text",
		"field" => "subtitle",
		"label" => "Subtitle",
	],
	[
		"type" => "text",
		"field" => "subtitle_fr",
		"label" => "Subtitle (fr)",
	],
	[
		"type" => "textarea",
		"field" => "description",
		"label" => "Description",
	],
	[
		"type" => "textarea",
		"field" => "description_fr",
		"label" => "Description (fr)",
	],
];


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
			"type" => "textarea",
			"field" => "description",
			"label" => "Section description",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "textarea",
			"field" => "description_fr",
			"label" => "Section description (fr)",
			"columns" => 12,
			"attributes" => ["placeholder" => ""],
		],
		[
			"type" => "group",
			"field" => "cards",
			"add_more" => true,
			"fields" => $sectionCardItem,
		],
	],
]);