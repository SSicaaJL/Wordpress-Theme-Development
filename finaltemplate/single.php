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

<main class="container-xl">

	<?php the_post();?>
	
	<div class = "row">
		<div class = "col justify-content-center text-center">
			<div class="sci-post-thumbnail overflow-hidden">
				<?php if ( has_post_thumbnail() ) {?>
					<img src="<?php echo get_the_post_thumbnail_url() ?>" style="width: 100%;"><?php
				} else {?>
					<img src="<?php echo get_template_directory_uri()?>/images/no_post_thumbnail2.jpg" style="width: 100%;">

					<?php 
				}?>
			</div>
			<div class="position-absolute " style="bottom:0px; right: 1px; left: 1px;">
				<img src="<?php echo get_avatar_url(get_post_field( 'post_author', get_the_ID())); ?>" class="rounded-circle" style="width:50px; height:50px;">
				<div class="mt-2">
				<p>By <?php the_author_posts_link(); ?><br>
				<?php echo get_the_date(); ?></p>
				</div>
			</div>
		</div>
	</div>


	<!-- CONTENT AREA -->
	<div class="row">
		<div class="col py-3">
			<div>
				<h3 class="pt-2"><?php the_title(); ?></h3>
				<p><?php the_content();?></p>
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
