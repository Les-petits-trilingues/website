<?php
/**
 * Template Name: Cards only
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

		<?php include "components/courses/contentTopImages.php" ?>

		<div class="container m-auto mt-10">
			<div class="flex flex-wrap justify-center -mx-3">
				<?php foreach ($course->sections as $section) : ?>
				<div class="px-3 mb-6 flex-auto flex-grow-0 w-1/2 ">
					<section class="bg-beige px-8 py-6 rounded-xl h-full">
						<h2 class="text-2xl text-center"><?= $section[Localization::suffix("title")] ?></h2>
						<p class="text-center mb-4"><?= $section[Localization::suffix("subtitle")] ?></p>
						<ul class="flex -mx-3 text-center">
							<li class="flew-1 w-1/2 bg-beige px-3 rounded-xl">
								<img class="mb-6 mx-auto max-h-36" src="<?= $section["left"]["image"][0] ?>" alt=""/>
								<h3 class="font-bold text-sm mb-2"><?= $section["left"][Localization::suffix("title")] ?></h3>
								<p class="text-xs"><?= $section["left"][Localization::suffix("description")] ?></p>
							</li>
							<li class="flew-1 w-1/2 bg-beige px-3 rounded-xl">
								<img class="mb-6 mx-auto max-h-36" src="<?= $section["right"]["image"][0] ?>" alt=""/>
								<h3 class="font-bold text-sm mb-2"><?= $section["right"][Localization::suffix("title")] ?></h3>
								<p class="text-xs"><?= $section["right"][Localization::suffix("description")] ?></p>
							</li>
						</ul>
					</section>
				</div>
				<?php endforeach; ?>
			</div>
		</div>

	</main>
	<?php include "components/footer.php" ?>
	</body>
	</html>
<?php endif; ?>