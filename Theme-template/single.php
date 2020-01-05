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

<div class="container-fluid customcontent">
	<p>debug: single.php has loaded</p>
</div>

<main class="container-fluid">
	<div class="row">
		<div class="col">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post();
					the_title();
					the_content();
					the_author();
					echo get_the_date();
				endwhile; 
			endif;?>
		</div>
	</div>

</main>


<?php
get_footer();
?>