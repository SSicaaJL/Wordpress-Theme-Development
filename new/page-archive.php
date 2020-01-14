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


<main class="container-fluid pb-3 ">

	<div class="row pt-3 text-center"> <!-- TITLE FOR ARCHIVE -->
		<div class="col">
			<h1>Posts History</h1>
		</div>
	</div>

	<!-- Pull out archive.php -->
	<?php // Functions for getting archive posts
		$trend_args = array ( // Setting the conditions on the data to be queried
			'post_status' => 'publish', // get posts with status of publish-ed
			'post_type' => 'post', // get posts that are posts
			'order' => 'DESC',
			'posts_per_page' => 9, // getting the top threenine posts only
		);
		$trend_query = new WP_Query( $trend_args ); // Performing the query for archive
	?>

	<div class= "row">
		<?php
		if( $trend_query->have_posts()):
			while ($trend_query->have_posts()):
				$trend_query->the_post();
		?>
			<div class = "col-4 border" style = "height:400px;" >
				<?php
					the_title();
					the_excerpt();
				?>
				<div class = "float-right align-bottom" > 
					<!-- code not working to align bottom -->
					<?php
						the_author();
						echo get_the_date();
					?>
				</div>
			</div>
			<?php endwhile; endif; ?>
	</div>

<?php
get_footer();
?>