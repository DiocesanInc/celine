<?php

/**
 * Partial for social media links in the footer.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

?>

<?php if (have_rows("social_media_links", "options")) : ?>
    <h5>
        <?php echo getField("social_media_header", "options", true, "Social"); ?>
    </h5>
    <div class="social-media-link-container">
        <?php while (have_rows("social_media_links", "options")) : ?>
            <?php the_row(); ?>
            <?php if (get_sub_field("social_media_icon") && get_sub_field("social_media_link")) : ?>
                <div class="social-media-link-wrapper">
                    <a href="<?php echo get_sub_field("social_media_link")["url"]; ?>" target="<?php echo get_sub_field("social_media_link")["target"]; ?>">
                        <?php the_sub_field("social_media_icon"); ?>
                    </a>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif;
