<?php

/**
 * Template part for displaying the buttons component on the homepage.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Celine
 */
use Celine\Theme\Controllers\TemplateController;
?>

<div class="buttons-container carousel" data-btns="<?php echo count(get_field('parish_carousel')); ?>" <?php echo TemplateController::animate("fade");?>>
    <?php while (have_rows('parish_carousel')) : the_row(); ?>
    <div class="button carousel-item">
        <?php if (get_sub_field('is_image') && get_sub_field('image')) : ?>
        <img src="<?= get_sub_field('image')['url'] ?? ''; ?>" class="button-image" alt="<?= get_sub_field('parish_name'); ?>" />
        <?php else : ?>
        <?= get_sub_field('fa_icon'); ?>
        <?php endif; ?>
        <div class="button-content">
            <?php //if (get_sub_field('parish_name')) : ?>
            <h4 class="button-title"><?= get_sub_field('parish_name'); ?></h4>
            <?php //endif; ?>

            <?php if (get_sub_field('content')) : ?>
            <div class="button-text"><?= get_sub_field('content'); ?></div>
            <?php endif; ?>

            <?php if (get_sub_field('button')) : ?>
            <a href="<?= get_sub_field('button')['url'] ?? ''; ?>" target="<?= get_sub_field('button')['target'] ?? ''; ?>" class="the-button has-transparent-background-color has-primary-border-color has-primary-color">
                <?= get_sub_field('button')['title'] ?? ''; ?>
            </a>
            <?php endif;?>
        </div>
    </div>
    <?php endwhile; ?>
</div>
<?php get_template_part('template-parts/components/carousel', 'arrows', ['controls' => 'buttons-container']); ?>