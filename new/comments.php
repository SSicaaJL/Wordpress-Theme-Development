<?php
/**
 * nusscistudentlife template for displaying comments
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package nusscistudentlife
 */
?>

<!-- DISPLAYING COMMENTS, CALLBACK FROM wp_list_comments-->
<?php // Styling of the comments displayed
function nusscistudentlife_comment($comment, $args, $depth){ ?>
	<div class="d-flex flex-row my-3 bg-light sci-popup rounded p-2" id="div-comment-<?php comment_ID() ?>"> <!-- Creating a Flex Box -->

		<div class="mr-3"> <!-- The commentor's profile picture -->
			<img class="rounded-circle" src="<?php echo get_avatar_url( $comment, array('size' => $args['avatar_size'])); ?>">
		</div>

		<div> 
			<div style="font-size: 0.8rem;"> <!-- The commentor's name and date -->
				<a href="<?php echo get_author_posts_url($comment->user_id); ?>"><?php echo $comment->comment_author; ?></a>&nbsp
				<?php echo get_comment_date(); ?>
			</div>

			<div> <!-- The comment content -->
				<?php comment_text(); ?>
			</div>

			<?php if ( is_user_logged_in() ) :?>
				<div class="reply"> <!-- A responsive reply to be used with comment threading script in function.php -->
					<?php 
						comment_reply_link( 
							array_merge( 
								$args, 
								array( 
									'add_below' => 'div-comment', 
									'depth'     => $depth, 
									'max_depth' => $args['max_depth'] 
								) 
							) 
						);
					?>
				</div><?php
			endif;?>
		</div>
	</div><?php
}
?>

<hr>
<!-- TOP PART OF COMMENT SECTION -->
<?php if ( is_user_logged_in() ) { // If is logged in, activate the comment form
	$userID = get_current_user_id(); // Get user ID and the user's name for later use
	$userName = get_user_meta( $userID, 'nickname', true ); ?>

	<div class="my-3" style="font-size: 0.8rem;"> <!-- The top part of comment section, containing user name and number of comments -->
	<a href="<?php echo get_author_posts_url( $userID )?>" class="pr-3"><?php echo $userName; ?></a>|
	<span class="pl-2"><?php echo comments_number() ?></span>
	</div><?php 

	comment_form( array( // The comment form, using Wordpress' inbuilt comment form
		'logged_in_as'			=> '',
		'must_log_in'			=> '',
		'title_reply'			=> '',
		'title_reply_to'		=> '',
		'comment_field'			=> '<textarea id="comment" name="comment" class="form-control simplebox" rows="3">Leave a comment</textarea>',
		'label_submit'			=> 'Post',
		'class_submit'			=> 'float-right btn btn-primary mt-1 py-0',
		'cancel_reply_before'	=> '<h6 style="font-size: 0.8rem;">',
		'cancel_reply_after'	=> '</h6>',
		'cancel_reply_link'		=> 'Cancel reply',
	));
	} else { // If is not logged in, just prompt for login and display number of comments ?>
	<div class="my-3" style="font-size: 0.8rem;">
	<a href="" class="pr-3">Please login to comment</a>|
	<span class="pl-2"><?php echo comments_number() ?></span>
	</div><?php 
	}
?>

<!-- WORDPRESS FUNCTION TO PRODUCE A LIST OF COMMENTS -->
<?php if ( have_comments() ) { // The list of comments function provided by Wordpress
	wp_list_comments( array(
		'callback'          => 'nusscistudentlife_comment', // 'callback' is for customising display style
		'type'              => 'comment',
		'reply_text'        => 'reply',
		'reverse_top_level' => true,
		)
	);
}
?>