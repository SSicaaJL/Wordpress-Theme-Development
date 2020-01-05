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

<div class="container-fluid customcontent">
	<p>debug: page.php has loaded</p>
</div>

<main class="container-fluid">
	<div class="row">
		<div class="col">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
					the_title();
					the_content();
				endwhile; 
			endif;?>
		</div>
	</div>

</main>

<?php
get_footer();
?>
