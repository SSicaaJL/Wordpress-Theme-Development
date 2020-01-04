<?php
/**
 * nusscistudentlife page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<main class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<h1>page.php has loaded</h1>
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				<div class="light-bg"><h1><?php the_title();?></h1></div>
				<?php the_content();
				endwhile;
			endif;?>
		</div>
	</div>
</main>

<?php
get_footer();
?>
