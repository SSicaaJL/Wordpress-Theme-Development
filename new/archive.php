<?php
/**
 * nusscistudentlife category page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<main class= "container-fluid">

	<div class="row pt-3 text-center"> <!-- TITLE FOR ARCHIVE -->
		<div class="col">
			<h5 class="sci-title">Posts History</h5>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) : the_post();?>
					<div style="border: double;"><h1><?php the_title(); ?></h1><?php the_content(); ?></div>
				<?php endwhile; else: ?>
				<p>No content available</p>			
			<?php
			endif;
			?>
		</div>
	</div>

	<div class="col-md-3 justify-content-left sci-sidebar-student px-0"> <!-- The right sidebar -->
		<?php //Right widget
			if ( is_active_sidebar( 'archive-widget-1' ) ) {?>
				<div class="col-md"><?php
				dynamic_sidebar( 'archive-widget-1' );?>
				</div><?php
			}
		?>
	</div>



</main>


<?php
get_footer();
?>