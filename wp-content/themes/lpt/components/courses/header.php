<?php

use App\Core\Localization;
use App\Proxies\CoursePost;
use App\Support\Arr;

/**
 * @var stdClass $post
 * @var CoursePost $course
 */
?>

<header class="px-4 py-12 mt-4 bg-beige">
	<div class="container text-center relative sm:text-left sm:mx-auto">
		<img src="<?= asset("/images/bg-2.png") ?>" alt="" class="hidden sm:block absolute h-96 -left-32 -top-20"/>
		<img src="<?= $course->headerImage ?>" alt="" class="m-auto mb-8 h-56 sm:h-64 sm:absolute sm:-right-16"/>
		<h1 class="text-5xl font-bold mb-4 sm:text-6xl"><?= $course->post_title ?></h1>
		<p class="mb-12 text-2xl"><?= $course->subtitle ?></p>
		<ul class="sm:mx-0 course-caracteristicsList">
			<?php foreach (Arr::wrap($course->caracteristics) as $key => $caracteristic) : ?>
				<li><?= $caracteristic ?></li>
			<?php endforeach; ?>
		</ul>
		<div class="text-center sm:text-left">
			<?php if (! empty($link = $course->register_link)) : ?>
				<a href="<?= $link ?>" class="bigButton">
					<?= t("subscribe") ?>
				</a>
			<?php else: ?>
				<div class="px-6 py-4"></div>
			<?php endif; ?>
		</div>
	</div>
</header>