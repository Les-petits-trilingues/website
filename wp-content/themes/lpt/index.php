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
<body <?php body_class(['bg-beige-light font-sans bg-no-repeat bg-center bg-top']); ?>
	style="background-image: url(<?= asset("images/bg-1.svg") ?>); background-size: 100%;"
>

<?php include "components/header.php" ?>

<main>
	<section class="slantedBackground pb-8">
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
		</div>
	</section>
	<section class="pt-8 px-4 bg-green-light">
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
	<section class="px-4 bg-green-light overflow-hidden">
    <h2 class="container m-auto sm:mt-32 mb-4 text-center font-bold text-4xl">联系我们</h2>
		<div class="container m-auto sm:flex flex-row">
			<div class="flex-auto w-1/2 sm:mr-4">
				<h3 class="mt-12 mb-4 font-bold text-2xl">地址</h3>
				<ul>
					<li class="mb-4 sm:mb-8">
						LPT - Place d'italie<br>161 Avenue de Choisy, 75013 Paris
					</li>
					<li class="mb-4 sm:mb-8">
						LPT - Belleville<br>53 Rue Rebeval, 75019 Paris
					</li>
					<li class="mb-4 sm:mb-8">
						LPT - Aubervilliers<br>87 Avenue Victor Hugo, 93300 Aubervilliers
					</li>
				</ul>
			</div>
			<div class="flex-auto w-1/2 sm:ml-4">
				<h3 class="mt-12 mb-4 font-bold text-2xl">电话</h3>
				<ul>
					<li class="mb-4">Sonia: +33 6 27 35 04 35</li>
					<li class="mb-4">NingNing: +33 6 65 56 57 78</li>
				</ul>
				<h3 class="mt-12 mb-4 font-bold text-2xl">微信</h3>
				<p class="mb-4">Sonia-in-Paris ou LPT-Paris</p>
				<h3 class="mt-12 mb-4 font-bold text-2xl">电子邮件</h3>
				<ul>
					<li class="mb-4">soniazhao.qd@gmail.com</li>
					<li class="mb-4">lespetitstrilingues.paris@gmail.com</li>
				</ul>
			</div>
		</div>
	</section>
	<footer class="pb-24 bg-green-light"></footer>
</main>

<?php include "components/footer.php" ?>
</body>
</html>
