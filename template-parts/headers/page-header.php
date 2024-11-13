<?php

/**
 * Partial for the site's inner page headers.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

$info = TemplateController::getPageHeader();

$bkgd = $info["bkgd"];

$bg = "background-image: url($bkgd);";
?>

<div class="page-header" style="<?php echo $bg; ?>">
    <h1 class="page-header-title">
        <?php echo $info["title"]; ?></h1>
</div>
</div> <!-- .site-content -->