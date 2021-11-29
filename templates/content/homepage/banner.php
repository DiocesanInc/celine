<?php

/**
 * Partial for the Homepage Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="banner-container teaser-box limit-width">
    <div class="banner-image-wrapper" <?php echo TemplateController::animate("fade-up"); ?>>
        <img class="teaser-img" src="<?php echo get_field("banner_image")["url"]; ?>" />
    </div>

    <div class="teaser-content-wrapper" <?php echo TemplateController::animate("fade-left"); ?>>
        <div class="teaser-content-wrapper-inner">
            <?php if (get_field('banner_title')) : ?>
            <h1 class="teaser-title">
                <?php the_field('banner_title'); ?>
            </h1>
            <?php endif; ?>

            <?php if (get_field('banner_content')) : ?>
            <div class="teaser-content">
                <?php the_field("banner_content"); ?>
            </div>
            <?php endif; ?>

            <?php if (have_rows("banner_links")) : ?>
            <div class="links-container">
                <?php while (have_rows('banner_links')) : the_row();
                    echo acf_link(get_sub_field("banner_link"), 'the-button has-transparent-background-color has-primary-border-color has-primary-color');
                endwhile; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>