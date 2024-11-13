<?php

/**
 * Partial for site-info in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

$bgColor = TemplateController::getBackgroundColor("site_info");
$fontColor = TemplateController::getFontColor("site_info");
$heartColor = TemplateController::getFontColor("heart");
?>



<div class="site-info-container <?php echo "$bgColor $fontColor" ?>">
    <div class="site-info">
        &copy; <?= date("Y"); ?> <a href="<?= esc_url(home_url("/")); ?>" class="has-white-color has-white-background-color-after has-underline-hover" rel="home"><?php bloginfo("name"); ?></a>
        <?php if (is_array(get_field("site_info_link", "options")) && array_key_exists("url", get_field("site_info_link", "options"))) : ?>
            <?php $title = array_key_exists("title", get_field("site_info_link", "options")) ? get_field("site_info_link", "options")["title"] : get_bloginfo("name"); ?>
            <span class="sep"> | </span>
            <a href="<?php echo get_field("site_info_link", "options")["url"]; ?>" class="footer-link has-underline-hover has-white-background-color-after" title="<?php echo $title; ?>">
                <?php echo $title; ?>
            </a>
        <?php endif; ?>
    </div>
    <div class="diocesan">
        Made with <span class="hearts <?php echo $heartColor; ?>">&hearts;</span> by <a href="https://diocesan.com/" class="has-white-color has-white-background-color-after has-underline-hover" target="_blank" title="Diocesan">Diocesan</a>
    </div>
</div>