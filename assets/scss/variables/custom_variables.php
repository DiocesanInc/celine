<?php

use Celine\Theme\Helpers\StylesHelper;

$filename = StylesHelper::get_custom_variables_filename();

$genericCss = new CssHelper(
    [],
    $filename,
    false
);

/**
 * COLORS
 */

$genericCss->addCssRule(
    ":root",
    array(
        "--clr-primary" => get_field("primary_color", "options")["color"],
        "--clr-secondary" => get_field("secondary_color", "options")["color"],
        "--clr-tertiary" => get_field("tertiary_color", "options")["color"],
        "--clr-quaternary" => get_field("quaternary_color", "options")["color"],
        "--scrollbar-color" => get_field("custom_scrollbar_color", "options"),
    )
);

if (get_field("primary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-primary-2" => get_field("primary_color", "options")["color_2"],
        )
    );
}

if (get_field("secondary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-secondary-2" => get_field("secondary_color", "options")["color_2"],
        )
    );
}

if (get_field("tertiary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-tertiary-2" => get_field("tertiary_color", "options")["color_2"],
        )
    );
}

if (get_field("quaternary_color", "options")["is_gradient"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--clr-quaternary-2" => get_field("quaternary_color", "options")["color_2"],
        )
    );
}

if (get_field("custom_scrollbar", "options")) {
    switch (get_field("custom_scrollbar_color", "options")) {
        case 'var(--clr-primary)':
            $scrollbarGradient = isGradient("primary", true) ? get_field("primary_color", "options")["color_2"] : get_field("primary_color", "options")["color"];
            break;
        case "var(--clr-secondary)":
            $scrollbarGradient = isGradient("secondary", true) ? get_field("secondary_color", "options")["color_2"] : get_field("secondary_color", "options")["color"];
            break;
        case "var(--clr-tertiary)":
            $scrollbarGradient = isGradient("tertiary", true) ? get_field("tertiary_color", "options")["color_2"] : get_field("tertiary_color", "options")["color"];
            break;
        case "var(--clr-quaternary)":
            $scrollbarGradient = isGradient("quaternary", true) ? get_field("quaternary_color", "options")["color_2"] : get_field("quaternary_color", "options")["color"];
            break;
    }
    $genericCss->addCssRule(
        ":root",
        array(
            "--scrollbar-color-2" => $scrollbarGradient,
        )
    );
}

/**
 * LANDING PAGE OVERLAY
 */

$genericCss->addCssRule(
    ":root",
    array(
        "--overlay-color" => get_field("landing_overlay_color"),
        "--overlay-opacity" =>  get_field("landing_overlay_opacity")
    )
);

/**
 * TYPOGRAPHY
 */

if (have_rows('font_imports', 'options')) {
    while (have_rows('font_imports', 'options')) : the_row();
        $genericCss->addImport(get_sub_field("font_import"));
    endwhile;
} else {
    $imports = [
        "https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap",
        "https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap",
        "https://fonts.googleapis.com/css2?family=Lato&display=swap",
        "https://fonts.googleapis.com/css2?family=Lato:wght@700&display=swap"
    ];
    foreach ($imports as $import) :
        $genericCss->addImport($import);
    endforeach;
}

$genericCss->addCssRule(
    ":root",
    array(
        "--font-main" => getField('font_main', 'options', true, "Lato, sans-serif"),
        "--font-heading" => getField('font_heading', 'options', true, "Playfair Display, serif"),
        "--font-script" => getField('font_script', 'options', true, "Playfair Display, serif"),
        "--fs-xl" => "clamp(" . getField("page_header", "options", true, "2.25rem")["font_size_min"] . "px, 3.5vw, " . getField("page_header", "options", true, "3rem")["font_size_max"] . "px)",
        "--fs-1000" => "clamp(" . getField("heading_1", "options", true, "1.75rem")["font_size_min"] . "px, 3.5vw, " . getField("heading_1", "options", true, "2.25rem")["font_size_max"] . "px)",
        "--fs-900" => "clamp(" . getField("heading_2", "options", true, "1.625rem")["font_size_min"] . "px, 3.5vw, " . getField("heading_2", "options", true, "1.875rem")["font_size_max"] . "px)",
        "--fs-800" => "clamp(" . getField("heading_3", "options", true, "1.5rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_3", "options", true, "1.625rem")["font_size_max"] . "px)",
        "--fs-700" => "clamp(" . getField("heading_4", "options", true, "1.375rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_4", "options", true, "1.375rem")["font_size_max"] . "px)",
        "--fs-600" => "clamp(" . getField("heading_5", "options", true, "1.25rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_5", "options", true, "1.25rem")["font_size_max"] . "px)",
        "--fs-500" => "clamp(" . getField("heading_6", "options", true, "1.125rem")["font_size_min"] . "px, 4.5vw, " . getField("heading_6", "options", true, "1.125em")["font_size_max"] . "px)",
        "--fs-400" => get_field("paragraph", "options")["font_size"] . "px",
        "--fs-300" => "0.9375rem",
        "--fs-200" => "0.875rem",
        "--fs-100" => "0.8125rem"
    )
);

$genericCss->addCssRule(
    ".page-header-title, .hero-title",
    array(
        "color" => get_field("page_header", "options")["font_color"],
        "font-weight" => get_field("page_header", "options")["font_weight"],
        "font-style" => get_field("page_header", "options")["font_style"],
        "font-family" => "var(--font-" . get_field("page_header", "options")["font_family"] . ")",
    )
);

for ($i = 1; $i <= 6; $i++) :
    $heading = get_field("heading_$i", "options");
    switch ($heading['font_family']) {
        case 'heading':
            $font = "var(--font-heading)";
            break;
        case 'script':
            $font = "var(--font-script)";
            break;
        default:
            $font = "var(--font-main)";
    }
    $genericCss->addCssRule(
        "h$i",
        array(
            "font-weight" => $heading["font_weight"],
            "font-style" => $heading["font_style"],
            "font-family" => $font,
            "color" => $heading["font_color"]
        )
    );
endfor;

$genericCss->addCssRule(
    ".staff-position",
    array(
        "font-weight" => get_field("heading_4", "options")["font_weight"],
        "font-style" => get_field("heading_4", "options")["font_style"],
        "font-family" => "var(--font-heading)",
        "color" => get_field("heading_4", "options")["font_color"]
    )
);

$genericCss->addCssRule(
    "a, .ui-widget-content a",
    array(
        "color" => getField("anchor_link", "options", true, "var(--clr-primary)")["font_color"],
        "text-decoration" => get_field("anchor_link", "options")["font_style"] ? "underline" : "none"
    )
);

$genericCss->addCssRule(
    "a:hover, a:focus, a:active",
    array(
        "color" => get_field("anchor_link", "options")["hover_styles"]["font_color"],
        "text-decoration" => get_field("anchor_link", "options")["hover_styles"]["font_style"] ? "underline" : "none"
    )
);

$genericCss->addCssRule(
    "body, p, div, span",
    array(
        "font-size" => get_field("paragraph", "options")["font_size"] . "px"
    )
);

/**
 * check if Gradient is set in Theme Colors
 *
 * @param [type] $color
 * @return boolean
 */
function isGradient($color, $gradient)
{
    return getField($color . "_color", "options")["is_gradient"] && $gradient;
}

function getColor($color)
{
    return getField($color . "_color", "options", true, "white");
}

function getBgColor($color, $gradient = false, $angle = "45deg")
{
    if ($color === "white" || $color === "black" || $color === "transparent") return $color;

    if (!isGradient($color, $gradient)) return "var(--clr-$color)";

    $gradient_a = "var(--clr-$color)";
    $gradient_b = "var(--clr-$color-2)";
    return "linear-gradient($angle, $gradient_a, $gradient_b)";
}

/**
 * Header
 */
$genericCss->addCssRule(
    ":root",
    array(
        "--logo-height" => get_field("header_logo_max_height", "options") . "px"
    )
);

$genericCss->addCssRule(
    ":root",
    array(
        /**
         * DEFAULT MENU
         */
        //TOP LEVEL
        //Default Font Color
        "--menu-top-level-default-font-color" =>
        get_field('menu_colors', 'options')['top_level_default']['default_font_color'],

        //Font Color on Hover
        "--menu-top-level-hover-font-color" =>
        get_field('menu_colors', 'options')['top_level_default']['font_color_hover'],

        //Default Background Color
        "--menu-top-level-default-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['top_level_default']['default_bg_color'],
            get_field('menu_colors', 'options')['top_level_default']['default_bg_color_is_gradient'],
            get_field("menu_colors", "options")["top_level_default"]["default_bg_color_gradient_angle"]
        ),

        //Background Color on Hover
        "--menu-top-level-hover-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['top_level_default']['bg_color_hover'],
            get_field('menu_colors', 'options')['top_level_default']['bg_color_hover_is_gradient'],
            get_field("menu_colors", "options")["top_level_default"]["bg_color_hover_gradient_angle"]
        ),

        //SUBMENUS
        //Default Font Color
        "--menu-submenu-default-font-color" =>
        get_field('menu_colors', 'options')['submenu_default']['default_font_color'],

        //Font Color on Hover
        "--menu-submenu-hover-font-color" =>
        get_field('menu_colors', 'options')['submenu_default']['font_color_hover'],

        //Default Background Color
        "--menu-submenu-default-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['submenu_default']['default_bg_color'],
            get_field('menu_colors', 'options')['submenu_default']['default_bg_color_is_gradient'],
            get_field("menu_colors", "options")["submenu_default"]["default_bg_color_gradient_angle"]
        ),

        //Background Color on Hover
        "--menu-submenu-hover-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['submenu_default']['bg_color_hover'],
            get_field('menu_colors', 'options')['submenu_default']['bg_color_hover_is_gradient'],
            get_field("menu_colors", "options")["submenu_default"]["bg_color_hover_gradient_angle"]
        ),

        /**
         * STICK MENU
         */
        //TOP LEVEL
        //Default Font Color
        "--sticky-menu-top-level-default-font-color" =>
        get_field('menu_colors', 'options')['top_level_sticky']['default_font_color'],

        //Font Color on Hover
        "--sticky-menu-top-level-hover-font-color" =>
        get_field('menu_colors', 'options')['top_level_sticky']['font_color_hover'],

        //Default Background Color
        "--sticky-menu-top-level-default-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['top_level_sticky']['default_bg_color'],
            get_field('menu_colors', 'options')['top_level_sticky']['default_bg_color_is_gradient'],
            get_field("menu_colors", "options")["top_level_sticky"]["default_bg_color_gradient_angle"]
        ),

        //Background Color on Hover
        "--sticky-menu-top-level-hover-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['top_level_sticky']['bg_color_hover'],
            get_field('menu_colors', 'options')['top_level_sticky']['bg_color_hover_is_gradient'],
            get_field('menu_colors', 'options')['top_level_sticky']['bg_color_hover_gradient_angle']
        ),

        //SUBMENUS
        //Default Font Color
        "--sticky-menu-submenu-default-font-color" =>
        get_field('menu_colors', 'options')['submenu_sticky']['default_font_color'],

        //Font Color on Hover
        "--sticky-menu-submenu-hover-font-color" =>
        get_field('menu_colors', 'options')['submenu_sticky']['font_color_hover'],

        //Default Background Color
        "--sticky-menu-submenu-default-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['submenu_sticky']['default_bg_color'],
            get_field('menu_colors', 'options')['submenu_sticky']['default_bg_color_is_gradient'],
            get_field("menu_colors", "options")["submenu_sticky"]["default_bg_color_gradient_angle"]
        ),

        //Background Color on Hover
        "--sticky-menu-submenu-hover-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['submenu_sticky']['bg_color_hover'],
            get_field('menu_colors', 'options')['submenu_sticky']['bg_color_hover_is_gradient'],
            get_field("menu_colors", "options")["submenu_sticky"]["bg_color_hover_gradient_angle"]
        ),

        /**
         * SIDEBAR
         */
        //TOP LEVEL
        //Default Font Color
        "--sidebar-top-level-default-font-color" =>
        get_field('menu_colors', 'options')['top_level_sidebar']['default_font_color'],

        //Font Color on Hover
        "--sidebar-top-level-hover-font-color" =>
        get_field('menu_colors', 'options')['top_level_sidebar']['font_color_hover'],

        //Default Background Color
        "--sidebar-top-level-default-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['top_level_sidebar']['default_bg_color'],
            get_field('menu_colors', 'options')['top_level_sidebar']['default_bg_color_is_gradient'],
            get_field("menu_colors", "options")["top_level_sidebar"]["default_bg_color_gradient_angle"]
        ),

        //Background Color on Hover
        "--sidebar-top-level-hover-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['top_level_sidebar']['bg_color_hover'],
            get_field('menu_colors', 'options')['top_level_sidebar']['bg_color_hover_is_gradient'],
            get_field("menu_colors", "options")["top_level_sidebar"]["bg_color_hover_gradient_angle"]
        ),

        //SUBMENUS
        //Default Font Colors
        "--sidebar-submenu-default-font-color" =>
        get_field('menu_colors', 'options')['submenu_sidebar']['default_font_color'],

        //Font Colors on Hover
        "--sidebar-submenu-hover-font-color" =>
        get_field('menu_colors', 'options')['submenu_sidebar']['font_color_hover'],

        //Default Background Color
        "--sidebar-submenu-default-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['submenu_sidebar']['default_bg_color'],
            get_field('menu_colors', 'options')['submenu_sidebar']['default_bg_color_is_gradient'],
            get_field("menu_colors", "options")["submenu_sidebar"]["default_bg_color_gradient_angle"]
        ),

        //Background Color on Hover
        "--sidebar-submenu-hover-bg-color" =>
        getBgColor(
            get_field('menu_colors', 'options')['submenu_sidebar']['bg_color_hover'],
            get_field('menu_colors', 'options')['submenu_sidebar']['bg_color_hover_is_gradient'],
            get_field("menu_colors", "options")["submenu_sidebar"]["bg_color_hover_gradient_angle"]
        ),
    )
);

/**
 * Staff Images Aspect Ratios
 */
$genericCss->addCssRule(
    ":root",
    array(
        "--staff_image_width_mobile" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_mobile"],
        "--staff_image_height_mobile" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_mobile"],
        "--staff_image_width_tablet" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_tablet"],
        "--staff_image_height_tablet" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_tablet"],
        "--staff_image_width_laptop" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_laptop"],
        "--staff_image_height_laptop" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_laptop"],
        "--staff_image_width_desktop" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_desktop"],
        "--staff_image_height_desktop" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_desktop"],
    )
);

/**
 * First Child Mobile
 */
if (get_field("aspect_ratio_for_staff_images", "options")["first_child_is_unique_mobile"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--staff_image_width_mobile_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_mobile_first_child"],
            "--staff_image_height_mobile_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_mobile_first_child"],
        )
    );
}

/**
 * First Child Tablet
 */
if (get_field("aspect_ratio_for_staff_images", "options")["first_child_is_unique_tablet"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--staff_image_width_tablet_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_tablet_first_child"],
            "--staff_image_height_tablet_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_tablet_first_child"],
        )
    );
}

/**
 * First Child Laptop
 */
if (get_field("aspect_ratio_for_staff_images", "options")["first_child_is_unique_laptop"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--staff_image_width_laptop_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_laptop_first_child"],
            "--staff_image_height_laptop_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_laptop_first_child"],
        )
    );
}

/**
 * First Child Desktop
 */
if (get_field("aspect_ratio_for_staff_images", "options")["first_child_is_unique_desktop"]) {
    $genericCss->addCssRule(
        ":root",
        array(
            "--staff_image_width_desktop_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_width_desktop_first_child"],
            "--staff_image_height_desktop_first_child" => get_field("aspect_ratio_for_staff_images", "options")["staff_image_height_desktop_first_child"],
        )
    );
}
//Generate File
$genericCss->generateCssFile();
