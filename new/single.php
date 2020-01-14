<?php
/**
 * nusscistudentlife single page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<div class="container-fluid customcontent position-absolute text-muted">
	<p>debug: single.php has loaded</p>
</div>

<main class="container-fluid">
	<?php if ( have_posts() ) : the_post();?>
	<div class="row">
	<img src="<?php echo get_the_post_thumbnail_url() ?>" class="w-100" style="height: 70vh;">

		<div class="col-lg-9 col-md-8 bg-light shadow-sm py-3">

			<div class="pb-1" style="font-size: 0.8rem;"><i>
			By <b><?php the_author_posts_link();?></b>&nbsp&nbsp&nbsp
			Posted on <b><?php echo get_the_date(); ?></b></i>
			</div>
			<div>
					<h3 class=><?php the_title(); ?></h3><?php
					the_content();?><?php
			endif;?>
			</div>

			<div>
				<span class="float-left" style="font-size: 0.95rem;"><?php next_post_link( '%link', '<< %title', TRUE ); ?></span>
				<span class="float-right" style="font-size: 0.95rem;"><?php previous_post_link( '%link', '%title >>', TRUE ); ?></span>
			</div><br>

			<div>
			<?php 
				if ( comments_open() ) : // If there are comments, pull the comments function using comments_template()
				comments_template(); // A wordpress function to call
				endif;
			?>
			
			</div>

		</div>

		<div class="col-lg-3 col-md-4">
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
		</div>
	</div>

</main>


<?php
get_footer();
?>