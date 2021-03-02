<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

use App\Core\Localization;
use App\Support\Manifest;

?>

<footer class="footer">
	<div class="container m-auto md:flex">
		<div class="sm:mr-16">
			<a href="/">
				<img src="<?= asset('/images/logo-lpt-white.png') ?>"
				     class="h-16 mb-8 mx-auto sm:mx-0"
				     alt="Logo de LPT (Les Petits Trilingues)"
				/>
			</a>
			<h2 class="font-bold text-center text-2xl sm:text-left">LPT三语宝贝</h2>
			<img class="mx-auto md:mx-0 w-24 mt-8" src="<?= asset("images/lpt-qr-code.jpg") ?>" alt="QR Code Wechat de LPT"/>
			<hr class="border-white mx-8 my-8 sm:hidden"/>
		</div>
		<div class="sm:flex-auto">
			<div class="mx-8 sm:m-0 sm:flex flex-row">
				<div class="sm:w-1/2">
					<h3 class="font-bold text-xl mb-6"><?= t("address") ?></h3>
					<ul class="mb-12 sm:mb-8 sm:text-sm">
						<?php foreach (getThemeMenu(Localization::suffix("adresses")) as $item) : ?>
							<li class="mb-8 sm:mb-4">
								<?= $item->post_title ?><br/>
								<?= $item->description ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="sm:w-1/2">
					<?php foreach (getThemeMenu(Localization::suffix("contacts")) as $item) : ?>
						<h3 class="font-bold text-xl mb-6"><?= $item->post_title ?></h3>
						<ul class="mb-12 sm:mb-8 sm:text-sm">
							<?php foreach ($item->getChildren() as $child) : ?>
								<li class="mb-4 sm:mb-2"><?= $child->post_title ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<script src="<?= asset(Manifest::instance()->getAsset("index.js")) ?>"></script>