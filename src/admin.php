<?php

namespace App;

/**
 * Theme customizer
 */
add_action('customize_register', function (\WP_Customize_Manager $wp_customize) {
    // Add postMessage support
    $wp_customize->get_setting('blogname')->transport = 'postMessage';
});

/**
 * Customizer JS
 */
add_action('customize_preview_init', function () {
    wp_enqueue_script('sage/customizer.js', asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
});

/**
 * Initialize ACF Google Maps Key
 */
add_action('acf/init', function() {
  acf_update_setting('google_api_key', 'AIzaSyBxpguAuU9g82MRE8eci-fDALMpdg55SJQ');
});

/**
 * Add ACF Color palette
 */
add_action('acf/input/admin_enqueue_scripts', function() {
  wp_enqueue_script( 'acf-custom-colors', get_template_directory_uri() . '/assets/scripts/admin/ACF-color-picker--custom-palettes.js', 'acf-input', '1.0', true );
});


/**
 * Add CORS HTTP Header
 */
function add_cors_http_header(){
  header("Access-Control-Allow-Origin: *");
}
add_action('init', 'add_cors_http_header');
