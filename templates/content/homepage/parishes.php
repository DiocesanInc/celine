<?php

/**
 * Partial for the Homepage template's parish.
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/template-hierarchy/
 */

 use Celine\Theme\Controllers\TemplateController;
 ?>
 <div class="parish-cluster" <?php echo TemplateController::isAnimated();?>>
    <?php if(get_field('parish_scroll_title')):?> 
    <h1 class="parish-scroll-title" <?php echo TemplateController::animate("fade");?>>
        <?php echo get_field('parish_scroll_title');?>
    </h1>
    <?php endif;?>
    <?php if (have_rows('parish_buttons')&&(get_field('cluster_style') == 'buttons')) : ?>
    <div class="featured-buttons parishBtns" data-btns="<?php echo count(get_field('parish_buttons')); ?>">
        <div class="featured-buttons-wrapper parishButtons" <?php echo TemplateController::animate("zoom-in");?>>
            <?php while (have_rows('parish_buttons')) : the_row();
                get_template_part("template-parts/components/parish", "button");
            endwhile; ?>
        </div>
    </div>
    <?php elseif(have_rows('parish_carousel')&&(get_field('cluster_style') == 'carousel')) : 
    get_template_part("template-parts/components/parish", "carousel");?>
    <?php elseif(have_rows('parish_scroll')&&(get_field('cluster_style') == 'scroll')) : 
    get_template_part("template-parts/components/parish", "scroll");?>
    <?php elseif(have_rows('parish_maps')&&(get_field('cluster_style') == 'map')) : 
    get_template_part("template-parts/components/parish", "map");?>
    <?php endif;?>
 </div>
 
