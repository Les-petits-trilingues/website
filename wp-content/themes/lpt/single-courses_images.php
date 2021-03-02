<?php
/**
 * Template Name: Images gallery
 * Template Post Type: courses
 *
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 * @var stdClass $post
 */

use App\Core\Localization;
use App\Proxies\CoursePost;

if (have_posts()):
	the_post();
	$course = new CoursePost($post);
	?>
	<!doctype html>
	<html <?php language_attributes() ?>>
	<?php include "components/head.php" ?>
	<body <?php body_class(['font-sans']); ?>>
	<?php include "components/header.php" ?>
	<main class="pb-24">

		<?php include "components/courses/header.php" ?>

		<?php foreach ($course->sections as $section) : ?>
			<section class="container m-auto">
				<h2 class="text-4xl mt-16 mb-10"><?= $section[Localization::suffix("title")] ?></h2>
				<p class="mb-6"><?= $section[Localization::suffix("description")] ?></p>
				<ul class="flex flex-wrap justify-center items-stretch -mx-3">
					<?php foreach ($section["images"] as $image) : ?>
						<li class="flex-1 py-3">
							<img class="mx-auto mb-6 max-h-40" src="<?= $image ?>" alt=""/>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
		<?php endforeach; ?>

	</main>
	<?php include "components/footer.php" ?>
	</body>
	</html>
<?php endif; ?>