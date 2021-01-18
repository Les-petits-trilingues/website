<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */
?>
<head>
	<meta charset="utf-8">
	<title><?php is_front_page() ? bloginfo('name') : wp_title('') ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
</head>
