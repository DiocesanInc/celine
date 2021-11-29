<?php

/**
 * Template Name: Homepage
 *
 * The template for displaying the Homepage Template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>

<div class="content-area" id="primary">
    <main class="site-main page-template-homepage" id="main">
        <?php get_template_part("templates/content/homepage/hero"); ?>
        <?php get_template_part("templates/content/homepage/featured", "buttons"); ?>
        <?php get_template_part("templates/content/homepage/banner"); ?>
        <?php get_template_part("templates/content/homepage/featured", "content"); ?>
        <?php get_template_part("templates/content/homepage/image-slider"); ?>
        <?php get_template_part("templates/content/homepage/news"); ?>
    </main>
</div>

<?php get_footer();