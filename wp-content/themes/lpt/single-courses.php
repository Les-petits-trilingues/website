<?php
/**
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
	<body <?php body_class(['bg-beige-light', 'font-sans']); ?>>
	<?php include "components/header.php" ?>
	<main class="pb-24">
		<header class="container px-4 mt-12 text-center md:text-left md:mx-auto">
			<h1 class="text-5xl font-bold mb-4 md:text-6xl"><?= wp_title("") ?></h1>
			<p class="mb-12 text-2xl">出口成章 下笔有神</p>
			<ul class="mx-6 md:mx-0 mb-12">
				<?php foreach ($course->getMeta("caracteristics") as $key => $caracteristic) : ?>
					<li class="mb-6"><?= $caracteristic ?></li>
				<?php endforeach; ?>
			</ul>
			<div class="text-center md:text-left">
				<a href="#" class="inline-block text-xl rounded-xl bg-orange leading-none text-white px-6 py-4">
					开始注册
				</a>
				<span class="block md:inline-block mx-auto md:ml-2 mt-2 text-lg">400欧/年</span>
			</div>
		</header>

		<section class="container m-auto"></section>

	</main>
	<?php include "components/footer.php" ?>
	</body>
	</html>
<?php endif; ?>