<?php
/**
 * Template Name: Images gallery
 * Template Post Type: courses
 *
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 * @var stdClass $post
 */

use App\Proxies\CoursePost;

if (have_posts()):
	the_post();
	$course = new CoursePost($post);
	?>
	<!doctype html>
	<html <?php language_attributes() ?>>
	<?php include "components/head.php" ?>
	<body <?php body_class(['bg-beige-light font-sans bg-no-repeat bg-center bg-top']); ?>
		style="background-image: url(<?= asset("images/bg-1.svg") ?>); background-size: 100%;"
	>
	<?php include "components/header.php" ?>
	<main class="pb-24">

		<?php include "components/courses/header.php" ?>

		<?php include "components/courses/contentTopImages.php" ?>

		<section class="container m-auto"></section>

	</main>
	<?php include "components/footer.php" ?>
	</body>
	</html>
<?php endif; ?>