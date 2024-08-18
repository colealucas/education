<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package education
 */

get_header();
?>

	<section class="error-404 not-found py-40px min-h-[60vh] flex flex-col justify-center">
		<header class="page-header">
			<h1 class="page-title text-36px font-700 text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'education' ); ?></h1>
		</header>

		<div class="page-content text-center mt-16px">
			<p><?php esc_html_e( 'It looks like nothing was found at this location.', 'education' ); ?></p>

			<p class="mt-30px">
				<a href="#" class="btn">Homepage</a>
			</p>
		</div>
	</section>

<?php
get_footer();
