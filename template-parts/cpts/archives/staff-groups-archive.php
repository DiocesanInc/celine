<?php

/**
 * The template for Staff Archives grouped by Staff Groups.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package celine
 */

use Celine\Theme\Controllers\ArchiveController;

$staffGroups = ArchiveController::getStaffMembersByStaffGroup();

if (count($staffGroups) !== 0) :

    foreach ($staffGroups as $staffGroup => $staffMembers) :

?>

        <h2 class="staff-group-heading">
            <?php echo $staffMembers["title"]; ?>
        </h2>

        <div class="grid-container staff-group">
            <?php foreach ($staffMembers["staffMembers"] as $post) :
                setup_postdata($post);

                get_template_part('template-parts/cpts/singles/staff-member');
            endforeach;
            wp_reset_postdata();
            ?>
        </div>

<?php
    endforeach;
endif;
