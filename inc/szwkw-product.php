<?php

// Add Core Parameters custom field to product general settings
function add_core_parameters_field() {
    woocommerce_wp_textarea_input(
        array(
            'id' => 'core_parameters',
            'label' => 'Core Parameters & Product Advantages',
            'desc_tip' => true,
            'description' => 'Enter the core parameters for the product.',
        )
    );
}
add_action('woocommerce_product_options_general_product_data', 'add_core_parameters_field');

// Save Core Parameters custom field
function save_core_parameters_field($post_id) {
    if (isset($_POST['core_parameters'])) {
        $core_parameters = sanitize_textarea_field($_POST['core_parameters']);
        update_post_meta($post_id, 'core_parameters', $core_parameters);
    }
}
add_action('woocommerce_process_product_meta', 'save_core_parameters_field');

// Display Core Parameters custom field on the product page
// function display_core_parameters_field() {
//     global $product;
//     $core_parameters = get_post_meta($product->get_id(), 'core_parameters', true);

//     if ($core_parameters) {
//         echo '<h4>Core Parameters:</h4>';
//         echo '<ul>';
//         $parameters = explode("\n", $core_parameters);
//         foreach ($parameters as $parameter) {
//             echo '<li>' . esc_html(trim($parameter)) . '</li>';
//         }
//         echo '</ul>';
//     }
// }
// add_action('woocommerce_single_product_summary', 'display_core_parameters_field', 25);

// Change sort description to product full name
function change_short_description_label($translated_text, $text, $domain) {
    if ($domain === 'woocommerce') {
        if ($text === 'Product short description') {
            $translated_text = 'Product Full Name';
        }
    }
    return $translated_text;
}
add_filter('gettext', 'change_short_description_label', 10, 3);

function custom_admin_css() {
    echo '<style>
        /* Your custom CSS styles here */
        #woocommerce-product-images {
            display: none;
        }
    </style>';
}
add_action('admin_head', 'custom_admin_css');