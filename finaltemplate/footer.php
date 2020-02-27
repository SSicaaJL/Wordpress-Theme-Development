<?php
/**
 * nusscistudentlife login page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<main class="container-xl">
	<div class="row pt-3">
		<?php if ( is_user_logged_in() ) { ?>
			<div class="col">
				<p>Welcome back!</p>
			</div><?php
		} else { ?>
			<div class="col-md">
				<?php echo do_shortcode("[wpmem_form login]"); ?>
			</div>
			<div class="col-md">
				<?php echo do_shortcode("[wpmem_form register]"); ?>
			</div><?php
		} ?>
	</div>
</main>

<?php
get_footer();
?>
