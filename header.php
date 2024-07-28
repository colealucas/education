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
	<div id="site-header" class="site-header h-80px border-b-1px border-solid border-light-gray">
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
						<div id="main-menu-wrap" class="main-menu-wrap h-full hidden lg:block">
							<?php echo get_menu('primary-menu'); ?>
						</div>

						<div class="burger-wrap flex justify-end items-center h-full lg:hidden">
							<div class="menu-switcher size-50px flex items-center justify-center" data-menu-switcher data-toggle-active="#mobile-menu">
								<div class="switcher-wrapper">
									<span></span>
									<span></span>
									<span></span>
								</div>
							</div>
						</div>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="header-placeholder h-80px"></div>

	<div id="mobile-menu" class="mobile-menu">
		<div class="mobile-menu-wrap">
			<div class="mobile-menu-wrap">
				<?php echo get_menu('primary-menu'); ?>
			</div>
		</div>
	</div>
