<?php
/*
Title: Wechat
Setting: lpt_general
*/

/** @noinspection PhpUndefinedFunctionInspection */
piklist('field', [
	'type' => 'file',
	'field' => "wechatQr",
	'label' => "QR Code",
	'columns' => 12,
	"options" => [
		"button" => "Add qr",
		"basic" => true,
		"save" => "url",
	],
]);
