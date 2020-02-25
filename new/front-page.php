<?php
/**
 * nusscistudentlife front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */
?>

<!-- <div class="container-fluid customcontent">
	<p>debug: front-page.php has loaded</p>
</div> -->

<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<h1 class="text-center">NUS SCIENCE STUDENT LIFE</h1>
		</div>
	</div>
	<?php get_header();
	?>
	<!-- MAIN CONTAINER FOR TOP POST AND WIDGET -->
	<div class="card 12">
  	<div class="row">
  	<?php if ( have_posts() ) : 
			the_post(); ?>
    <div class="col-5"> <!-- Getting the left container for image -->
      <a href="<?php the_permalink() ?>">
						<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" style="height:400px;"> <!-- POST IMAGE -->
					</a>
	<!-- CONTAINER FOR POST INFORMATION -->
    </div>
    <div class="col-4"> <!-- Getting the middle container for text -->
      <div class="card-body">
        <h5 class="card-title"><?php echo get_the_title(); ?></h5></a> <!-- TITLE -->
		<p><?php echo get_the_excerpt() ?></p> <!-- SHORT EXCERPT OF POST -->
        <p class="card-text"><?php echo get_the_date(); ?></p> <!-- DATE -->
        <div class="card-body sci-card-body pb-1 pb-3 px-3 align-bottom"><a href="<?php the_permalink() ?>" class="float-right align-bottom" style="font-size:0.8rem;">Read more...</a></div> <!-- LINK TO POST -->
      </div>
      <?php 
		endif;?>
    </div>
    	<!-- SIDE BAR FOR IG WIDGET-->
	<div class="col-3 bg-light">  <!-- Getting the right container for widget -->
		<h5>IG Widget<hr></h5>
		<p class="text-muted">
		</p>
	</div>
  </div>
</div>

	<!-- All other posts -->
	<div class="row pt-3">
		<div class="col">
		<h5 class="sci-title">Posts</h5> <!-- Container title -->
		</div>
	</div>
</div>

	<div class="row"> <!-- MAIN CONTAINER FOR REMAINING POSTS -->
		<div class="col-md-12"> <!-- Getting the left container for latest posts -->
			<div class="row justify-content-left">
				<!-- MAIN PAGE CONTENTS -->
				<?php if ( have_posts() ) : 
					while ( have_posts() ) : the_post();?>
						<!-- BOOTSTRAP CARD COMPONENT - CONTAINS LATEST POSTS WITH STUDENTARTICLE TAG -->
						<div class="col-sm-4 my-2">
							<div class="card sci-card-borde	r shadow-sm" style="height:420px;">
								<a href="<?php the_permalink() ?>">
									<img src="<?php echo get_the_post_thumbnail_url() ?>" class="card-img-top" style="height:200px;"> <!-- POST IMAGE -->
								</a>
								<div class="card-body py-0 px-3 pt-1" style="font-size:0.65rem;">
										<span class="far fa-calendar-alt"></span> <?php echo get_the_date(); ?> &nbsp <!-- DATE -->
										<span class="float-right">posted by <?php the_author_posts_link();?></span> <!-- AUTHOR -->
										<span class="far fa-laugh"></span> <?php echo sci_get_view_count(); ?> <!-- VIEWS -->
								</div>
								<div class="card-body sci-card-body py-3 px-3">
									<a href="<?php the_permalink() ?>"><h5 class="card-title"><?php the_title(); ?></h5></a> <!-- TITLE -->
									<p><?php the_excerpt() ?></p> <!-- SHORT EXCERPT OF POST -->
								</div>
								<div class="card-body sci-card-body pb-1 pb-3 px-3 align-bottom"><a href="<?php the_permalink() ?>" class="float-right align-bottom" style="font-size:0.8rem;">Read more...</a></div>
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
	</div>
	<!-- /LATEST STUDENT ARTICLES -->
	</div>
</div>

<?php
get_footer();
?>