<?php
function create_data_downloads_post_type() {
    $labels = array(
        'name'               => 'Data Downloads',
        'singular_name'      => 'Data Download',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Data Download',
        'edit_item'          => 'Edit Data Download',
        'new_item'           => 'New Data Download',
        'all_items'          => 'All Data Downloads',
        'view_item'          => 'View Data Download',
        'search_items'       => 'Search Data Downloads',
        'not_found'          => 'No data downloads found',
        'not_found_in_trash' => 'No data downloads found in Trash',
        'parent_item_colon'  => '',
        'menu_name'          => 'Data Downloads'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => true,
        'has_archive'         => true,
        'publicly_queryable'  => true,
        'query_var'           => true,
        'rewrite'             => array( 'slug' => 'data-downloads' ),
        'capability_type'     => 'post',
        'hierarchical'        => false,
        'supports'            => array( 'title' ),
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-download',
    );

    register_post_type( 'data-download', $args );
}
add_action( 'init', 'create_data_downloads_post_type' );