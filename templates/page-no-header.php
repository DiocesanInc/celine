<?php

/**
 * Template Name: No Header Page
 *
 * The template for displaying pages without a header.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

get_header();
?>

<div class="content-area" id="primary">
    <main class="site-main" id="main">
        <div class="entry-content limit-width">
            <?php while (have_posts()) : the_post();
                the_content();
            endwhile; ?>
        </div>
    </main>
</div>

<?php
get_footer();
