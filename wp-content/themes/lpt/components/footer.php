<?php
/**
 * @noinspection PhpUndefinedFunctionInspection
 * @noinspection HtmlRequiredLangAttribute
 */

use App\Support\Manifest;

?>
<?php wp_footer(); ?>
<script src="<?= asset(Manifest::instance()->getAsset("index.js")) ?>"></script>