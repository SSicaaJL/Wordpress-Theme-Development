<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nusscistudentlife
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 
		## NANI - No idea what is this, anyway not using it, so not going to include it ##
		<link rel="profile" href="https://gmpg.org/xfn/11"> 
	-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header class="border-bottom my-2">
	<center>
		<a class="sci-title m-0 p-0" href='<?php echo esc_url(home_url()) ?>'><?php echo get_bloginfo('name') ?></a>
	</center>

	<!-- NAVIGATION TOP BAR -->
	<nav class="navbar navbar-expand-md navbar-light sci-nav m-0 pt-0">

		<!-- BOOTSTRAP RESPONSIVE COLLAPSIBLE NAVIGATION MENU & BUTTON -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- BOOTSTRAP NAVIGATION MENU BY NAVWALKER -->
		<?php
			wp_nav_menu( array( // Mapping wordpress classes to bootstrap equivalents
			'theme_location'    => 'primary',
			'depth'             => 1, // 1 = no dropdowns, 2 = with dropdowns.
			'container'         => 'div',
			'container_class'   => 'collapse navbar-collapse justify-content-center text-uppercase', //.justify-content-center is a bootstrap class to push contents to the rightmost of the screen
			'container_id'      => 'navbarNav',
			'menu_class'        => 'navbar-nav',
			'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
			'walker'            => new WP_Bootstrap_Navwalker(), ) );
		?>
	</nav>

</header>

	<div id="content" class="site-content">
