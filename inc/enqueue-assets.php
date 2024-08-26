<?php
/**
 * Enqueue the CSS files.
 *
 * @since 1.0.0
 *
 * @return void
 */
function education_styles() {
	wp_enqueue_style(
		'education-style',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' )
	);

	wp_enqueue_style(
		'fancybox-gallery-styles',
		get_template_directory_uri() . '/assets/css/fancybox.min.css'
	);
	
	wp_enqueue_style(
		'education-theme-css',
		get_stylesheet_directory_uri() . '/assets/css/styles.min.css',
		[],
		wp_get_theme()->get( 'Version' )
	);

	// tailwind css
	wp_enqueue_style(
		'education-tw-css',
		get_stylesheet_directory_uri() . '/assets/css/tw.css',
		[],
		wp_get_theme()->get( 'Version' )
	);

	// add swiper slider in head
	wp_enqueue_script('swiper-script',  get_template_directory_uri() . '/assets/js/swiper.bundle.min.js', array(), '', false);

	// add jquery
	wp_enqueue_script('jquery-script', get_template_directory_uri() . '/assets/js/jquery.min.js', array(), '', TRUE);

	// add fancybox
	wp_enqueue_script('fancybox-script', get_template_directory_uri() . '/assets/js/fancybox.min.js', array(), '', TRUE);
	
	wp_enqueue_script(
		'education-theme-js',
		get_stylesheet_directory_uri() . '/assets/js/scripts.min.js',
		['swiper-script', 'jquery-script'],
		wp_get_theme()->get( 'Version' ),
		true
	);

	if (is_page_template('page-templates/contact.php')) {
		wp_enqueue_style('leaflet-css', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css');
    	wp_enqueue_script('leaflet-js', 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js', array(), null, true);
	}

	wp_enqueue_script('sabina-script', get_template_directory_uri() . '/assets/js/sabina.min.js', array(), '', TRUE);

	// if ( get_page_template_slug( get_the_ID() ) == 'page-templates/calculators.php' ) {
	// 	wp_enqueue_script(
	// 		'education-calculators-js',
	// 		get_stylesheet_directory_uri() . '/assets/js/calculators.min.js',
	// 		['jquery-script', 'range-slider-js'],
	// 		wp_get_theme()->get( 'Version' ),
	// 		true
	// 	);
	// }

	wp_localize_script('education-theme-js', 'education_theme_localized', [
		'ajax_url' => admin_url('admin-ajax.php'),
		'post_id' => get_the_ID(),
		'nonce' => wp_create_nonce('security-nonce'),
		'site_url' => get_site_url(),
		'lang' => substr(get_locale(), 0, 2),
	]);
}
add_action( 'wp_enqueue_scripts', 'education_styles' );

function enqueue_admin_styles() {
    wp_enqueue_style('admin-styles-education', get_template_directory_uri() . '/assets/css/admin-styles.css', array(), wp_get_theme()->get( 'Version' ), 'all');
}
add_action('admin_enqueue_scripts', 'enqueue_admin_styles');

function education_add_fonts() {
	?>
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Onest:wght@100..900&display=swap" rel="stylesheet">
	<?php
}
add_action('wp_head', 'education_add_fonts');
