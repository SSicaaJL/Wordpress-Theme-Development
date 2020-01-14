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
		<div class="col-12" style="border: dashed;">
			<h1 class="text-center">ADVERTISEMENT</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-9" style="border: dashed;">
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post(); ?>
					<h2 class="text-center"><?php the_title(); ?></h2>
					<?php 
					the_content();
					the_author();
					echo the_date();
				endwhile; 
			endif;?>
		</div>

		<div class="col-3 bg-light" style="border: dashed;"> <!-- SIDE BAR -->
			<h5>Sidebar<hr></h5>
			<p class="text-muted">
				Archives<br>
				Category<br>
				Insects<br>
				Water<br>
				Avatar
			</p>

		</div>
	</div>

</main>

<?php
get_footer();
?>