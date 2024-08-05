<?php
/**
 * Define and setup Custom Post Types
 * 
 */

 // Register Custom Post Type for Books
function create_book_cpt() {
    $labels = array(
        'name' => _x('Cărți', 'Post Type General Name', 'education'),
        'singular_name' => _x('Manual', 'Post Type Singular Name', 'education'),
        'menu_name' => __('Cărți', 'education'),
        'name_admin_bar' => __('Manual', 'education'),
    );
    $args = array(
        'label' => __('Manuale', 'education'),
        'supports' => array('title', 'editor', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'carti'),
    );
    register_post_type('book', $args);
}
add_action('init', 'create_book_cpt', 0);

// Register Custom Post Type for Modules
function create_module_cpt() {
    $labels = array(
        'name' => _x('Module', 'Post Type General Name', 'education'),
        'singular_name' => _x('Modul', 'Post Type Singular Name', 'education'),
        'menu_name' => __('Module', 'education'),
        'name_admin_bar' => __('Modul', 'education'),
    );
    $args = array(
        'label' => __('Module', 'education'),
        'supports' => array('title', 'editor', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'module'),
    );
    register_post_type('module', $args);
}
add_action('init', 'create_module_cpt', 0);

// Register Custom Post Type for Themes
function create_theme_cpt() {
    $labels = array(
        'name' => _x('Teme', 'Post Type General Name', 'education'),
        'singular_name' => _x('Tema', 'Post Type Singular Name', 'education'),
        'menu_name' => __('Teme', 'education'),
        'name_admin_bar' => __('Tema', 'education'),
    );
    $args = array(
        'label' => __('Teme', 'education'),
        'supports' => array('title', 'editor', 'custom-fields'),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'teme'),
    );
    register_post_type('theme', $args);
}
add_action('init', 'create_theme_cpt', 0);
