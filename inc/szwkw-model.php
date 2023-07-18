<?php
// Register the Model Info custom post type
function register_model_info_post_type() {
    $labels = array(
        'name' => 'Model Info',
        'singular_name' => 'Model Info',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New Model Info',
        'edit_item' => 'Edit Model Info',
        'new_item' => 'New Model Info',
        'view_item' => 'View Model Info',
        'search_items' => 'Search Model Info',
        'not_found' => 'No model info found',
        'not_found_in_trash' => 'No model info found in trash',
        'parent_item_colon' => '',
        'menu_name' => 'Model Info'
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'model-info'),
        'supports' => array('title'),
        'taxonomies' => array(),
    );

    register_post_type('model_info', $args);
}
add_action('init', 'register_model_info_post_type');

// Add a meta box for selecting the related product
function add_model_info_meta_box() {
    add_meta_box(
        'model_info_product',
        'Related Product',
        'display_model_info_product_meta_box',
        'model_info',
        'side'
    );
}
add_action('add_meta_boxes', 'add_model_info_meta_box');

// Display the meta box for selecting the related product
function display_model_info_product_meta_box($post) {
    $product_id = get_post_meta($post->ID, 'model_info_product', true);

    $args = array(
        'post_type' => 'product',
        'posts_per_page' => -1,
    );
    $products = new WP_Query($args);

    wp_nonce_field('model_info_product_nonce', 'model_info_product_nonce');

    echo '<select name="model_info_product" style="width:100%;">';
    echo '<option value="">Select a product</option>';
    while ($products->have_posts()) {
        $products->the_post();
        $selected = ($product_id == get_the_ID()) ? 'selected' : '';
        echo '<option value="' . esc_attr(get_the_ID()) . '" ' . $selected . '>' . esc_html(get_the_title()) . '</option>';
    }
    echo '</select>';

    wp_reset_postdata();
}

// Save the selected product for the model info
function save_model_info_product_meta_box($post_id) {
    if (!isset($_POST['model_info_product_nonce']) || !wp_verify_nonce($_POST['model_info_product_nonce'], 'model_info_product_nonce')) {
        return;
    }

    if (isset($_POST['model_info_product'])) {
        $product_id = sanitize_text_field($_POST['model_info_product']);
        update_post_meta($post_id, 'model_info_product', $product_id);
    }
}
add_action('save_post_model_info', 'save_model_info_product_meta_box');