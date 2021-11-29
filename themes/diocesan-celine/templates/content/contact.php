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

    <iframe src="<?= get_field('iframe', 'options'); ?>" allowfullscreen frameborder="0"></iframe>
</div>