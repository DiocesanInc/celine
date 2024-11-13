<?php

/**
 * Partial for the Homepage Banner section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

$is_mass_times = get_field("banner_content_type");
$title_class = $is_mass_times ? " align-center" : "";
$link_class = $is_mass_times ? " justify-center" : "";
$has_custom_title = '';
?>

<div class="banner-container teaser-box limit-width">
    <div class="banner-image-wrapper" <?php echo TemplateController::animate("fade-up"); ?>>
        <img class="teaser-img" src="<?php echo get_field("banner_image")["url"]; ?>" />
    </div>

    <div class="teaser-content-wrapper" <?php echo TemplateController::animate("fade-left"); ?>>
        <div class="teaser-content-wrapper-inner">
            <?php if ($is_mass_times) : ?>
                <?php if (get_field('banner_title')) : ?>
                    <h3 class="teaser-title<?php echo $title_class; ?>">
                        <?php the_field('banner_title'); ?>
                    </h3>
                <?php $has_custom_title = ' has-custom-title';
                      endif; ?>
                <div class="teaser-content mass-times<?= $has_custom_title; ?>">
                    <?php while (have_rows("schedule", "options")) : the_row(); ?>
                        <?php if (get_sub_field("show_on_homepage")) : ?>
                            <?php if (get_sub_field('title')) : ?>
                                <h3 class="teaser-title<?php echo $title_class; ?>">
                                    <?php echo get_sub_field('title'); ?>
                                </h3>
                            <?php endif; ?>
                            <div class="mass-times grid col-2">
                                <?php while (have_rows("times")) : the_row(); ?>
                                    <div class="mass-time">
                                        <div class="day align-center">
                                            <strong>
                                                <?php the_sub_field("day"); ?>
                                            </strong>
                                        </div>
                                        <div class="times align-center">
                                            <?php the_sub_field("times"); ?>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        <?php endif; ?>
                    <?php endwhile; ?>
                </div>
            <?php else : ?>
                <?php if (get_field('banner_title')) : ?>
                    <h2 class="teaser-title<?php echo $title_class; ?>">
                        <?php the_field('banner_title'); ?>
                    </h2>
                <?php endif; ?>
                <?php if (get_field('banner_content')) : ?>
                    <div class="teaser-content">
                        <?php the_field("banner_content"); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>

            <?php if (have_rows("banner_links")) : ?>
                <div class="links-container<?php echo $link_class; ?>">
                    <?php while (have_rows('banner_links')) : the_row();
                        echo acf_link(get_sub_field("banner_link"), 'the-button has-transparent-background-color has-primary-border-color has-primary-color');
                    endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>