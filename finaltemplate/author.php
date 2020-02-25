<?php
/**
 * nusscistudentlife author page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */

get_header();
?>

<main class="container-xl">
	<div class="row pt-3">

		<?php // Getting author information
		$id = get_the_author_meta('ID'); // Getting ID for some functions that requires it
		$user_data = get_userdata($id); // Getting array userdata that contains certain information
		$avatar = get_avatar_url($id); // Get profile picture
		$display_name = get_the_author_meta('display_name'); // Display name
		$description = get_the_author_meta('description'); // Biography
		$post_count = count_user_posts($id); // Total number of posts
		$role = implode(', ', $user_data->roles); // User permission level
		$last_post = get_the_date(); // Get last post date
		?>

		<div class="col-md-3">
			<h3 class="mb-3">Profile</h3>
			<img src="<?php echo $avatar; ?>" class="rounded-circle mx-auto d-block"><br>
			<h4 class="text-center"><?php echo $display_name; ?></h4><hr class="sci-hr">
			<p class="text-center" style="font-size: 1rem;"><i><?php 
				echo $description; ?></i><br><br>
				Permissions: <?php echo $role; ?><br>
				Posts: <?php echo $post_count; ?><br>
				Last post: <?php echo $last_post; ?>
			</p>
		</div>

		<div class="col-md-9">
			<h3>Recent Writings</h3>
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post();?>
					<div class="d-flex my-3">
						<div class="sci-news-date-block justify-content-center text-center mr-2 p-2 text-white">
							<h5 class="p-0 m-0" style="font-weight: 600;"><?php echo get_the_date( 'd' ); ?></h5>
							<h6 class="p-0 m-0" style="font-weight: 600;"><?php echo get_the_date( 'm.Y' ); ?></h6>
						</div>
						<div class="mx-2">
							<a href="<?php the_permalink() ?>"><h4 class="card-title pb-2 m-0"><?php the_title(); ?></h4></a>
							<?php the_excerpt() ?>
						</div>
					</div>
					<hr>
				<?php
				endwhile; 
			endif;?>
		</div>

</main>

<?php
get_footer();
?>
