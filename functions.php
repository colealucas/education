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
