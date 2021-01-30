<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

use App\Support\Manifest;

?>

<footer class="footer">
	<a href="/">
		<img src="<?= asset('/images/logo-lpt-white.png') ?>"
		     class="h-16 mb-8 mx-auto sm:mx-0"
		     alt="Logo de LPT (Les Petits Trilingues)"
		/>
	</a>
	<h2 class="font-bold text-center text-2xl sm:text-left">LPT三语宝贝</h2>

	<hr class="border-white mx-8 my-8 sm:hidden"/>

	<div class="mx-8 sm:flex flex-row">
		<div class="sm:w-1/2">
			<h3 class="font-bold text-xl mb-6">地址</h3>
			<ul class="mb-12">
				<?php foreach (getThemeMenu("adresses") as $item) : ?>
					<li class="mb-8">
						<?= $item->post_title ?><br/>
						<?= $item->description ?>
					</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="sm:w-1/2">
			<?php foreach (getThemeMenu("contacts") as $item) : ?>
				<h3 class="font-bold text-xl mb-6"><?= $item->post_title ?></h3>
				<ul class="mb-12">
					<?php foreach ($item->getChildren() as $child) : ?>
						<li class="mb-4"><?= $child->post_title ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endforeach; ?>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
<script src="<?= asset(Manifest::instance()->getAsset("index.js")) ?>"></script>