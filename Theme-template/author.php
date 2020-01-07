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

<div class="container-fluid customcontent">
	<p>debug: author.php has loaded</p>
</div>

<main class="container-fluid">
	<div class="row">

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
			<h5>Profile</h5><hr>
			<img src="<?php echo $avatar; ?>" class="rounded-circle mx-auto d-block pb-0 pt-3"><br>
			<h3 class="text-center"><?php echo $display_name; ?></h3><hr>
			<p class="text-center" style="font-size: 1rem;"><i><?php 
				echo $description; ?></i><br><br>
				Permissions: <?php echo $role; ?><br>
				Posts: <?php echo $post_count; ?><br>
				Last post: <?php echo $last_post; ?>
			</p>
		</div>

		<div class="col-md-9">
			<h5>Recent Writings</h5><hr>
			<?php if ( have_posts() ) : 
				while ( have_posts() ) : the_post();?>

					<!-- BOOTSTRAP CARD COMPONENT - CONTAINS LATEST POSTS WITH UNDER THIS AUTHOR -->
					<div class="card my-2">
						<div class="card-body">
							<a href="<?php the_permalink() ?>"><h5 class="card-title"><?php the_title(); ?></h5></a>
							<p class="card-text"><?php the_excerpt() ?>
							<i><?php echo get_the_date(); ?>, written by 
							<?php the_author_posts_link();?></i></p>
							<a href="<?php the_permalink() ?>" class="float-right px-3">Read more...</a>
						</div>
					</div>
				<?php
				endwhile; 
			endif;?>
		</div>

</main>

<?php
get_footer();
?>