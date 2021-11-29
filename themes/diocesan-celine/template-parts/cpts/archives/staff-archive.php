<?php

/**
 * The template for Staff Archives.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\ArchiveController;

$staff = ArchiveController::getStaffMembers();

if ($staff->have_posts()) : ?>
<div class="grid-container">
    <?php while ($staff->have_posts()) : $staff->the_post();
        get_template_part('template-parts/cpts/singles/staff-member');
    endwhile;?>
</div>
<div class="lightbox-overlay"></div>
<div id="staff-lightbox" class="lightbox">
    <div class="lightbox-close"></div>
    <div class="lightbox-image"></div>
    <div class="lightbox-content">
        <h4 class="lightbox-title"></h4>
        <div class="lightbox-excerpt"></div>
    </div>
</div>
<?php endif;