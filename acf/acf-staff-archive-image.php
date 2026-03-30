<?php

add_action('acf/include_fields', function () {
    if (! function_exists('acf_add_local_field_group')) {
        return;
    }

    acf_add_local_field_group(array(
        'key' => 'group_69ca8c1ee6352',
        'title' => 'Staff Archive Settings',
        'fields' => array(
            array(
                'key' => 'field_69ca8c20cada8',
                'label' => 'Archive Header Image',
                'name' => 'staff_archive_image',
                'aria-label' => '',
                'type' => 'image',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'return_format' => 'array',
                'library' => 'all',
                'min_width' => '',
                'min_height' => '',
                'min_size' => '',
                'max_width' => '',
                'max_height' => '',
                'max_size' => '',
                'mime_types' => '',
                'allow_in_bindings' => 0,
                'preview_size' => 'medium',
            ),
            array(
                'key' => 'field_69cacd37c6834',
                'label' => 'Hide Staff Member Photos',
                'name' => 'hide_staff_member_photos',
                'aria-label' => '',
                'type' => 'true_false',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'message' => '',
                'default_value' => 0,
                'allow_in_bindings' => 0,
                'ui_on_text' => 'Hide',
                'ui_off_text' => 'Show',
                'ui' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'staff-archive-settings',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
        'display_title' => '',
    ));
});

add_action('acf/init', function () {
    acf_add_options_page(array(
        'page_title' => 'Staff Archive Settings',
        'menu_slug' => 'staff-archive-settings',
        'parent_slug' => 'edit.php?post_type=staff',
        'menu_title' => 'Settings',
        'position' => '',
        'redirect' => false,
    ));
});
