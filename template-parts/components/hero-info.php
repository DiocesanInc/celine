<?php

/**
 * Partial for the hero section: Info
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>

<?php if (get_sub_field('title') || get_sub_field('links')) : ?>
<div class="hero-info has-white-color">
    <?php if (get_sub_field('title')) : ?>
    <h1 class="hero-title has-white-color"><?php the_sub_field('title') ?></h1>
    <?php endif; ?>

    <?php if (get_sub_field('links')) :?>
    <div class="hero-links">
        <?php foreach (get_sub_field("links") as $link) :
            $button_color = TemplateController::getHeroButtonColor($link);
            echo acf_link($link["link"], "the-button $button_color", null);
        endforeach;?>
    </div>
    <?php endif; ?>
</div>
<?php endif;