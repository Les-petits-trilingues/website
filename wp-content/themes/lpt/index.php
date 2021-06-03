<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

/** @noinspection PhpUndefinedClassInspection */

use App\Proxies\CoursePost;
use App\Core\Localization;

?>
<!doctype html>
<html lang="<?= theme()->getLocale() ?>">
<?php include "components/head.php" ?>
<body <?php body_class(['homepage font-sans bg-no-repeat bg-center bg-top']); ?>
	style="background-image: url(<?= asset("images/bg-1.svg") ?>)"
>

<?php include "components/header.php" ?>

<main>
	<!-- Header (welcome) -->
	<section class="pb-8">
		<div class="container m-auto">
			<div class="mt-8 mb-16 max-w-2xl m-auto text-center sm:mt-32 sm:mb-36">
				<img src="<?= asset('/images/logo-lpt.png') ?>"
				     class="h-24 m-auto mb-8 sm:hidden"
				     alt="Logo de LPT (Les Petits Trilingues)"
				/>

				<h1 class="text-5xl mb-6 font-bold">
					<?= t("lpt_homepage.title", true, "巴黎三语宝贝") ?>
				</h1>

				<ul class="placesList text-sm mb-12">
					<?php foreach (t("lpt_homepage.schools", true, []) as $school) : ?>
						<li class="inline-block"><?= $school ?></li>
					<?php endforeach; ?>
				</ul>

				<p class="px-4 mb-14 md:text-xl">
					<?= t("lpt_homepage.description", true) ?>
				</p>
				<ul class="flex flex-wrap text-center mb-8 px-4">
					<?php foreach (t("lpt_homepage.bestValues", true, []) as $item) : ?>
						<li class="w-1/2 sm:w-1/4 mb-8"><?= $item ?></li>
					<?php endforeach; ?>
				</ul>
				<a
					href="<?= Localization::suffix("https://tools.lpt.ovh/onboarding", false, "?locale=") ?>"
					class="bigButton"
				>
					<?= t("lpt_homepage.registrationButton", true, "开始注册") ?>
				</a>
			</div>
		</div>
	</section>

	<!-- Courses list -->
	<section class="pt-8 px-4">
		<h2 id="courses" class="sm:mt-32 mb-4 text-center font-bold text-4xl">
			<?= t("lpt_homepage.coursesTitle", true, "课程介绍") ?>
		</h2>
		<ul class="m-auto flex-wrap sm:max-w-4xl sm:flex">
			<?php
			$courses = CoursePost::fetchForHomepage();
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
							href="<?= Localization::suffixUrl($course->getLink()) ?>"
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

	<!-- Children image -->
	<section class="pt-8 px-4 sm:max-w-4xl mx-auto">
		<div class="mx-4 text-center">
			<?php if (! empty($img = option("lpt_homepage.image")[0] ?? null)): ?>
				<figure class=" inline-block">
					<img src="<?= $img ?>"
					     class="rounded-md mb-3"
					     alt="Un groupe d'enfant souriant prend la pose"
					/>
					<figcaption class="text-sm text-center sm:text-left">
						<?= t("lpt_homepage.imageCaption", true) ?>
					</figcaption>
				</figure>
			<?php endif; ?>
		</div>
	</section>

	<!-- Goals of LPT -->
	<section class="pt-8 px-4 sm:max-w-5xl mx-auto">
		<?php if (! empty($img = option("lpt_homepage.perksImage")[0] ?? null)): ?>
			<img src="<?= $img ?>" class="rounded-md mb-3" alt=""/>
		<?php endif; ?>
		<ul class="flex flex-row flex-wrap sm-mx-6">
			<?php foreach (t("lpt_homepage.perks", true) as $index => $text): ?>
				<li class="sm:w-1/5 sm:px-3">
					<h3 class="text-3xl mb-2"><?= str_pad($index + 1, 2, "0", STR_PAD_LEFT) ?></h3>
					<p class="leading-tight"><?= $text ?></p>
				</li>
			<?php endforeach; ?>
		</ul>
	</section>
</main>

<img class="w-full mt-16" src="<?= asset("images/illustration-lpt-party.jpg") ?>" alt="" role="presentation">

<?php include "components/footer.php" ?>
</body>
</html>
