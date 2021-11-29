<?php // CPT index
if (!function_exists('celine_register_cpts')) {
    function celine_register_cpts()
    {
        $cpts = glob(__DIR__ . '/cpts/[!_]*.php');

        foreach ((array) $cpts as $cpt) {
            if ($cpt && preg_match("/\/cpts\/[a-z-]+\.php$/", $cpt)) {
                include_once $cpt;
            }
        }
    }
    add_action('init', 'celine_register_cpts');
}