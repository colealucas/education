<?php
/**
 * Theme functions
 */

function allow_svg_upload( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_svg_upload' );

function get_menu( $menu_name ) {
	if ( $menu_name ) {
		return wp_nav_menu(array(
			'theme_location' => $menu_name,
			'container' => false,
			'menu_class' => 'gr-menu-list',
		));
	}

	return false;
}

function get_random_id() {
	return substr(md5(uniqid(rand(), true)), 0, 6);
}

function custom_excerpt_length( $length ) {
    return 24; // Change this number to the desired excerpt length
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function custom_excerpt_more( $more ) {
    return ''; // Return an empty string to remove the ellipsis
}
add_filter( 'excerpt_more', 'custom_excerpt_more' );

function trim_to_max_words($string, $maxWords = 24) {
    // Split the string into an array of words
    $words = explode(' ', $string);
    
    // If the number of words is less than or equal to the max, return the original string
    if (count($words) <= $maxWords) {
        return $string;
    }
    
    // Take the first $maxWords words
    $trimmedWords = array_slice($words, 0, $maxWords);
    
    // Join the words back into a string
    $trimmedString = implode(' ', $trimmedWords);
    
    return $trimmedString;
}
