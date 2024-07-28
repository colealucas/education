<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package education
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="site-header" class="h-80px border-b-1px border-solid border-light-gray">
		<div class="container h-[80px]">
			<div class="row h-full items-center">
				<div class="col-3">
					<div class="logo">
						<a href="<?php echo home_url(); ?>">
							<img src="<?php echo get_template_directory_uri() . '/assets/images/the-logo.svg'; ?>" alt="Logo">
						</a>
					</div>
				</div>
				<div class="col-9">
					<nav class="flex justify-end">
						<div id="main-menu-wrap" class="main-menu-wrap h-full">
							<?php echo get_menu('primary-menu'); ?>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<header id="masthead" class="site-header hide">
		<div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$education_description = get_bloginfo( 'description', 'display' );
			if ( $education_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $education_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'education' ); ?></button>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
				)
			);
			?>
		</nav>
	</header>
