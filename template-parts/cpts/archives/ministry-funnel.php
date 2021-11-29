<?php

/**
 * Template part for displaying the content in ministry-groups.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\MinistriesController;
use Celine\Theme\Controllers\TemplateController;

?>

<div class="ministry-funnel entry-content max-width">
    <?php $groups = MinistriesController::getMinistryGroups();
    foreach($groups as $group) : ?>
    <div class="ministry-group-wrapper">
        <a href="<?php echo get_term_link($group)?>" class="ministry-group-link child-has-underline-hover"
            style="background-image: url(<?php echo get_field("ministry_group_image", $group)["url"]; ?>); "
            <?php echo TemplateController::animate("fade"); ?>>
            <h4 class="has-white-background-color-after">
                <?php echo $group->name; ?>
            </h4>
        </a>
    </div>
    <?php endforeach; ?>
</div>