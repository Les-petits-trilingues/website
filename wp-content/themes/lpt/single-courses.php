<?php
/**
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
	<body <?php body_class(['font-sans']); ?>
	>
	<?php include "components/header.php" ?>
	<main class="pb-24">

		<?php include "components/courses/header.php" ?>

		<?php include "components/courses/contentTopImages.php" ?>

		<?php foreach ($course->sections as $section) : ?>
			<section class="container m-auto">
				<h2 class="text-4xl mt-16 mb-10"><?= $section["title"] ?></h2>
				<p><?= $section["description"] ?></p>
				<ul class="flex flex-wrap items-stretch -mx-3">
					<?php foreach ($section["cards"] as $card) : ?>
						<li class="bg-beige mx-3 px-8 py-6 flex-1 rounded-xl">
							<img class="mb-6" src="<?= $card["images"][0] ?>" alt=""/>
							<h3 class="text-2xl"><?= $card["title"] ?></h3>
							<p class="mb-4 text-lg"><?= $card["subtitle"] ?></p>
							<p class="text-sm"><?= $card["description"] ?></p>
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