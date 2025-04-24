<?php
/**
 * education functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package education
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

include_once('inc/enqueue-assets.php');
include_once('inc/connect-acf.php');
include_once('inc/cleaner.php');
include_once('inc/theme-setup.php');
include_once('inc/theme-functions.php');
include_once('inc/cpt.php');

add_action('init', 'populate_notions_repeater');

function populate_notions_repeater() {
    // Use the known page ID directly
    $post_id = 1715; // Replace 123 with the actual page ID

    // Avoid re-inserting if data already exists
    if (have_rows('notions', $post_id)) return;

    // Your vocabulary data
    $vocabulary_data = [
        [
            'assign_letter' => 'a',
            'notion' => 'Адрес электронной почты',
            'description' => 'адрес, используемый для передачи сообщений в интернете, состоящий из имени пользователя (логина) и имени сайта (домена), на котором создаётся электронный почтовый ящик.',
        ],
        
    ];

    // Prepare rows in ACF field key format
    $acf_rows = [];

    foreach ($vocabulary_data as $item) {
        $acf_rows[] = [
            'field_66c22a5770879' => $item['assign_letter'],  // assign_letter
            'field_66c22a02f7931' => $item['notion'],         // notion
            'field_66c22a20f7932' => $item['description'],    // description
        ];
    }

    // Insert into the 'notions' repeater
    update_field('field_66c229bdf7930', $acf_rows, $post_id);
}
