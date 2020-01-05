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

<div class="container-fluid customcontent">
	<p>debug: category-news.php has loaded</p>
</div>

<main class="container-fluid">
	<div class="row">

		<!-- LEFT SIDEBAR -->
		<div class="col-md-3"> 
			<h5>Trending News<hr></h5>
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post();?>
					<a href="<?php the_permalink() ?>"><?php the_title(); ?></a><br>
				<?php
				endwhile; 
			endif;?>
		</div>

		<!-- MAIN PAGE CONTENTS -->
		<div class="col-md-9">
			<h5>List of Latest News<hr></h5>
			<?php if ( have_posts() ) :
				while ( have_posts() ) : the_post();?>

					<!-- BOOTSTRAP CARD COMPONENT - CONTAINS LATEST POSTS WITH NEWS TAG -->
					<div class="card my-2">
						<div class="card-body">
							<a href="<?php the_permalink() ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
							<p class="card-text"><?php the_excerpt() ?><i><?php echo get_the_date(); ?>, written by <?php the_author(); ?></i></p>
							<a href="<?php the_permalink() ?>" class="float-right px-3">Read more...</a>
						</div>
					</div>
				<?php
				endwhile; 
			endif;?>
		</div>
	</div>

</main>

<?php
get_footer();
?>