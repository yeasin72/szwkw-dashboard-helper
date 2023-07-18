<?php 
// Register the 'laboratory' custom post type
function register_laboratory_post_type() {
    $labels = array(
        'name' => 'Laboratories',
        'singular_name' => 'Laboratory',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Laboratory',
        'edit_item' => 'Edit Laboratory',
        'new_item' => 'New Laboratory',
        'view_item' => 'View Laboratory',
        'search_items' => 'Search Laboratories',
        'not_found' => 'No laboratories found',
        'not_found_in_trash' => 'No laboratories found in trash',
        'parent_item_colon' => '',
        'menu_name' => 'Laboratories'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'laboratories'),
        'supports' => array('title', 'editor', 'thumbnail')
    );

    register_post_type('laboratory', $args);
}
add_action('init', 'register_laboratory_post_type');