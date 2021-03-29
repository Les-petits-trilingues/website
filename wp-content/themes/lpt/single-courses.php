<?php
/**
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
	<body <?php body_class(['font-sans']); ?>
	>
	<?php include "components/header.php" ?>
	<main class="pb-24">

		<?php include "components/courses/header.php" ?>

		<?php include "components/courses/contentTopImages.php" ?>

		<?php foreach ($course->sections as $section) : ?>
			<section class="container m-auto px-3 sm:px-0">
				<h2 class="text-4xl mt-16 mb-10"><?= $section["title"] ?></h2>
				<p class="mb-6"><?= $section["description"] ?></p>
				<?php foreach (array_chunk($section["cards"], 3) as $chunk) : ?>
					<ul class="flex flex-wrap justify-center items-stretch -mx-3 mb-6">
						<?php foreach ($chunk as $card) : ?>
							<li class="px-3 mb-6 w-full sm:w-1/3">
								<div class="bg-beige h-full px-8 py-6 rounded-xl">
									<img class="mb-6" src="<?= $card["images"][0] ?>" alt=""/>
									<h3 class="text-xl"><?= $card[Localization::suffix("title")] ?></h3>
									<p class="mb-4 text-lg"><?= $card[Localization::suffix("subtitle")] ?></p>
									<p class="text-sm"><?= $card[Localization::suffix("description")] ?></p>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				<?php endforeach; ?>
			</section>
		<?php endforeach; ?>

	</main>
	<?php include "components/footer.php" ?>
	</body>
	</html>
<?php endif; ?>