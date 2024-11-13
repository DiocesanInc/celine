<?php

/**
 * Partial for the hero section: Image(s).
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\TemplateController;

?>
<?php if (have_rows("slider_image")) : ?>
<div class="hero has-quaternary-background-color-after">
    <div class="hero-slider">
        <?php while (have_rows("slider_image")) : the_row();
            echo TemplateController::getHeroImageSlide();
        endwhile; ?>
    </div>
</div>
<?php endif;