<?php
/**
 * nusscistudentlife page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<main class="container-xl">
	<div class="row">
		<div class="col-md justify-content-center pt-3">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
					<h3><?php the_title(); ?></h3>
					<p><?php the_content(); ?></p><?php
				endwhile; 
			endif;?>
		</div>
		
		<!-- SIDE BAR -->
		<?php
			$args = array(
				'post_type'      => 'page',
				'posts_per_page' => -1,
				'post_parent'    => $post->ID,
				'order'          => 'ASC',
				'orderby'        => 'menu_order'
			);

			$parent = new WP_Query( $args );

			if ( $parent->have_posts() ) :?>
			<div class="col-md-3 pt-3">
				<div><h3>Getting Around</h3>
					<?php
				while ( $parent->have_posts() ) : $parent->the_post(); ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><br>
				<?php 
				endwhile;?>
				</div>
			</div><?php
			endif; 
			wp_reset_postdata(); ?>
	</div>

</main>

<?php
get_footer();
?>
