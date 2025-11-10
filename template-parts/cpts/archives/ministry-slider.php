<?php

/**
 * Template part for displaying the content in ministry-groups.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

?>

<div class="ministry-slider entry-content max-width">
    <?php $groups = MinistriesController::getMinistryGroups();
    foreach ($groups as $group) :
        $ministries = MinistriesController::getMinistriesByGroup($group->term_id); ?>
        <div class="ministry-group same-height">
            <h2 <?php echo TemplateController::animate("fade") ?>><?php echo $group->name; ?></h2>
            <?php foreach ($ministries as $ministry) : ?>
                <?php $excerpt = $ministry->post_excerpt ? $ministry->post_excerpt : $ministry->post_content; ?>
                <?php if (get_field("ministry_lightbox")) : ?>
                    <div class="ministry-wrapper teaser-box" data-open-lightbox="true"
                        data-excerpt="<?php echo wp_trim_words($excerpt, 25); ?>" data-title="<?php echo $ministry->post_title; ?>"
                        data-image="<?php echo get_the_post_thumbnail_url($ministry); ?>"
                        data-link="<?php echo get_the_permalink($ministry); ?>"
                        data-contact="<?php echo MinistriesController::getStaffMemberNamesByMinistry($ministry->ID); ?>"
                        <?php echo TemplateController::animate("fade-left") ?>>
                        <div class=" ministry-image-wrapper">
                            <img class="teaser-img" src="<?php echo get_the_post_thumbnail_url($ministry); ?>" />
                        </div>
                        <div class="teaser-content-wrapper">
                            <h3 class="teaser-title"><?php echo $ministry->post_title ?></h3>
                        </div>

                    </div>
                <?php else : ?>
                    <a href="<?php echo get_the_permalink($ministry); ?>" data-open-lightbox="false"
                        class="ministry-wrapper teaser-box" <?php echo TemplateController::animate("fade-left") ?>>
                        <div class=" ministry-image-wrapper">
                            <img class="teaser-img" src="<?php echo get_the_post_thumbnail_url($ministry); ?>" />
                        </div>
                        <div class="teaser-content-wrapper">
                            <h3 class="teaser-title"><?php echo $ministry->post_title ?></h3>
                        </div>

                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
<?php if (get_field("ministry_lightbox")) : ?>
    <div class="lightbox-overlay"></div>
    <div id="ministry-lightbox" class="lightbox">
        <div class="lightbox-close"></div>
        <div class="lightbox-image"></div>
        <div class="lightbox-content">
            <h4 class="lightbox-title"></h4>
            <div class="lightbox-excerpt"></div>
            <div class="lightbox-link"></div>
            <div class="lightbox-contact-persons"></div>
            <?php if (MinistriesController::getMinistryContactFormId()) : ?>
                <div class="contact-form-wrapper">
                    <h3>Interested?</h3>
                    <p>Let us know and we will get back to you.</p>
                    <div class="contact-form">
                        <?php echo MinistriesController::getContactForm(); ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>