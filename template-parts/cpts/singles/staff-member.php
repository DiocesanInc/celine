<?php

/**
 * The template for displaying a single Staff Member.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<div class="staff-single teaser-box flex-column" <?php echo TemplateController::animate("fade-up"); ?>>
    <img src="<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'large') : get_template_directory_uri() . '/assets/img/person.jpg'; ?>"
        class="staff-image teaser-img" alt="staff-image" />
    <div class="teaser-content-wrapper flex-column">

        <?php if (get_the_title()) : ?>
        <h3 class="staff-name teaser-title">
            <?php the_title(); ?>
        </h3>
        <?php endif; ?>

        <?php if (get_field('position')) : ?>
        <p class="staff-position teaser-title">
            <?php the_field('position'); ?>
        </p>
        <?php endif; ?>
        <div class="teaser-content">
            <?php if (get_field("email")) : ?>
            <div class="contact-person-email">
                <a href="mailto: <?php the_field("email"); ?>" class="has-underline-hover">
                    <i class="fa fa-envelope"></i>
                    <?php the_field("email"); ?>
                </a>
            </div>
            <?php endif; ?>

            <?php if (get_field("phone")) : ?>
            <div class="contact-person-phone">
                <a href="<?php echo phone_link(get_field("phone")); ?>" class="has-underline-hover">
                    <i class="fa fa-phone"></i>
                    <?php the_field("phone"); ?>
                </a>
            </div>
            <?php endif; ?>
        </div>
        <?php if (get_the_content()) : ?>
        <div class="links-container">
            <button data-excerpt="<?php echo htmlspecialchars(get_the_content()); ?>"
                data-title="<?php echo htmlspecialchars(get_the_title()) ?>"
                data-image="<?php the_post_thumbnail_url(); ?>"
                class="the-button has-primary-color has-primary-border-color has-transparent-background-color"
                title="Read About <?php echo get_the_title() ? htmlspecialchars(get_the_title()) : 'Me'; ?>">
                Meet <?php the_title(); ?>
            </button>
        </div>
        <?php endif; ?>


    </div>
</div>