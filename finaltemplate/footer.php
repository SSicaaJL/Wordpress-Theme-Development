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

	<!-- FOOTER CONTAINER -->
	<footer class="container-fluid pt-3 sci-bg-red-soft">

		<!-- FIRST(TOP) PART OF THE FOOTER -->
		<div class="row pt-3 text-center text-light">

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
		</div><hr class="hr-white">

		<!-- SECOND(BOTTOM) PART OF THE FOOTER -->
		<div class="row pb-3 text-center text-light" style="font-size: 0.8rem;">
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
