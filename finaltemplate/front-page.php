<?php
/**
 * nusscistudentlife front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */
get_header()
?>

<script>
function frontpage-excerpt( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'frontpage-excerpt' );
</script>

<main class="container-xl">
	<div class="row pt-3 pb-2 mb-3">
		<?php // Functions for getting category 'important'
			$important_args = array ( // Setting the conditions on the data to be queried
				'category_name' => 'important', // get posts with category slug of studentarticle
				'post_status' => 'publish', // get posts with status of publish-ed
				'post_type' => 'post', // get posts that are posts
				'orderby' => 'ID', // order the query by view count (meta key from custom plugin)
				'order' => 'DESC',
				'posts_per_page' => 12, // getting the top three posts only
			);
			$important_query = new WP_Query( $important_args ); // Performing the query for trending
		?>

		<div class="col-md-12">
			<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
				<div class="carousel-inner">

					<?php $important_query -> the_post(); ?>
						<div class="carousel-item active d-md-flex" data-interval="8000" style="max-height:400px; min-height:400px;">
							<div class="col-md-8 px-0 mb-2 mr-2">
								<?php if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" style="width: 100%;"></a>
								<?php } else {?>
									<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri()?>/images/no_post_thumbnail.jpeg" style="width: 100%;"></a><?php } ?>
							</div>
							<div class="col-md-4 px-0 ml-2">
								<div class="pl-3" style="border-left: 4px solid rgb(126, 13, 0);">
									<div>
										<a href="<?php the_permalink() ?>"><h4 class="card-title p-0 m-0"><?php the_title(); ?></h4></a>
										<h6 class="p-0 m-0" style="font-size:1rem; font-weight: 500;">By <?php the_author_posts_link();?>, <?php echo sci_get_view_count(); ?> views</h6>
									</div>
									<p><?php the_excerpt() ?></p>
									<a href="<?php the_permalink() ?>" class="float-right font-italic px-3">Read more...</a><br>
								</div>
							</div>
						</div>

					<?php if ( $important_query -> have_posts() ) : while ( $important_query -> have_posts() ) : $important_query -> the_post(); ?>
						<div class="carousel-item d-md-flex" data-interval="8000" style="max-height:400px; min-height:400px;">
							<div class="col-md-8 px-0 mb-2 mr-2">
								<?php if ( has_post_thumbnail() ) {?>
									<a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" style="width: 100%;"></a>
								<?php } else {?>
									<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri()?>/images/no_post_thumbnail.jpeg" style="width: 100%;"></a><?php } ?>
							</div>
							<div class="col-md-4 px-0 ml-2">
								<div class="pl-3" style="border-left: 4px solid rgb(126, 13, 0);">
									<div>
										<a href="<?php the_permalink() ?>"><h4 class="card-title p-0 m-0"><?php the_title(); ?></h4></a>
										<h6 class="p-0 m-0" style="font-size:1rem; font-weight: 500;">By <?php the_author_posts_link();?>, <?php echo sci_get_view_count(); ?> views</h6>
									</div>
									<p><?php the_excerpt() ?></p>
									<a href="<?php the_permalink() ?>" class="float-right font-italic px-3">Read more...</a><br>
								</div>
							</div>
						</div>
						<?php
						endwhile;
					endif;
					wp_reset_postdata();?>

				</div>
			</div>
		</div>
	</div><hr>

	<div class="row my-3">
		<?php if ( have_posts() ) : 
			$i = 1;
			while ( have_posts() && $i <= 3 ) : the_post();?>
				<div class="col-md-4">
					<div class="card rounded-0 border-0">
						<div class="overflow-hidden" style="border-bottom: 4px solid rgb(126, 13, 0); min-height: 200px; max-height: 200px;">
							<?php if ( has_post_thumbnail() ) {?>
								<a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" style="width: 100%;"></a>
							<?php } else {?>
								<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri()?>/images/no_post_thumbnail.jpeg" style="width: 100%;"></a><?php } ?>
						</div>
						<div class="card-body sci-card-body py-3 px-3">
							<a href="<?php the_permalink() ?>"><h5 class="card-title"><?php the_title(); ?></h5></a> <!-- TITLE -->
							<p><?php the_excerpt() ?></p> <!-- SHORT EXCERPT OF POST -->
						</div>
						<div class="card-body sci-card-body pb-1 pb-3 px-3 align-bottom"><a href="<?php the_permalink() ?>" class="float-right align-bottom" style="font-size:0.8rem;">Read more...</a></div>
					</div>
				</div>
			<?php $i++; endwhile;
		endif; ?>
	</div>
</main>

<?php
get_footer();
?>