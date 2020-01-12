<?php
/**
 * nusscistudentlife category-studentarticle page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<div class="container-fluid customcontent position-absolute text-muted">
	<p>debug: category-studentarticle.php has loaded</p>
</div>

<main class="container-xl pb-3 ">

	<div class="row pt-3 ">
		<div class="col border" style="height: 500px;">
			<p class="customcontent text-muted">Big picture goes here</p>
		</div>
	</div>

	<!-- TRENDING ARTICLES -->
	<?php // Functions for getting Trending Articles
		$trend_args = array ( // Setting the conditions on the data to be queried
			'category_name' => 'studentarticle', // get posts with category slug of studentarticle
			'post_status' => 'publish', // get posts with status of publish-ed
			'post_type' => 'post', // get posts that are posts
			'year' => date( 'Y' ), // get posts for this year
			'week' => date( 'W' ), // get posts for this week
			'meta_key' => 'sci_view_count', // set custom meta to be sci_view_count
			'orderby' => 'meta_value_num', // order the query by view count (meta key from custom plugin)
			'order' => 'DESC',
			'posts_per_page' => 3, // getting the top three posts only
		);
		$trend_query = new WP_Query( $trend_args ); // Performing the query for trending
	?>


	<div class="row pt-3"> <!-- TITLE CONTAINER FOR TRENDING ARTCILES -->
		<div class="col-md-3"></div>
		<div class="col">
			<h5 class="sci-title">Trending this week</h5>
		</div>
	</div>

	<div class="row"> <!-- MAIN POST CONTAINER FOR TRENDING ARTICLES -->
		<div class="col-md-3">
			<p>Interesting stuff go here<br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis porta purus, in vestibulum magna ullamcorper in. Sed ac bibendum urna, et vehicula dui. Aliquam luctus enim euismod nisl interdum, id suscipit quam sollicitudin. Proin vitae massa vitae magna scelerisque pulvinar. Curabitur posuere eu ex eget feugiat. Suspendisse bibendum pharetra metus ut commodo. Donec in diam nec magna semper pretium. Integer lectus nibh, sagittis mollis finibus eu, imperdiet quis quam.</p>
		</div>
		<div class="col-md-9">
			<div class="row justify-content-left">
				<?php if ( $trend_query -> have_posts() ) : 
					while ( $trend_query -> have_posts() ) : $trend_query -> the_post();?>
						<!-- BOOTSTRAP CARD COMPONENT - CONTAINS LATEST POSTS WITH STUDENTARTICLE TAG -->
						<div class="col-lg-6 my-2">
							<div class="card sci-card-border shadow-sm" style="height:420px;">
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" style="height:200px;"> <!-- POST IMAGE -->
								</a>
								<div class="card-body py-0 px-3 pt-1" style="font-size:0.65rem;">
										<span class="far fa-calendar-alt"></span> <?php echo get_the_date(); ?> &nbsp <!-- DATE -->
										<span class="float-right">posted by <?php the_author_posts_link();?></span> <!-- AUTHOR -->
										<span class="far fa-eye"></span> <?php echo sci_get_view_count(); ?> <!-- VIEWS -->
								</div>
								<div class="card-body sci-card-body py-3 px-3">
									<a href="<?php the_permalink() ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
									<p><?php the_excerpt() ?></p>
								</div>
								<div class="card-body sci-card-body pb-1 pb-3 px-3 align-bottom"><a href="<?php the_permalink() ?>" class="float-right alight-bottom" style="font-size:0.8rem;">Read more...</a></div>
							</div>
						</div>
					<?php
					endwhile; 
				endif;
				wp_reset_postdata();?>
			</div>
		</div>
	</div>
	<!-- /TRENDING ARTICLES -->

	<!-- LATEST STUDENT ARTICLES CONTAINER -->
	<div class="row pt-3">
		<div class="col">
		<h5 class="sci-title">Latest Student Articles</h5> <!-- Container title -->
		</div>
	</div>

	<div class="row"> <!-- MAIN CONTAINER FOR STUDENT ARTICLES -->
		<div class="col-md-9"> <!-- Getting the left container for latest posts -->
			<div class="row justify-content-left">
				<!-- MAIN PAGE CONTENTS -->
				<?php if ( have_posts() ) : 
					while ( have_posts() ) : the_post();?>
						<!-- BOOTSTRAP CARD COMPONENT - CONTAINS LATEST POSTS WITH STUDENTARTICLE TAG -->
						<div class="col-lg-6 col-md-12 my-2">
							<div class="card sci-card-border shadow-sm" style="height:420px;">
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" style="height:200px;"> <!-- POST IMAGE -->
								</a>
								<div class="card-body py-0 px-3 pt-1" style="font-size:0.65rem;">
										<span class="far fa-calendar-alt"></span> <?php echo get_the_date(); ?> &nbsp <!-- DATE -->
										<span class="float-right">posted by <?php the_author_posts_link();?></span> <!-- AUTHOR -->
										<span class="far fa-eye"></span> <?php echo sci_get_view_count(); ?> <!-- VIEWS -->
								</div>
								<div class="card-body sci-card-body py-3 px-3">
									<a href="<?php the_permalink() ?>"><h5 class="card-title"><?php the_title(); ?></h5></a> <!-- TITLE -->
									<p><?php the_excerpt() ?></p> <!-- SHORT EXCERPT OF POST -->
								</div>
								<div class="card-body sci-card-body pb-1 pb-3 px-3 align-bottom"><a href="<?php the_permalink() ?>" class="float-right alight-bottom" style="font-size:0.8rem;">Read more...</a></div>
							</div>
						</div>
					<?php
					endwhile; ?>
			</div>
			<!-- PAGINATION BUTTONS -->
			<div class="float-right" style="font-size: 0.95rem;"><?php next_posts_link( 'Older posts >>' ); ?></div>
			<div class="float-left" style="font-size: 0.95rem;"><?php previous_posts_link( '<< Newer posts' ); ?></div><br>
		</div><?php 
		endif;?>

		<div class="col-md-3 justify-content-left sci-sidebar-student px-0"> <!-- The right sidebar -->
			<?php //Right widget
				if ( is_active_sidebar( 'studentarticle-widget-1' ) ) {?>
					<div class="col-md"><?php
					dynamic_sidebar( 'studentarticle-widget-1' );?>
					</div><?php
				}
			?>
		</div>
	</div>
	<!-- /LATEST STUDENT ARTICLES -->

</main>

<?php
get_footer();
?>
