<?php
/*
Plugin Name: Dashboard helper 
Description: Plugin for make SZWKW website better.
Version: 1.0.0
Author: Yeasin Arafath
Author URI: https://www.fiverr.com/yeasin71
License: GPL v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// News
include( plugin_dir_path( __FILE__ ) . '/inc/szwkw-dashboard-helper.php');
// Applications
include( plugin_dir_path( __FILE__ ) . '/inc/szwkw-application-post.php');
// Laboratories
include( plugin_dir_path( __FILE__ ) . '/inc/szwkw-laboratory.php');
// Download
include( plugin_dir_path( __FILE__ ) . '/inc/szwkw-download.php');
// Product
include( plugin_dir_path( __FILE__ ) . '/inc/szwkw-product.php');
// Product
include( plugin_dir_path( __FILE__ ) . '/inc/szwkw-model.php');
