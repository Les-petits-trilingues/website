<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

/** @noinspection PhpUndefinedClassInspection */

use App\Proxies\CoursePost;
use App\Support\Manifest;

?>
<!doctype html>
<html <?php language_attributes() ?>>
<head>
	<meta charset="utf-8">
	<title><?php is_front_page() ? bloginfo('name') : wp_title('') ?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<?php wp_head(); ?>
</head>

<body <?php body_class(['bg-beige-light', 'font-sans']); ?>>

<?php include "components/header.php" ?>

<main class="pb-24">
	<section class="container m-auto">
		<div class="mt-8 mb-16 max-w-2xl m-auto text-center sm:mt-32 sm:mb-36">
			<img src="<?= asset('/images/logo-lpt.png') ?>"
			     class="h-24 m-auto mb-8 sm:hidden"
			     alt="Logo de LPT (Les Petits Trilingues)"
			/>
			<h1 class="text-5xl mb-6 font-bold">巴黎三语宝贝</h1>
			<ul class="placesList text-sm mb-12">
				<li class="inline-block">Belleville</li>
				<li class="inline-block">Place d’Italie</li>
				<li class="inline-block">Marais</li>
				<li class="inline-block">Aubervilliers</li>
			</ul>
			<p class="px-4 mb-14">
				LPT三语宝贝于2014年成立于法国巴黎，有20多位来自中法美三国的老师，我们已成长为法国知名的教育机构，获得逾千名学生和家长的信赖。
			</p>
			<a href="#" class="inline-block rounded-xl bg-orange text-white px-8 py-3">
				开始注册
			</a>
		</div>
		<div class="mx-4 text-center">
			<figure class=" inline-block">
				<img src="<?= asset('images/group-students-happy.jpg') ?>"
				     class="rounded-md mb-3"
				     alt="Un groupe d'enfant souriant prend la pose"
				/>
				<figcaption class="text-sm text-center sm:text-left">
					Visite du musée de l’imprimerie à Hanzhou, Chine
				</figcaption>
			</figure>
		</div>
	</section>
	<section class="mx-4">
		<h2 class="mt-16 sm:mt-32 mb-4 text-center font-bold text-4xl">课程介绍</h2>
		<ul class="m-auto flex-wrap sm:max-w-4xl sm:flex">
			<?php
			$courses = CoursePost::fetchAll();
			foreach ($courses as $index => $course) : ?>
				<li
					class="flex items-start flex-row-reverse flex-shrink-0 <?= $index < count($courses) - 1 ? "border-b" : "" ?>
								 sm:border-0 border-gray-300 py-10 sm:block sm:w-1/3 sm:px-8"
				>
					<img
						class="flex-none h-auto w-24 sm:max-h-20 sm:w-auto ml-6 sm:mx-auto sm:mb-6"
						src="<?= $course->getMeta("summup_image") ?>"
						role="presentation"
						alt=""
					/>
					<div class="sm:text-center flex-auto">
						<h3 class="text-3xl font-bold mb-3 sm:mb-5"><?= $course->getMeta("summup_title") ?></h3>
						<p class="mb-6 sm:mb-6"><?= $course->getMeta("summup_description") ?></p>
						<a
							href="<?= $course->getLink() ?>"
							class="inline-block p-3 leading-none border border-black rounded-md
					           hover:bg-gray-200 focus:bg-black focus:text-white"
						>
							了解更多
						</a>
					</div>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
</main>

<?php wp_footer(); ?>
<script src="<?= asset(Manifest::instance()->getAsset("index.js")) ?>"></script>
</body>
</html>
