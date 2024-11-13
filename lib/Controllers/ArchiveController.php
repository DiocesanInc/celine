<?php

/**
 * Archive Controller class file for celine theme
 * php version 7.2.34
 *
 * @category Controller_Class
 * @package  Celine
 * @author   Marcus Borger <mborger@diocesan.org>
 * @license  MIT celine.diocesanweb.org
 * @link     celine.diocesanweb.org
 */

namespace Celine\Theme\Controllers;

/**
 * Class that provides functions used in archive templates
 *
 * @category Controller
 * @package  Celine
 * @author   Marcus Borger <mborger@diocesan.org>
 * @license  MIT celine.diocesanweb.org
 * @link     celine.diocesanweb.org
 */
class ArchiveController
{
    /**
     * Retrieve css classes for container based on post type
     *
     * @return void
     */
    public static function getArchiveContainerClasses()
    {
        $classes[] = self::_getArchiveContainerClassName();
        $classes[] = "entry-content";
        $classes[] = "limit-width";
        return implode(" ", $classes);
    }

    public static function staffArchiveHasGroups()
    {
        $terms = get_terms(
            array(
                "taxonomy" => "staff-group",
                "hide_empty" => false
            )
        );

        return count($terms) === 0 ? false : true;
    }

    public static function getStaffMembersByStaffGroup()
    {
        $staffGroups = get_terms(array("taxonomy" => "staff-group", "hide_empty" => false));

        $staff = [];

        foreach ($staffGroups as $staffGroup) {
            $order = get_field("staff_group_order", "staff-group_" . $staffGroup->term_id);


            $args = array(
                'post_type' => 'staff',
                'posts_per_page' => -1,
                "orderby" => "menu_order title",
                "order" => "ASC",
                "tax_query" => array(
                    array(
                        "taxonomy" => "staff-group",
                        "field" => "slug",
                        "terms" => $staffGroup->slug
                    )
                )
            );

            $staff[$order] = ["title" => $staffGroup->name, "staffMembers" => get_posts($args)];
        }

        ksort($staff, SORT_NUMERIC);

        return $staff;
    }

    /**
     * Retrieve Staff members
     *
     * @return mixed
     */
    public static function getStaffMembers()
    {
        $args = array(
            'post_type' => 'staff',
            'posts_per_page' => -1,
            "orderby" => "menu_order title",
            "order" => "ASC"
        );
        return new \WP_Query($args);
    }

    /**
     * Retrieve css container class
     *
     * @return void
     */
    private static function _getArchiveContainerClassName()
    {
        return str_replace(' ', '-', strtolower(get_post_type() . '-container'));
    }
}