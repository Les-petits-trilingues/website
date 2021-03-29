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
	"type" => "text",
	"field" => "register_link",
	"label" => "Register url",
	"columns" => 10,
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