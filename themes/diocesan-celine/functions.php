<?php

/**
 * Celine Template functions and definitions.
 *
 * @package Celine
 * @link    https://developer.wordpress.org/themes/basics/theme-functions/
 */

// use Celine\Theme\Classes\Mega_Menu_Themes_extended;

use Celine\Theme\Helpers\ScriptsHelper;
use Celine\Theme\Helpers\SetupHelper;
use Celine\Theme\Helpers\StylesHelper;

require_once get_template_directory() . "/inc/autoloader.php";

SetupHelper::init();
StylesHelper::init();
ScriptsHelper::init();

/**
 * Include inc functions.
 */
$incs = array(
    'customizer', // Customizer additions
    'excerpt', // Functions to handle excerpts
    'social-media', // Add ['dpi_social_media'] shortcode
    'theme-functions' // Functions to be called that enhance the theme by hooking into WordPress
);

foreach ($incs as $inc) {
    include_once get_template_directory() . "/inc/$inc.php";
}

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    include_once get_template_directory() . '/inc/jetpack.php';
}

if (!function_exists("customAcfRenderField")) {
    /**
     * Fallback for get_field() type=image.
     *
     * Loads Default image set in Theme Settings -> Header Settings
     * if get_field() has been called for an image without passing an image
     *
     * @param [type] $value
     * @return void
     */
    function customAcfRenderField($value = null)
    {
        return $value ? $value : get_field("default_featured_image", "options", false);
    }
    add_filter("acf/format_value/type=image", "customAcfRenderField");
}

if (!function_exists("getField")) {
    /**
     * Adds fallback value to get_field().
     *
     * Calls get_field() and either returns it if it has a value or returns the passed default value
     *
     * @param [type] $selector
     * @param boolean $post_id
     * @param boolean $format_value
     * @param [type] $default_value
     * @return void
     */
    function getField($selector, $post_id = false, $format_value = true, $default_value = null)
    {
        return get_field($selector, $post_id, $format_value) && get_field($selector, $post_id, $format_value) !== "" ? get_field($selector, $post_id, $format_value) : $default_value;
    }
}