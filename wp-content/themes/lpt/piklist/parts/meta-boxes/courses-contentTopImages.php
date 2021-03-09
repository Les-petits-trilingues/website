<?php
/**
 * Title: Content top images
 * Post Type: courses
 * Hide for template: single-courses_images
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
]);