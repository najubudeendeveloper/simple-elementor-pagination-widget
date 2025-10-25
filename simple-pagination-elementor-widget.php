<?php
/**
 * Plugin Name: Simple Pagination Elementor Widget
 * Description: A pagenation inside render method.
 * Version:     1.0.0
 * Author:      Najubudeen
 * Text Domain: simple-pagination-elementor-widget
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// function simple_pagination_enqueue_scripts() {
 
//     wp_enqueue_script('jquery');
    
//     wp_enqueue_script(
//         'elementor-code-pattern-script',
//         plugin_dir_url(__FILE__) . 'assets/js/my-jquery.js',
//         array('jquery'),
//         '1.0.0',
//         true
//     );
//     wp_enqueue_style(
//         'elementor-code-pattern-style',
//         plugin_dir_url(__FILE__) . 'assets/css/my-style.css',
//         array(),
//         '1.0.0'
//     );
    
// }
// add_action('wp_enqueue_scripts', 'simple_pagination_enqueue_scripts', 20);

function simple_elementor_addon() {
    require_once( __DIR__ . '/includes/plugin.php' );
    \Simple_Elementor_pagination_Addon\Plugin::instance();
}
add_action( 'plugins_loaded', 'simple_elementor_addon' );