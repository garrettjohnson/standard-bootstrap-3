<?php
/**
 * The template for displaying comments, pings, and trackbacks on posts, pages, and attachments.
 * 
 * @package Standard
 * @since 	3.1
 * @version	3.0
 */
?>
<?php 
	if ( ! empty( $_SERVER['SCRIPT_FILENAME'] ) && 'comments.php' == basename( $_SERVER['SCRIPT_FILENAME'] ) ) {
		die ( __( 'This file cannot be loaded directly.', 'standard' ) );
	} // end if
?>

<?php if ( post_password_required() ) { ?>
	<div id="comments">
		<h3 class="nopassword"><?php _e( 'This post is password protected. Enter the password to view comments.', 'standard' ); ?></h3>
	</div><!-- #comments -->
	<?php return; ?>
<?php } // end if	?>

<?php if ( have_comments() ) { ?>

	<?php if ( ! empty( $comments_by_type['comment'] ) ) { ?>
		<div id="comments" class="clearfix">
			<h3><?php comments_number( __( 'No responses', 'standard' ), __( 'One response', 'standard' ), __( '% responses', 'standard' ) );?> <?php _e( 'to',  'standard' ); ?> <em><?php the_title(); ?></em></h3>
			<ol class="commentlist">
				<?php wp_list_comments( 'avatar_size=50&callback=standard_custom_comment&type=comment' ); ?>
			</ol>    
			<div class="comment-navigation clearfix">
				<div class="comment-prev-nav">
					<?php previous_comments_link( '<i class="icon-chevron-left"></i>' . __( 'Previous Comments', 'standard' ) ); ?>
				</div>
				<div class="comment-next-nav">
					<?php next_comments_link( __( 'Next Comments', 'standard' ) . '<i class="icon-chevron-right"></i>'); ?>
				</div>
			</div>
		</div><!-- /#comments -->
	<?php } // end if ?>

	<?php if ( ! empty( $comments_by_type['pings'] ) ) { ?>
		<div id="pings">
			<h3>
				<?php _e( 'Trackbacks and Pingbacks:', 'standard' ); ?>
			</h3>
			<ol class="pinglist">
				<?php wp_list_comments( 'type=pings&callback=list_pings&per_page=-1' ); ?>
			</ol>
		</div><!-- /#pings -->
	<?php } // end if ?>	
	
<?php } else { ?>

	<?php if( comments_open() ) { ?>
		<div id="no-comments" class="clearfix">
			<p class="title"><?php _e( 'No Comments', 'standard' ); ?></p>
			<p><?php _e( 'Be the first to start the conversation.', 'standard' ); ?></p>
		</div><!-- /#no-comments -->
	<?php } // end if ?>
	
<?php } // end if ?>

<?php // standard_comment_form(); ?>

<?php if (comments_open()) : ?>
  <section id="respond">
    <h3><?php comment_form_title(__('Leave a Reply', 'standard'), __('Leave a Reply to %s', 'standard')); ?></h3>
    <p class="cancel-comment-reply"><?php cancel_comment_reply_link(); ?></p>
    <?php if (get_option('comment_registration') && !is_user_logged_in()) : ?>
      <p><?php printf(__('You must be <a href="%s">logged in</a> to post a comment.', 'standard'), wp_login_url(get_permalink())); ?></p>
    <?php else : ?>
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if (is_user_logged_in()) : ?>
          <p>
            <?php printf(__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.', 'standard'), get_option('siteurl'), $user_identity); ?>
            <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php __('Log out of this account', 'standard'); ?>"><?php _e('Log out &raquo;', 'standard'); ?></a>
          </p>
        <?php else : ?>
          <div class="form-group">
            <label for="author"><?php _e('Name', 'standard'); if ($req) _e(' (required)', 'standard'); ?></label>
            <input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>
          <div class="form-group">
            <label for="email"><?php _e('Email', 'standard'); if ($req) _e(' (required)', 'standard'); ?></label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" <?php if ($req) echo 'aria-required="true"'; ?>>
          </div>
          <div class="form-group">
            <label for="url"><?php _e('Website', 'standard'); ?></label>
            <input type="url" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22">
          </div>
        <?php endif; ?>
        <div class="form-group">
          <label for="comment"><?php _e('Comment', 'standard'); ?></label>
          <textarea name="comment" id="comment" class="form-control" rows="5" aria-required="true"></textarea>
        </div>
        <p><input name="submit" class="btn btn-primary" type="submit" id="submit" value="<?php _e('Submit Comment', 'standard'); ?>"></p>
        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
      </form>
    <?php endif; ?>
  </section><!-- /#respond -->
<?php endif; ?>

