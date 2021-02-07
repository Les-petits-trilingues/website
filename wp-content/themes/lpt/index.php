<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

/** @noinspection PhpUndefinedClassInspection */

use App\Proxies\CoursePost;

?>
<!doctype html>
<html <?php language_attributes() ?>>
<?php include "components/head.php" ?>
<body <?php body_class(['homepage font-sans bg-no-repeat bg-center bg-top']); ?>
	style="background-image: url(<?= asset("images/bg-1.svg") ?>)"
>

<?php include "components/header.php" ?>

<main>
	<section class="pb-8">
		<div class="container m-auto">
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
					我们来自法国巴黎，是一所致力于<strong class="text-red">中英法</strong>三语教学的国际语言学校。
				</p>
				<ul class="flex flex-wrap text-center mb-8 px-4">
					<li class="w-1/2 sm:w-1/4 mb-8">
						<span class="text-red font-bold text-xl">7</span>年<br>
						三语教学经验
					</li>
					<li class="w-1/2 sm:w-1/4 mb-8">
						<span class="text-red font-bold text-xl">25</span>名<br>
						主力中美法老师
					</li>
					<li class="w-1/2 sm:w-1/4 mb-8">
						<span class="text-red font-bold text-xl">160+</span><br>
						中英美夏令营营员
					</li>
					<li class="w-1/2 sm:w-1/4 mb-8">
						<span class="text-red font-bold text-xl">1&nbsp;000+</span><br>
						在校学员/年
					</li>
				</ul>
				<a href="#" class="inline-block rounded-xl bg-orange text-xl text-white px-6 py-2">
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
		</div>
	</section>
	<section class="pt-8 px-4">
		<h2 class="sm:mt-32 mb-4 text-center font-bold text-4xl">课程介绍</h2>
		<ul class="m-auto flex-wrap sm:max-w-4xl sm:flex">
			<?php
			$courses = CoursePost::fetchAll();
			foreach ($courses as $index => $course) : ?>
				<li
					class="flex items-start flex-row-reverse flex-shrink-0 <?= $index < count($courses) - 1 ? "border-b" : "" ?>
								 sm:border-0 border-gray-200 py-10 sm:block sm:w-1/3 sm:px-8"
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

<img class="w-full mt-16" src="<?= asset("images/illustration-lpt-party.jpg") ?>" alt="" role="presentation">

<?php include "components/footer.php" ?>
</body>
</html>
