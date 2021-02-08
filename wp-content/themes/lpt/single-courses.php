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
		<header class="px-4 py-12 mt-4 bg-beige">
			<div class="container text-center relative sm:text-left sm:mx-auto">
				<img src="<?= $course->headerImage ?>" alt="" class="m-auto mb-8 h-56 sm:h-64 sm:absolute sm:-right-16"/>
				<h1 class="text-5xl font-bold mb-4 sm:text-6xl"><?= wp_title("") ?></h1>
				<p class="mb-12 text-2xl"><?= $course->subtitle ?></p>
				<ul class="sm:mx-0 course-caracteristicsList">
					<?php foreach ($course->caracteristics as $key => $caracteristic) : ?>
						<li><?= $caracteristic ?></li>
					<?php endforeach; ?>
				</ul>
				<div class="text-center sm:text-left">
					<a href="#" class="inline-block text-xl rounded-xl bg-orange leading-none text-white px-6 py-4">
						开始注册
					</a>
					<span class="block sm:inline-block mx-auto sm:ml-2 mt-2 text-lg">
					<?= $course->price["value"] ?>欧/<?= $course->price["period"] ?>
				</span>
				</div>
			</div>
		</header>

		<?php if ($course->contentTopImages): ?>
			<section class="container mx-auto">
				<ul class="flex justify-center items-stretch -mx-3 my-10">
					<?php foreach ($course->contentTopImages as $image): ?>
						<li class="mx-3">
							<img src="<?= $image ?>" alt="" style="max-height: 12rem;"/>
						</li>
					<?php endforeach; ?>
				</ul>
			</section>
		<?php endif; ?>

		<?php foreach ($course->sections as $section) : ?>
			<section class="container m-auto">
				<h2 class="text-4xl text-center mt-16 mb-10"><?= $section["title"] ?></h2>
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