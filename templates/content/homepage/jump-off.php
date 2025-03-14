<?php

/**
 * Partial for the Homepage template's News section.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php if (have_rows("jump_off_buttons")) : ?>
    <div class="news-container limit-width" <?php echo TemplateController::isAnimated(); ?>>
        <?php if (get_field("news_title")) : ?>
            <h2 class="news-title" <?php echo TemplateController::animate("fade"); ?>>
                <?php the_field('news_title'); ?>
            </h2>
        <?php endif; ?>

        <div class="news-slider same-height has-margin">
            <?php while (have_rows("jump_off_buttons")) : the_row(); ?>
                <div class="news-item-wrapper teaser-box" <?php echo TemplateController::animate("zoom-in"); ?>>
                    <img class="teaser-img" src="<?php echo get_sub_field("jump_off_button_image")["url"]; ?>" />

                    <div class="teaser-content-wrapper">
                        <?php if (get_sub_field("jump_off_button_title")) : ?>
                            <h4 class="teaser-title">
                                <?php the_sub_field("jump_off_button_title"); ?>
                            </h4>
                        <?php endif; ?>

                        <?php if (get_sub_field("jump_off_button_content")) : ?>
                            <div class="teaser-content">
                                <?php the_sub_field("jump_off_button_content"); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (get_sub_field("jump_off_button_link")) : ?>
                            <div class="links-container">
                                <?php echo acf_link(get_sub_field("jump_off_button_link")["url"], "the-button has-primary-color has-primary-border-color has-transparent-background-color", get_sub_field("jump_off_button_link")["title"]); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </div>
<?php endif; ?>