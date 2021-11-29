<?php

/**
 * Partial for the site's inner page headers.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php $info = TemplateController::getPageHeader(); ?>

<div class="page-header" style="background-image: url(<?php echo $info["bkgd"]; ?>);">
    <h1 class="page-header-title">
        <?php echo $info["title"]; ?></h1>
</div>
</div> <!-- .site-content -->