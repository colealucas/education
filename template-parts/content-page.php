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
		<h1 class="text-32px font-900"><?php the_title(); ?></h1>
	</header>

	<div class="page-entry-content page-content min-h-[35vh]">
		<?php the_content(); ?>
	</div>
</article>
