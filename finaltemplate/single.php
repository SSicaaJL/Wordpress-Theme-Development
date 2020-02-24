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
	<div class = 'row'>
		<div class = 'col'>
			<img src="<?php echo get_the_post_thumbnail_url() ?>" class="w-100" style="height: 70vh;"><center>
			<div class="position-absolute " style="bottom:10px; right:95px; left: 90px;">
				<img src="<?php echo get_avatar_url(get_post_field( 'post_author', get_the_ID())); ?>" class="rounded-circle mx-auto d-block" alt="..."><div class = 'mt-2'>
				<?php echo get_the_author(); ?><br>
				<?php echo get_the_date(); ?>
				</div>
			</div></center>
		</div>
	</div>
	<div class="row">


	<!--<img src="<?php echo get_the_post_thumbnail_url() ?>" class="w-100" style="height: 70vh;">-->

		<div class="col bg-light shadow-sm py-3">

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
				//if ( comments_open() ) : // If there are comments, pull the comments function using comments_template()
				//comments_template(); // A wordpress function to call
				//endif;
			?>
			
			</div>

		</div>
	</div>

</main>


<?php
get_footer();
?>