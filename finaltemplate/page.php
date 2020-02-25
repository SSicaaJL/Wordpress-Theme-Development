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

<main class="container-fluid">
	<div class="row">
		<div class="col-md-9 py-3">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
					<?php 
					the_content();
				endwhile; 
			endif;?>
		</div>

		<div class="col-3"> <!-- SIDE BAR -->
			<div class="sci-bg-red-soft my-3 p-3" style="min-height: 600px;">
			<?php
				$args = array(
					'post_type'      => 'page',
					'posts_per_page' => -1,
					'post_parent'    => $post->ID,
					'order'          => 'ASC',
					'orderby'        => 'menu_order'
				);

				$parent = new WP_Query( $args );

				if ( $parent->have_posts() ) :
					while ( $parent->have_posts() ) : $parent->the_post(); ?>
            				<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a><br>
					<?php 
					endwhile;
				endif; 
				wp_reset_postdata(); ?>
			</div>
		</div>
	</div>

</main>

<?php
get_footer();
?>