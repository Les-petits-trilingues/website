<?php
/**
 * Template Name: Cards only
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

		<div class="container m-auto mt-10">
			<div class="flex flex-wrap justify-center -mx-3">
				<?php foreach ($course->sections as $section) : ?>
				<div class="px-3 mb-6 flex-auto flex-grow-0 w-1/2 ">
					<section class="bg-beige px-8 py-6 rounded-xl h-full">
						<h2 class="text-2xl text-center"><?= $section["title"] ?></h2>
						<p class="text-center"><?= $section["subtitle"] ?></p>
						<ul class="flex -mx-3 text-center">
							<li class="flew-1 w-1/2 bg-beige px-3 rounded-xl">
								<img class="mb-6 mx-auto max-h-28" src="<?= $section["left"]["image"][0] ?>" alt=""/>
								<h3 class="font-bold text-sm"><?= $section["left"]["title"] ?></h3>
								<p class="text-xs"><?= $section["left"]["description"] ?></p>
							</li>
							<li class="flew-1 w-1/2 bg-beige px-3 rounded-xl">
								<img class="mb-6 mx-auto max-h-28" src="<?= $section["right"]["image"][0] ?>" alt=""/>
								<h3 class="font-bold text-sm"><?= $section["right"]["title"] ?></h3>
								<p class="text-xs"><?= $section["right"]["description"] ?></p>
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