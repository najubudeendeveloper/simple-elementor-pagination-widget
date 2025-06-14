<?php
/**
 * Plugin Name: Elementor Code Pattern Scaffold
 * Description: A scaffold for creating Elementor code patterns.
 * Version:     1.0.0
 * Author:      Najubudeen
 * Text Domain: elementor-code-pattern-scaffold
 * Requires Plugins: elementor
 * Elementor tested up to: 3.25.0
 * Elementor Pro tested up to: 3.25.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
// Enqueue scripts and styles

//make script for adding cache javascript file
function elementor_code_pattern_enqueue_scripts() {
    // Make sure jQuery is loaded
    wp_enqueue_script('jquery');
    
    // Enqueue our custom script
    wp_enqueue_script(
        'elementor-code-pattern-script',
        plugin_dir_url(__FILE__) . 'assets/js/my-jquery.js',
        array('jquery'),
        '1.0.0',
        true
    );
    wp_enqueue_style(
        'elementor-code-pattern-style',
        plugin_dir_url(__FILE__) . 'assets/css/my-style.css',
        array(),
        '1.0.0'
    );
    
}
add_action('wp_enqueue_scripts', 'elementor_code_pattern_enqueue_scripts', 20);

function elementor_code_pattern_addon() {
    require_once( __DIR__ . '/includes/plugin.php' );
    \Elementor_Code_Pattern_Addon\Plugin::instance();
}
add_action( 'plugins_loaded', 'elementor_code_pattern_addon' );