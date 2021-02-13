<?php
/**
 * Title: Content of the page
 * Post Type: courses
 * Show for template: default
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
		"field" => "subtitle",
		"label" => "Subtitle",
	],
	[
		"type" => "textarea",
		"field" => "description",
		"label" => "Description",
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
			"type" => "textarea",
			"field" => "description",
			"label" => "Section description",
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