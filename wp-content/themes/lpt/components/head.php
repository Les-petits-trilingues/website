<?php
/**
 * @var stdClass $post
 * @var PostProxy $proxyPost
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

use App\Core\Localization;
use App\Core\Theme;
use App\Proxies\CoursePost;
use App\Proxies\PostProxy;

if (! is_front_page()) {
	$proxyPost = new PostProxy($post);
}

?>
<head>
	<meta charset="utf-8">
	<title><?= is_front_page() ? get_bloginfo('name') : $proxyPost->post_title ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php
	if (is_home() || CoursePost::validType($post)) {
		$locales = join("|", Localization::getLocales());
		$defaultUrl = preg_replace("/[?&]lang=($locales)/", "", $_SERVER["REQUEST_URI"]);
		$defaultUrl .= strpos($defaultUrl, "?") === false ? "?" : "&";
		foreach (Localization::getLocales() as $locale) {
			echo "<link rel=\"alternate\" href=\"{$defaultUrl}lang=$locale\" hreflang=\"$locale\">";
		}
	}
	?>
	<?php wp_head(); ?>
	<?php
	// Analytics Script (optional)
	if (Theme::isProd() && ! is_user_logged_in()) {
		echo env("ANALYTICS_SCRIPT") ?? "";
	}
	?>
</head>
