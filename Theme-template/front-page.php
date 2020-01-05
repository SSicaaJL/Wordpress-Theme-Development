<?php
/**
 * nusscistudentlife front page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<div class="container-fluid customcontent">
	<p>debug: front-page.php has loaded</p>
</div>

<div class="container-fluid">
	<div class="row">
		<div class="col">
			<p>This is the front page, containers and site dynamics to be implemented</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis porta purus, in vestibulum magna ullamcorper in. Sed ac bibendum urna, et vehicula dui. Aliquam luctus enim euismod nisl interdum, id suscipit quam sollicitudin. Proin vitae massa vitae magna scelerisque pulvinar. Curabitur posuere eu ex eget feugiat. Suspendisse bibendum pharetra metus ut commodo. Donec in diam nec magna semper pretium. Integer lectus nibh, sagittis mollis finibus eu, imperdiet quis quam.</p>
			<?php
			if ( have_posts() ) :

				/**if ( is_home() && ! is_front_page() ) :
					?>
					<header>
						<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
					</header>
					<?php
				endif;*/

				/* Start the Loop */
				while ( have_posts() ) : the_post();?>

						<div style="border: double;"><h1><?php the_title(); ?></h1><?php the_content(); ?></div>

				<?php endwhile; else: ?>
				<p>No posts matched your criteria</p>
			
			<?php
			endif;
			?>
		</div>
	</div>
</div>

<?php
get_footer();
?>
