<?php

/**
 * Partial for contact information in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

?>

<h5 class="footer-heading font-header">
    <?php echo getField("footer_contact_header", "options", true, "Contact Us"); ?>
</h5>
<div class="footer-contact-info-wrapper">
    <?php if (get_field('address', 'options')) : ?>
    <span class="footer-link-holder">
        <a class="footer-link has-underline-hover has-white-background-color-after"
            href="<?php echo get_field("address", "options")["url"]; ?>"><?php echo get_field("address", "options")["title"]; ?></a>
    </span>
    <?php endif; ?>

    <?php if (get_field('phone', 'options')) : ?>
    <span class="footer-link-holder">
        <a href="<?= phone_link(get_field('phone', 'options')); ?>"
            class="footer-link has-underline-hover has-white-background-color-after" title="Call Us">Phone:
            <?= get_field('phone', 'options'); ?></a>
    </span>
    <?php endif; ?>

    <?php if (get_field('fax', 'options')) : ?>
    <span class="footer-link-holder">
        <a href="<?= phone_link(get_field('fax', 'options')); ?>"
            class="footer-link has-underline-hover has-white-background-color-after" title="Fax">Fax:
            <?= get_field('fax', 'options'); ?></a>
    </span>
    <?php endif; ?>

    <?php if (get_field('email', 'options')) : ?>
    <span class="footer-link-holder">
        <a href="mailto: <?php the_field("email", "options"); ?>"
            class="footer-link has-underline-hover has-white-background-color-after" title="Email">
            <?php the_field('email', 'options'); ?></a>
    </span>
    <?php endif; ?>
</div>
<?php get_template_part('template-parts/components/translate');