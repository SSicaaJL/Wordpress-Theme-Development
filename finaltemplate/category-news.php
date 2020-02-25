<?php
/**
 * nusscistudentlife category-news page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<main class="container-fluid">
	<div class="row justify-content-center">

		<!-- MAIN PAGE CONTENTS -->
		<div class="col-md-10">
			<h3>Latest Headlines</h3>
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();?>

				<div class="d-flex my-3">
					<div class="sci-news-date-block justify-content-center text-center mr-2 p-2 text-white">
						<h5 class="p-0 m-0" style="font-weight: 600;"><?php echo get_the_date( 'd' ); ?></h5>
						<h6 class="p-0 m-0" style="font-weight: 600;"><?php echo get_the_date( 'm.Y' ); ?></h6>
					</div>
					<div class="sci-news-thumbnail mx-2">
						<?php if ( has_post_thumbnail() ) {?>
							<a href="<?php the_permalink() ?>"><img src="<?php echo get_the_post_thumbnail_url() ?>" style="width: 100%;"></a>
						<?php } else {?>
							<a href="<?php the_permalink() ?>"><img src="<?php echo get_template_directory_uri()?>/images/no_post_thumbnail.jpeg" style="width: 100%;"></a><?php } ?>
					</div>
					<div class="mx-2">
						<div>
							<a href="<?php the_permalink() ?>"><h4 class="card-title p-0 m-0"><?php the_title(); ?></h4></a>
							<h6 class="p-0 m-0" style="font-size:1rem; font-weight: 500;">By <?php the_author_posts_link();?></h6>
						</div>
						<p><?php the_excerpt() ?></p>
					</div>
				</div>
				<hr>
				<?php
				endwhile; 
			endif;?>
		</div>

		<!-- <div class="col-md-3">
			<h1>What's Trending?</h1>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
		</div> -->
	</div>

</main>

<?php
get_footer();
?>
