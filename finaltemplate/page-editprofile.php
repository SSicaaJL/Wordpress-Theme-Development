<?php
/**
 * nusscistudentlife edit profile page
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
		$id = get_current_user_id(); // Getting ID for some functions that requires it
		$user_data = get_userdata($id); // Getting array userdata that contains certain information
		$avatar = get_avatar_url($id); // Get profile picture
		$display_name = get_user_meta( $id, 'nickname', true ); // Display name
		$description = get_user_meta($id, 'description', true); // Biography
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

				<?php if (get_current_user_id() == $id) { ?>
					<br><br><a href="<?php echo get_permalink( get_page_by_title( 'editprofile' ) ) ?>">Edit Profile</a><?php
				} ?>
			</p>
		</div>
		
		<div class="col-md-9">
			<?php echo do_shortcode("[wpmem_form user_edit]"); ?>
		</div>
	</div>
</main>

<?php
get_footer();
?>