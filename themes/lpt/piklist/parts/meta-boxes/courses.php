<?php
/**
 * Title: Content shown on homepage
 * Post Type: courses
 *
 * @noinspection PhpUndefinedFunctionInspection
 */

piklist("field", [
	"type" => "text",
	"field" => "summup_title",
	"label" => "Title",
]);

piklist("field", [
	"type" => "textarea",
	"field" => "summup_description",
	"label" => "Description",
]);

piklist("field", [
	"type" => "file",
	"field" => "summup_image",
	"label" => "Image",
	"options" => [
		"button" => "Add image",
		"save" => "url",
	],
]);