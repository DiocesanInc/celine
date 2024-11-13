<?php

/**
 * Functions to be called that enhance the theme by hooking into WordPress.
 *
 * @package Celine
 */

use Celine\Theme\Controllers\TemplateController;

if (!function_exists('phone_link')) {
    /**
     * Convert phone numbers into links.
     *
     * @param string $input.
     * @return string $output.
     */
    function phone_link($input)
    {
        $tel = preg_replace('/[^0-9]+/', '', $input);
        $output = "tel:+1-" . substr($tel, 0, 3) . "-" . substr($tel, 3, 3) . "-" . substr($tel, 6, 4);
        if (strlen($tel) > 10) $output .= "," . substr($tel, 10);

        return $output;
    }
}

if (!function_exists('acf_link')) {
    /**
     * Create simple links from ACF Link Array.
     *
     * @param string $link    the href for the a tag
     * @param string $class   css classes for the a tag
     * @param string $content content between the opening and closing tag
     * @param bool   $button  make the a tag a button tag instead
     *
     * @return string
     */
    function acf_link($link, $class = null, $content = null, $button = null)
    {
        if ($link) {
            $tag = $button ? "button" : "a";
            $url = is_array($link) && $link['url'] ? $link['url'] : $link;
            $target = is_array($link) && $link["target"] ? $link['target'] : '';
            $title = is_array($link) ? ($link['title'] !== "" ? $link["title"] : "Read more") : $link;

            $className = $class ? " class=\"$class\"" : '';
            $content = $content ? $content : $title;

            return "<$tag href=\"$url\"$className target=\"$target\" title=\"$title\">$content</$tag>";
        }
    }
}

if (!function_exists('if_the_content')) {
    /**
     * Conditionally render .the-content if it exists.
     *
     * @param boolean $limit_width.
     * @return string.
     */
    function if_the_content($limit_width = false)
    {
        $output = '';

        if (have_posts()) :
            while (have_posts()) : the_post();
                if (get_the_content()) :
                    if ($limit_width) :
                        $output = "<div class=\"the-content limit-width\">" . get_the_content() . "</div>";
                    else :
                        $output = "<div class=\"the-content\">" . get_the_content() . "</div>";
                    endif;
                endif;
            endwhile;
        endif;
        wp_reset_postdata();

        return $output;
    }
}

if (!function_exists('ministry_taxonomy_image')) {
    /**
     * Return a Taxonomy Image for Ministries, with multiple fallbacks.
     *
     * @param integer $id.
     * @return string.
     */
    function ministry_taxonomy_image($q_obj = null)
    {
        $q_obj = $q_obj === null ? get_queried_object() : $q_obj;
        if (get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)) {
            return get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)['url'] ? get_field('ministry_group_image', $q_obj->taxonomy . '_' . $q_obj->term_id)['url'] : get_field('ministry_featured_image', 'options')['url'];
        } else {
            return get_field('ministry_featured_image', 'options') ? get_field('ministry_featured_image', 'options')['url'] : get_field('default_featured_image', 'options')['url'];
        }
    }
}
if (!function_exists('category_image')) {
    /**
     * Return a Taxonomy Image for Ministries, with multiple fallbacks.
     *
     * @param integer $id.
     * @return string.
     */
    function category_image($q_obj = null)
    {
        $q_obj = $q_obj === null ? get_queried_object() : $q_obj;
        if (get_field('category_image', $q_obj->taxonomy . '_' . $q_obj->term_id)) {
            return get_field('category_image', $q_obj->taxonomy . '_' . $q_obj->term_id) ? get_field('category_image', $q_obj->taxonomy . '_' . $q_obj->term_id) : get_field('default_featured_image', 'options')['url'];
        } else {
            return get_field('default_featured_image', 'options');
        }
    }
}

if (!function_exists("add_search_form")) {
    function add_search_form($items, $args)
    {
        if ($args->theme_location == 'menu-1') {
            $items .= '<li class="mega-menu-item">'
                . '<i class="header-search fa fa-search"></i>'
                . '</li>';
        }
        return $items;
    }
    add_filter('wp_nav_menu_items', 'add_search_form', 10, 2);
}

if (!function_exists("my_form_submit_button")) {
    function my_form_submit_button($button, $form)
    {
        return "<button type='submit' class='the-button has-primary-color has-primary-border-color has-transparent-background-color' id='gform_submit_button_{$form['id']}'>Submit</button>";
    }
    add_filter('gform_submit_button', 'my_form_submit_button', 10, 2);
}


function wpdocs_remove_archive_title_prefixes($title, $original_title)
{
    return $original_title;
}
add_filter('get_the_archive_title', 'wpdocs_remove_archive_title_prefixes', 10, 2);

require_once get_template_directory() . '/blocks/index.php';

add_action(
    "acf/save_post",
    function () {
        TemplateController::generateThemeJson();
    }
);