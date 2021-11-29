<?php
/**
 * CPT Staff
 */

register_post_type(
    'staff',
    array(
        'label'   => __('Staff'),
        'labels'  => array(
            'name'                  => _x('Staff Members', 'Post type general name'),
            'singular_name'         => _x('Staff Member', 'Post type singular name'),
            'menu_name'             => _x('Staff', 'Admin Menu text'),
            'name_admin_bar'        => _x('Staff Member', 'Add New on Toolbar'),
            'add_new'               => __('Add Staff Member'),
            'add_new_item'          => __('Add New'),
            'new_item'              => __('New Staff Member'),
            'edit_item'             => __('Edit Staff Member'),
            'view_item'             => __('View Staff Member'),
            'all_items'             => __('All Staff'),
            'search_items'          => __('Search Staff Members'),
            'parent_item_colon'     => __('Parent Staff Members:'),
            'not_found'             => __('No Staff Members found.'),
            'not_found_in_trash'    => __('No Staff Members found in Trash.'),
            'featured_image'        => _x('Staff Member Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3'),
            'set_featured_image'    => _x('Set Staff Image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3'),
            'remove_featured_image' => _x('Remove Staff Image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3'),
            'use_featured_image'    => _x('Use as Staff Image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3'),
            'archives'              => _x('Staff Members', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4'),
            'insert_into_item'      => _x('Insert into Staff Member', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4'),
            'uploaded_to_this_item' => _x('Uploaded to this Staff Member', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4'),
            'filter_items_list'     => _x('Filter Staff Members List', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4'),
            'items_list_navigation' => _x('Staff Members List Navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4'),
            'items_list'            => _x('Staff Members List', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4'),
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'menu_icon'           => 'dashicons-groups',
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'has_archive'         => true,
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array(
            'author',
            'editor',
            'page-attributes',
            'thumbnail',
            'title',
        )
    )
);

// Register Taxonomy: Staff Group
register_taxonomy(
    'staff-group',
    array('staff'),
    array(
        'label'   => __('Staff Group'),
        'labels'  => array(
            'name'              => _x('Staff Group', 'taxonomy general name'),
            'singular_name'     => _x('Staff Group', 'taxonomy singular name'),
            'search_items'      => __('Search Staff Groups'),
            'all_items'         => __('All Staff Groups'),
            'parent_item'       => __('Parent Staff Group'),
            'parent_item_colon' => __('Parent Staff Group:'),
            'edit_item'         => __('Edit Staff Group'),
            'update_item'       => __('Update Staff Group'),
            'add_new_item'      => __('Add New Staff Group'),
            'new_item_name'     => __('New Staff Group Name'),
            'menu_name'         => __('Staff Groups'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
    )
);