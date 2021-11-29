<?php

/**
 *  CPT: Ministry
 */

register_post_type(
    'ministry',
    array(
        'label'   => __('Ministry'),
        'labels'  => array(
            'name'                  => _x('Ministries', 'Post type general name'),
            'singular_name'         => _x('Ministry', 'Post type singular name'),
            'menu_name'             => _x('Ministries', 'Admin Menu text'),
            'name_admin_bar'        => _x('Ministry', 'Add New on Toolbar'),
            'add_new'               => __('Add Ministry'),
            'add_new_item'          => __('Add New'),
            'new_item'              => __('New Ministry'),
            'edit_item'             => __('Edit Ministry'),
            'view_item'             => __('View Ministry'),
            'all_items'             => __('All Ministries'),
            'search_items'          => __('Search Ministries'),
            'parent_item_colon'     => __('Parent Ministries:'),
            'not_found'             => __('No Ministries found.'),
            'not_found_in_trash'    => __('No Ministries found in Trash.'),
            'featured_image'        => _x('Ministry Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3'),
            'set_featured_image'    => _x('Set Ministry Image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3'),
            'remove_featured_image' => _x('Remove Ministry Image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3'),
            'use_featured_image'    => _x('Use as Ministry Image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3'),
            'archives'              => _x('Ministries', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4'),
            'insert_into_item'      => _x('Insert into Ministry', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4'),
            'uploaded_to_this_item' => _x('Uploaded to this Ministry', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4'),
            'filter_items_list'     => _x('Filter Ministries List', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4'),
            'items_list_navigation' => _x('Ministries List Navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4'),
            'items_list'            => _x('Ministries List', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4'),
        ),
        'public'              => true,
        'publicly_queryable'  => true,
        'exclude_from_search' => false,
        'menu_icon'           => 'dashicons-universal-access-alt',
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_rest'        => true,
        'query_var'           => true,
        'capability_type'     => 'post',
        'hierarchical'        => true,
        'menu_position'       => null,
        'supports'            => array(
            'author',
            'editor',
            'page-attributes',
            'thumbnail',
            'title',
            'excerpt'
        ),
        // 'rewrite'  => array('slug' => 'ministries'),
        'has_archive'         => false,
    )
);

// Register Taxonomy: Ministry Group
register_taxonomy(
    'ministry-group',
    array('ministry'),
    array(
        'label'   => __('Ministry Group'),
        'labels'  => array(
            'name'              => _x('Ministry Group', 'taxonomy general name'),
            'singular_name'     => _x('Ministry Group', 'taxonomy singular name'),
            'search_items'      => __('Search Ministry Groups'),
            'all_items'         => __('All Ministry Groups'),
            'parent_item'       => __('Parent Ministry Group'),
            'parent_item_colon' => __('Parent Ministry Group:'),
            'edit_item'         => __('Edit Ministry Group'),
            'update_item'       => __('Update Ministry Group'),
            'add_new_item'      => __('Add New Ministry Group'),
            'new_item_name'     => __('New Ministry Group Name'),
            'menu_name'         => __('Ministry Groups'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
    )
);