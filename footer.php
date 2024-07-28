<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package education
 */

?>

<footer id="site-footer" class="site-footer bg-green rounded-12px m-8px py-26px px-50px text-white">
	<div class="container">
		<div class="text-center copyright text-14px">
			© <?php echo date('Y'); ?>, CJI. <?php _e('All Rights Reserved', 'education'); ?>.
		</div>
	</div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
