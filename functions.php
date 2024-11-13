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
use Celine\Theme\Controllers\MinistriesController;

require_once get_template_directory() . "/inc/autoloader.php";

SetupHelper::init();
StylesHelper::init();
ScriptsHelper::init();

/**
 * Include inc functions.
 */
$incs = array(
    'banner-image',
    'customizer', // Customizer additions
    'excerpt', // Functions to handle excerpts
    'social-media', // Add ['dpi_social_media'] shortcode
    'theme-functions', // Functions to be called that enhance the theme by hooking into WordPress
    'fix-post-order' // Workaround to save post orders
);

foreach ($incs as $inc) {
    include_once get_template_directory() . "/inc/$inc.php";
}

function load_theme_file($path)
{
    if (file_exists(STYLESHEETPATH . '/' . $path)) {
        include_once STYLESHEETPATH . '/' . $path;
    } else {
        include_once TEMPLATEPATH . '/' . $path;
    }
}

if (strpos(get_site_url(), "celine.diocesanweb") === false) {
    load_theme_file("acf/acf-fields.php");
    load_theme_file("acf/acf-category-image.php");
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
     * Makes an exception for Image Buttons
     *
     * @param [type] $value
     * @return void
     */
    function customAcfRenderField($value, $post_id, $field)
    {
        if ($field["name"] === "bkgd") return $value;
        return $value ? $value : get_field("default_featured_image", "options", false);
    }
    add_filter("acf/format_value/type=image", "customAcfRenderField", 10, 3);
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


if (class_exists("GF_Field_Checkbox")) {
    class GF_Field_Ministries extends GF_Field_Checkbox
    {
        public $type = "ministry_checkboxes";

        //
        public function get_form_editor_field_title()
        {
            return esc_attr__("Ministry Checkboxes");
        }

        public function get_form_editor_button()
        {
            return [
                "group" => "advanced_fields",
                "text" => $this->get_form_editor_field_title()
            ];
        }

        public function get_form_editor_field_settings()
        {
            return [
                "label_setting"
            ];
        }

        public function get_field_input($form, $value = "", $entry = null)
        {
            if ($this->is_form_editor()) {
                return $this->_get_backend_field_input();
            }

            return $this->_get_frontend_field_input();
        }

        private function _get_backend_field_input()
        {
            $ministryGroups = MinistriesController::getMinistryGroups();
            $output = "<ul class='ministry-group-list'>";

            foreach ($ministryGroups as $group) {
                $output .= "<li class='ministry-group'>";
                $output .= "<h3>$group->name</h3>";
                $output .= "<ul class='ministry-list'>";
                $ministries = MinistriesController::getMinistriesByGroup($group->term_id);
                foreach ($ministries as $ministry) {
                    $output .= "<li class='ministry'>";
                    $output .= "$ministry->post_title";
                    $output .= "</li>";
                }
                $output .= "</li></ul>";
            }
            $output .= "</ul>";
            return $output;
        }

        private function _get_frontend_field_input()
        {
            $id = (int) $this->id;

            $ministryGroups = MinistriesController::getMinistryGroups();

            $output = "<ul class='ministry-group-list'>";

            foreach ($ministryGroups as $group) {
                $output .= "<li data-ministry-list-id='$group->term_id' class='ministry-group'>";
                $output .= "<span class='the-button has-primary-color has-primary-border-color has-transparent-background-color ministry-group-title'>$group->name</span>";
                $output .= "<ul id='ministry-list-$group->term_id' class='ministry-list'>";
                $ministries = MinistriesController::getMinistriesByGroup($group->term_id);
                foreach ($ministries as $ministry) {
                    $output .= "<li class='ministry'>";
                    $output .= "<input name='input_" . $id . "[]' type='checkbox' value='$ministry->post_title' id='$ministry->ID'>";
                    $output .= "<label class='minitry-title' for='$ministry->ID'>$ministry->post_title</label>";
                    $output .= "</li>";
                }
                $output .= "</li></ul>";
            }
            $output .= "</ul>";


            return $output;
        }

        public function is_value_submission_array()
        {
            return true;
        }
    }
    GF_Fields::register(new GF_Field_Ministries());
}

require get_template_directory() . "/update-checker/plugin-update-checker.php";

use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
    'https://github.com/DiocesanInc/celine',
    __FILE__,
    'celine'
);

//Set the branch that contains the stable release.
$myUpdateChecker->setBranch('main');
