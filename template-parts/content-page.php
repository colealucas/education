<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package education
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="page-entry-header">
		<h1 class="text-44px font-700 leading-130 max-w-[1000px] mx-auto text-center"><?php the_title(); ?></h1>
	</header>

	<div class="page-entry-content page-content min-h-[35vh] max-w-[1000px] mx-auto grren-headings">
		<?php the_content(); ?>
	</div>
</article>
