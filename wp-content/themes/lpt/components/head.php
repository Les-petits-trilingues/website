<?php
/**
 * @var stdClass $post
 * @var PostProxy $proxyPost
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

use App\Core\Theme;
use App\Proxies\PostProxy;

if(!is_front_page()) {
	$proxyPost = new PostProxy($post);
}

?>
<head>
	<meta charset="utf-8">
	<title><?= is_front_page() ? get_bloginfo('name') : $proxyPost->post_title ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
	<?php
	// Analytics Script (optional)
	if (Theme::isProd()) {
		echo env("ANALYTICS_SCRIPT") ?? "";
	}
	?>
</head>
