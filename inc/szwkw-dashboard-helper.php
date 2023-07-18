<?php

// Register the News custom post type
function create_news_post_type() {
    $labels = array(
        'name' => 'News',
        'singular_name' => 'News',
        'menu_name' => 'News',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New News',
        'edit_item' => 'Edit News',
        'new_item' => 'New News',
        'view_item' => 'View News',
        'search_items' => 'Search News',
        'not_found' => 'No news found',
        'not_found_in_trash' => 'No news found in Trash',
    );

    $args = array(
        'label' => 'News',
        'labels' => $labels,
        'description' => 'News custom post type',
        'public' => true,
        'menu_icon' => 'dashicons-format-aside',
        'supports' => array( 'title', 'editor', 'thumbnail' ),
        'has_archive' => true,
        'rewrite' => array( 'slug' => 'news' ),
    );

    register_post_type( 'news', $args );
}
add_action( 'init', 'create_news_post_type' );

// Create the Category Taxonomy for News
function create_news_category_taxonomy() {
    $labels = array(
        'name' => 'News Categories',
        'singular_name' => 'News Category',
        'search_items' => 'Search Categories',
        'all_items' => 'All Categories',
        'parent_item' => 'Parent Category',
        'parent_item_colon' => 'Parent Category:',
        'edit_item' => 'Edit Category',
        'update_item' => 'Update Category',
        'add_new_item' => 'Add New Category',
        'new_item_name' => 'New Category Name',
        'menu_name' => 'Categories',
    );

    $args = array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'news-category' ),
    );

    register_taxonomy( 'news_category', 'news', $args );
}
add_action( 'init', 'create_news_category_taxonomy' );

// Customize the time format for the News custom post type
function customize_news_time_format( $the_time, $d, $post ) {
    if ( $post->post_type === 'news' ) {
        $time_format = get_option( 'date_format' );
        $new_time_format = str_replace( 'F j, Y', 'Y.m.d', $time_format );
        return date_i18n( $new_time_format, strtotime( $post->post_date ) );
    }
    return $the_time;
}
add_filter( 'the_time', 'customize_news_time_format', 10, 3 );