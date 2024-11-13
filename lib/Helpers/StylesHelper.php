<?php

/**
 * Helper class to enqueue Css files
 *
 * PHP Version 7
 *
 * @category CSS_Helpers
 * @package  Celine_Theme
 * @author   Marcus Borger <mborger@diocesan.com>
 * @license  MIT celine.diocesanweb.org
 * @link     celine.diocesanweb.org
 */

namespace Celine\Theme\Helpers;

use Celine\Theme\Helpers\SetupHelper;


/**
 * Helper class to enqueue Css files
 *
 * @category Helper_Class
 * @package  Celine_Theme
 * @author   Marcus Borger <mborger@diocesan.com>
 * @license  MIT celine.diocesanweb.org
 * @link     celine.diocesanweb.org
 */
class StylesHelper extends EnqueueHelper
{
    const INCLUDE_MIN = false;

    /**
     * Initializes Css Helper class
     * Enqueues Frontend and Backend styles
     *
     * @return void
     */
    public static function init()
    {
        add_action(
            "acf/save_post",
            function () {
                if (class_exists("CssHelper")) {
                    include_once get_template_directory() . "/assets/scss/variables/custom_variables.php";
                }
            }
        );

        add_action("wp_enqueue_scripts", array(__CLASS__, "includeCss"));
        add_action("admin_enqueue_scripts", array(__CLASS__, "includeAdminStyles"));
        add_action('after_setup_theme', array(__CLASS__, "addEditorStylesThemeSupport"));
        add_action('admin_init', array(__CLASS__, "addEditorStyles"));
    }

    public static function get_custom_variables_filename()
    {
        $blog_id = get_current_blog_id();
        return "celine_$blog_id-custom_variables";
    }

    /**
     * Enqueue styles.
     *
     * @link   https://developer.wordpress.org/reference/functions/wp_enqueue_style/
     * @return void
     */
    public static function includeCss()
    {
        $filename = self::get_custom_variables_filename();
        self::_includeJqueryUi();
        if (class_exists("CssHelper")) {
            \CssHelper::enqueueCssFile($filename);
        } else {
            self::_includeCustomVariables();
        }
        self::_includeStyle();
        self::_includeSlickStyles();
        self::_includeFontAwesome();
        self::_includeAOS();
        if (SetupHelper::isACFInstalled() && get_field("custom_scrollbar", "options")) {
            self::_includeCustomScrollbar();
        }
        self::_includeMinistryContactFormStyles();
    }

    /**
     * Includes Style.css
     *
     * @return void
     */
    private static function _includeCustomVariables()
    {
        $filename = self::get_custom_variables_filename();
        $filepath = get_template_directory_uri() . "/$filename.css";

        self::_enqueueStyle(
            "custom-variables",
            $filepath,
            array(),
            "version",
            "screen"
        );
    }

    /**
     * Includes Style.css
     *
     * @return void
     */
    private static function _includeStyle()
    {
        $filepath = get_template_directory_uri() . "/style.css";

        self::_enqueueStyle(
            "celine-style",
            $filepath,
            null,
            "version",
            "screen"
        );
    }

    /**
     * Includes Slick Slider Css Files
     *
     * @return void
     */
    private static function _includeSlickStyles()
    {
        $slickFilepath = get_template_directory_uri() . "/assets/slick/slick.css";
        $slickThemeFilepath = get_template_directory_uri() . "/assets/slick/slick-theme.css";

        self::_enqueueStyle(
            "slick-css",
            $slickFilepath,
            array(),
            "version",
            "screen"
        );

        self::_enqueueStyle(
            "slick-theme-css",
            $slickThemeFilepath,
            array(),
            "version",
            "screen"
        );
    }

    /**
     * Includes Font Awsome Stylesheet
     *
     * @return void
     */
    private static function _includeFontAwesome()
    {
        wp_enqueue_style(
            "font-awesome",
            "https://use.fontawesome.com/releases/v5.15.4/css/all.css",
            array(),
            "5.15.4",
            "screen"
        );
    }

    /**
     * Includes Jquery UI CSS
     *
     * @return void
     */
    private static function _includeJqueryUi()
    {
        wp_enqueue_style(
            "jquery-ui-css",
            "https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css",
            array(),
            "1.12.1",
            "screen"
        );
    }

    /**
     * Includes AOS
     *
     * @return void
     */
    private static function _includeAOS()
    {

        wp_enqueue_style(
            "aos-css",
            get_template_directory_uri() . "/assets/css/aos.css",
            false,
            null,
            "all"
        );
    }

    /**
     * Includes Custom Scrollbar
     *
     * @return void
     */
    private static function _includeCustomScrollbar()
    {
        wp_enqueue_style(
            "customScrollbar",
            get_template_directory_uri() . "/assets/css/customScrollbar.css",
            array(),
            "1",
            "screen"
        );
    }

    private static function _includeMinistryContactFormStyles()
    {
        wp_enqueue_style(
            "ministryContactForm",
            get_template_directory_uri() . "/assets/css/ministry-contact-form.css",
            array(),
            "1",
            "screen"
        );
    }

    /**
     * Enqueue styles.
     *
     * @link https://developer.wordpress.org/reference/functions/wp_enqueue_style/
     *
     * @return void
     */
    public static function includeAdminStyles()
    {
        $filepath = get_template_directory_uri() . "/assets/css/admin-accordion.css";

        self::_enqueueStyle(
            "accordion-admin-styles",
            $filepath
        );
    }

    /**
     * Add editor.css (admin editor styling).
     *
     * @link https://developer.wordpress.org/reference/functions/add_editor_style/
     *
     * @return void
     */
    public static function addEditorStylesThemeSupport()
    {
        add_theme_support('editor-styles');
    }

    public static function addEditorStyles()
    {
        add_editor_style(get_template_directory_uri() . '/custom_variables.css');
        add_editor_style(get_template_directory_uri() . '/assets/css/editor.css');
    }

    /**
     * Determines if minified css files should be enqueued or not
     * Enqueues given file
     *
     * @param string $handle  Name of the stylesheet. Should be unique
     * @param string $src     Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory
     * @param array  $deps    An array of registered stylesheet handles this stylesheet depends on
     * @param string $version String specifying stylesheet version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added
     * @param string $media   The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'
     *
     * @return void
     */
    private static function _enqueueStyle($handle, $src = "", $deps = array(), $version = \false, $media = "all")
    {
        // if (!file_exists($src)) return;
        // $version = self::getVersion($src);
        self::INCLUDE_MIN ?
            self::_enqueueStyleMin($handle, $src, $deps, $version, $media) :
            wp_enqueue_style($handle, $src, $deps, $version, $media);
    }

    /**
     * Enqueues Minified Stylesheet
     *
     * @param string $handle  Name of the stylesheet. Should be unique
     * @param string $src     Full URL of the stylesheet, or path of the stylesheet relative to the WordPress root directory
     * @param array  $deps    An array of registered stylesheet handles this stylesheet depends on
     * @param string $version String specifying stylesheet version number, if it has one, which is added to the URL as a query string for cache busting purposes. If version is set to false, a version number is automatically added equal to current installed WordPress version. If set to null, no version is added
     * @param string $media   The media for which this stylesheet has been defined. Accepts media types like 'all', 'print' and 'screen', or media queries like '(orientation: portrait)' and '(max-width: 640px)'
     *
     * @return void
     */
    private static function _enqueueStyleMin($handle, $src = "", $deps = array(), $version = \false, $media = "all")
    {
        $src = self::getMinifiedFilename($src);
        $version = $version ? self::getVersion($src) : $version;
        wp_enqueue_style($handle, $src, $deps, $version, $media);
    }
}
