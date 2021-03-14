<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

use App\Core\Localization;
use App\Igniters\SettingsIgniter;
use App\Proxies\MenuItem;
use App\Support\Arr;
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
			<h2 class="font-bold text-center text-2xl mb-3 sm:text-left">LPT三语宝贝</h2>
			<ul>
				<?php
				$settingsOptions = get_option('lpt_social_networks') ?: [];

				foreach (SettingsIgniter::$socials as $key => $label) {
					if (! empty($link = $settingsOptions["{$key}_link"] ?? null)) {
						$pictoLink = asset("pictos/socials/$key.svg");
						echo "<li class=\"inline-block mr-3 hover:opacity-50\"><a href=\"$link\"><img src=\"$pictoLink\" alt=\"$key\"></a></li>";
					}
				}
				?>
			</ul>
			<img class="mx-auto md:mx-0 w-24 mt-8" src="<?= asset("images/lpt-qr-code.jpg") ?>" alt="QR Code Wechat de LPT"/>
			<hr class="border-white mx-8 my-8 sm:hidden"/>
		</div>
		<div class="sm:flex-auto">
			<div class="mx-8 sm:m-0 sm:flex flex-row">
				<?php foreach (["footer_left", "footer_right"] as $key): ?>
					<div class="sm:w-1/2">
						<?php /** @var MenuItem $item */
						foreach (Arr::wrap(getThemeMenu(Localization::suffix($key))) as $item) : ?>
							<h3 class="font-bold text-xl mb-6"><?= $item->post_title ?></h3>
							<ul class="mb-12 sm:mb-8 sm:text-sm">
								<?php foreach ($item->getChildren() as $child) : ?>
									<li class="mb-4 sm:mb-2">
										<?php
										//										dump($child);
										$link = $child->url;
										$content = $child->post_title;
										if (! empty($link) && $link !== "#") {
											echo "<a href=\"$link\">$content</a>";
										} else {
											echo $content;
										}
										?>
									</li>
								<?php endforeach; ?>
							</ul>
						<?php endforeach; ?>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<script src="<?= asset(Manifest::instance()->getAsset("index.js")) ?>"></script>