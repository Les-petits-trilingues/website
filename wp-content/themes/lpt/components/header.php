<?php

use App\Core\Localization;

?>
<header
	class="fixed h-16 px-4 inset-x-0 bottom-0 bg-white container mx-auto flex justify-between border-t-2 border-gray-200
			   z-30 sm:h-auto sm:border-0 sm:mt-6 sm:relative sm:bg-opacity-0 sm:shadow-none"
>
	<div class="hidden sm:block">
		<a href="/">
			<img src="<?= asset('/images/logo-lpt.png') ?>"
			     class="h-16 sm:h-24"
			     alt="Logo de LPT (Les Petits Trilingues)"
			/>
		</a>
	</div>

	<nav class="flex-1 sm:flex sm:items-center sm:justify-end sm:mr-16">
		<ul class="flex h-full w-full justify-end items-stretch text-center sm:h-auto sm:w-auto">
			<?php foreach ($items = getThemeMenu(Localization::suffix("primary")) as $key => $item) : ?>
				<li class="flex-1 sm:flex-none <?= count($items) - 1 > $key ? "sm:mr-6" : "" ?>">
					<a
						class="flex items-center justify-center w-full h-full hover:text-green"
						href="<?= Localization::suffixUrl($item->url) ?>"
					>
						<span><?= $item->title ?></span>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
	</nav>

	<?php if (option("lpt_general.activate_fr", false) === "1"): ?>
		<ul class="hidden sm:flex items-center">
			<li class="inline-block mr-4">
				<a href="<?= Localization::addLangToUrl($_SERVER["REQUEST_URI"], "fr") ?>">
					<img src="<?= asset("pictos/flags/fr.svg") ?>" alt="">
					<span class="hidden">Français - 法语</span>
				</a>
			</li>
			<li class="inline-block">
				<a href="<?= Localization::addLangToUrl($_SERVER["REQUEST_URI"], "zh") ?>">
					<img src="<?= asset("pictos/flags/cn.svg") ?>" alt="">
					<span class="hidden">Chinois - 中文</span>
				</a>
			</li>
		</ul>
	<?php endif; ?>

</header>