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