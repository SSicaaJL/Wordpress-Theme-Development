<?php
/*
 * Plugin Name: NUS Science Student Life Post View Counter
 * Description: Created to add a post view counter to all site posts
 * Version: 1.0
 * Author: NUS Science Club Communications Outreach
 * 
 * NUS Science Student Life Post View Counter is a custom made plugin made for use by the NUS Science Student Life theme only.
 */
?>

<?php
function sci_add_view() {
   if(is_single()) {
      global $post;
      $current_views = get_post_meta($post->ID, "sci_view_count", true);
      if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
         $current_views = 0;
      }
      $new_views = $current_views + 1;
      update_post_meta($post->ID, "sci_view_count", $new_views);
      return $new_views;
   }
}
add_action("wp_head", "sci_add_view");

function sci_get_view_count() {
	global $post;
	$current_views = get_post_meta($post->ID, "sci_view_count", true);
	if(!isset($current_views) OR empty($current_views) OR !is_numeric($current_views) ) {
	   $current_views = 0;
	}
 
	return $current_views;
}
?>
