<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package education
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function education_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	if (isBook1()) {
		$classes[] = 'book-1';
	} elseif (isBook2()) {
		$classes[] = 'book-2';
	} elseif (isBook3()) {
		$classes[] = 'book-3';
	}

	return $classes;
}
add_filter( 'body_class', 'education_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function education_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'education_pingback_header' );
