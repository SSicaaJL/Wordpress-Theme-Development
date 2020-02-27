<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nusscistudentlife
 */
?>

	</div><!-- #content -->

	<!-- LOGIN/REGISTER & PROFILE NAVIGATION -->
	<div class="container-fluid sci-bg-red-dark" style="border-bottom: 1px solid rgba(255, 255, 255, 0.25);">
		<div class="container-xl">
			<div class="row">
				<nav class="navbar navbar-expand">
					<ul class="navbar-nav">
						<?php if ( is_user_logged_in() ) { ?>
							<li class="nav-item">
								<a class="nav-link pl-0 py-0 sci-footer-a text-decoration-none" href="<?php echo get_author_posts_url(get_current_user_id()) ?>">
									Profile
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link py-0 sci-footer-a text-decoration-none" href="<?php echo wp_logout_url(get_home_url()) ?>">
									Logout
								</a>
							</li><?php
						} else { ?>
							<li class="nav-item">
								<a class="nav-link pl-0 py-0 sci-footer-a text-decoration-none" href="<?php echo get_permalink( get_page_by_title( 'login' ) ) ?>">
									Login/Register
								</a>
							</li>
							<?php
						} ?>
					</ul>
				</nav>
			</div>
		</div>
	</div>


	<!-- FOOTER CONTAINER -->
	<footer class="container-fluid pt-3 sci-bg-red-soft">

		<!-- FIRST(TOP) PART OF THE FOOTER -->
		<div class="row py-3 text-center text-light" style="border-bottom: 1px solid rgba(255, 255, 255, 0.25);">

			<!-- SETTING UP WIDGETS AREAS IN COLUMNS -->
			<?php //Left widget
				if ( is_active_sidebar( 'footer-widget-l' ) ) {?>
					<div class="col-md"><?php
					dynamic_sidebar( 'footer-widget-l' );?>
					</div><?php
				}
			?>
			<?php //Center widget
				if ( is_active_sidebar( 'footer-widget-c' ) ) {?>
					<div class="col-md"><?php
					dynamic_sidebar( 'footer-widget-c' );?>
					</div><?php
				}
			?>
			<?php //Right widget
				if ( is_active_sidebar( 'footer-widget-r' ) ) {?>
					<div class="col-md"><?php
					dynamic_sidebar( 'footer-widget-r' );?>
					</div><?php
				}
			?>
		</div>

		<!-- SECOND(BOTTOM) PART OF THE FOOTER -->
		<div class="row pt-3 text-center text-light" style="font-size: 0.8rem;">
			<?php //Bottom widget
				if ( is_active_sidebar( 'footer-widget-b') ) {?>
					<div class="col justify-content-center"><?php
					dynamic_sidebar( 'footer-widget-b' );?>
					</div><?php
				}
			?>
		</div>
	</footer>
	<!-- /FOOTER CONTAINER -->

<?php wp_footer(); ?>

</body>
</html>
