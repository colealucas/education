<?php
/**
 * Connect ACF PRO (delivered with the theme files), source files located in /inc/acf
 *
 */

// Define path and URL to the ACF plugin.
define( 'MY_ACF_PATH', get_stylesheet_directory() . '/inc/acf/' );
define( 'MY_ACF_URL', get_stylesheet_directory_uri() . '/inc/acf/' );

// Include the ACF plugin.
include_once( MY_ACF_PATH . 'acf.php' );

// Customize the url setting to fix incorrect asset URLs.
add_filter('acf/settings/url', 'my_acf_settings_url');
function my_acf_settings_url( $url ) {
    return MY_ACF_URL;
}

// automatically save json field groups, cool implementation
add_filter('acf/settings/save_json', 'my_acf_json_save_point');
function my_acf_json_save_point( $path ) {
    return get_stylesheet_directory() . '/acf-json';
}

// (Optional) Hide the ACF admin menu item.
//add_filter('acf/settings/show_admin', '__return_false');

// When including the PRO plugin, hide the ACF Updates menu
//add_filter('acf/settings/show_updates', '__return_false', 100); 

// activate the licence
define( 'ACF_PRO_LICENSE', 'b3JkZXJfaWQ9NDI4MDJ8dHlwZT1kZXZlbG9wZXJ8ZGF0ZT0yMDE0LTEwLTI0IDEwOjE4OjQ1' );

// Add theme settings menu page
if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
        'page_title'    => 'Theme Options',
        'menu_title'    => 'Theme Options',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => false
    ));

}
