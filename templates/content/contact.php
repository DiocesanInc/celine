<?php

/**
 * Template part for displaying the content in page-contact.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */
?>

<div class="entry-content limit-width">
    <?php while (have_posts()) : the_post(); ?>
    <div class="the-content"><?php the_content(); ?></div>
    <?php endwhile; ?>

    <?php if (get_field("address", "options")["title"] !== '') : ?>
    <div class="address-wrapper">
        Address: <?php echo get_field("address", "options")["title"]; ?>
    </div>
    <?php endif; ?>

    <?php if (get_field("phone", "options") !== '') : ?>
    <div class="phone-wrapper">
        Phone: <a href="tel:<?php the_field("phone", "options"); ?>" class=""
            title=""><?php the_field("phone", "options"); ?></a>
    </div>
    <?php endif; ?>

    <?php if (get_field("fax", "options") !== '') : ?>
    <div class="fax-wrapper">
        Fax: <?php the_field("fax", "options"); ?>
    </div>
    <?php endif; ?>

    <?php if (get_field("email", "options") !== '') : ?>
    <div class="email-wrapper">
        Email: <a href="mailto:<?php the_field("email", "options"); ?>"
            title="Email"><?php the_field("email", "options"); ?></a>
    </div>
    <?php endif; ?>

    <?php
    if ($contact_form_id = get_field("contact_us_form", "options")) : ?>
    <div class="contact-form-wrapper">
        <?php echo do_shortcode("[gravityform id=$contact_form_id ajax='true']"); ?>
    </div>
    <?php endif; ?>
    <?php if (get_field("google_maps_iframe", "options")) : ?>
    <?php the_field('google_maps_iframe', 'options'); ?>
    <?php endif; ?>
</div>