<?php

namespace Celine\Theme\Controllers;

/**
 * Undocumented class
 */
class MinistriesController
{
    const TAX = "ministry-group";
    const POSTTYPE = "ministry";

    public static function getMinistryArchive()
    {
        if (self::ministryIsSlider()) {
            get_template_part("template-parts/cpts/archives/ministry", "slider");
        } else {
            get_template_part("template-parts/cpts/archives/ministry", "funnel");
        }
    }

    public static function getMinistryGroups()
    {
        $orderby = get_field("ministries_orderby", "options") ? "menu_order" : "title";

        if (!$orderby) {
            $orderby = "title";
        }

        $terms = get_terms(
            array(
                'taxonomy'   => self::_getTax(),
                'hide_empty' => false,
                "orderby" => $orderby,
                "order" => "ASC"
            )
        );

        $ministryGroups = [];

        foreach ($terms as $ministryGroup) {
            $order = get_field("ministry_group_order", "ministry-group_$ministryGroup->term_id") ? get_field("ministry_group_order", "ministry-group_$ministryGroup->term_id") : "";

            if ($order !== "") {
                $ministryGroups[$order] = $ministryGroup;
            } else {
                array_push($ministryGroups, $ministryGroup);
            }
        }

        ksort($ministryGroups, SORT_NUMERIC);



        return $ministryGroups;
    }

    public static function getMinistriesByGroup($term_id)
    {

        $orderby = get_field("ministries_orderby", "options") ? "menu_order" : "title";

        if (!$orderby) {
            $orderby = "title";
        }

        $args = array(
            "post_type" => self::_getPosttype(),
            "tax_query" => array(
                array(
                    "taxonomy" => self::_getTax(),
                    "field" => "term_id",
                    "terms" => $term_id
                )
            ),
            "orderby" => $orderby,
            "order" => "ASC",
            "posts_per_page" => -1
        );

        $q = new \WP_Query($args);
        return $q->posts;
    }

    public static function ministryIsSlider()
    {
        return get_field("ministry_is_slider", self::getMinistryObject());
    }

    public static function getMinistryObject()
    {
        return get_field("ministry_group_back_button", "options") ? get_field("ministry_group_back_button", "options") : false;
    }

    public static function getMinistryBackLink()
    {
        return get_field("ministry_group_back_button", "options") ? get_permalink(self::getMinistryObject()) : "/ministries";
    }

    public static function getMinistryContactFormId()
    {
        return get_field("ministry_contact_form_id", "options") ? get_field("ministry_contact_form_id", "options")["id"] : false;
    }

    public static function getContactForm()
    {
        $id = self::getMinistryContactFormId();
        return do_shortcode("[gravityform id='$id' title='false' description='false' ajax='true']");
    }

    public static function getStaffMembersByMinistry($id = false)
    {
        return get_field("contacts", $id);
    }

    public static function getStaffMemberNamesByMinistry($id = false)
    {
        $contacts = self::getStaffMembersByMinistry($id);

        $cArr = [];

        if (!$contacts) {
            return null;
        }
        foreach ($contacts as $contact) {
            $name = $contact["is_staff"] ? $contact["contact"]->post_title : $contact["contact_name"];
            $cArr[] = $name;
        }

        $ret = "<h4>Contact</h4>";
        $ret .= implode(", ", $cArr);

        return $ret;
    }

    private static function _getTax()
    {
        return self::TAX;
    }

    private static function _getPosttype()
    {
        return self::POSTTYPE;
    }
}
