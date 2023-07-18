<?php

// Register the 'applications' custom post type
function register_applications_post_type() {
    $labels = array(
        'name' => 'Applications',
        'singular_name' => 'Application',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Application',
        'edit_item' => 'Edit Application',
        'new_item' => 'New Application',
        'view_item' => 'View Application',
        'search_items' => 'Search Applications',
        'not_found' => 'No applications found',
        'not_found_in_trash' => 'No applications found in trash',
        'parent_item_colon' => '',
        'menu_name' => 'Applications'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'applications'),
        'supports' => array('title', 'editor', 'thumbnail'),
        'taxonomies' => array('product_category', 'application_characteristics')
    );

    register_post_type('applications', $args);
}
add_action('init', 'register_applications_post_type');

// Register the 'product_category' taxonomy
function register_product_category_taxonomy() {
    $labels = array(
        'name' => 'Product Categories',
        'singular_name' => 'Product Category',
        'search_items' => 'Search Product Categories',
        'all_items' => 'All Product Categories',
        'parent_item' => 'Parent Product Category',
        'parent_item_colon' => 'Parent Product Category:',
        'edit_item' => 'Edit Product Category',
        'update_item' => 'Update Product Category',
        'add_new_item' => 'Add New Product Category',
        'new_item_name' => 'New Product Category Name',
        'menu_name' => 'Product Categories'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'product-category')
    );

    register_taxonomy('product_category', 'applications', $args);
}
add_action('init', 'register_product_category_taxonomy');

// Register the 'application_characteristics' taxonomy
function register_application_characteristics_taxonomy() {
    $labels = array(
        'name' => 'Application Characteristics',
        'singular_name' => 'Application Characteristic',
        'search_items' => 'Search Application Characteristics',
        'all_items' => 'All Application Characteristics',
        'parent_item' => 'Parent Application Characteristic',
        'parent_item_colon' => 'Parent Application Characteristic:',
        'edit_item' => 'Edit Application Characteristic',
        'update_item' => 'Update Application Characteristic',
        'add_new_item' => 'Add New Application Characteristic',
        'new_item_name' => 'New Application Characteristic Name',
        'menu_name' => 'Application Characteristics'
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'application-characteristics')
    );

    register_taxonomy('application_characteristics', 'applications', $args);
}
add_action('init', 'register_application_characteristics_taxonomy');

// Populate the 'application_characteristics' taxonomy with initial values
function populate_application_characteristics_taxonomy() {
    $characteristics = array(
        'Extremely reliable, wide dynamic range',
        'Quick start, acceleration, and operation under unknown load conditions',
        'Low noise operation, trapezoidal motor drive or FOC sinusoidal drive',
        'Delta and star motor configurations (no star point required)'
    );

    foreach ($characteristics as $characteristic) {
        wp_insert_term($characteristic, 'application_characteristics');
    }
}
add_action('init', 'populate_application_characteristics_taxonomy');