<?php
/**
 * The template for displaying video post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Video Loop */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-video clearfix' ); ?>>

	<div id="content-<?php the_ID(); ?>" class="entry-content">
		<?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
			<?php the_excerpt( ); ?>
			<a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'standard' ); ?></a>
		<?php } else { ?>
			<?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
		<?php } // end if/else ?>
		<?php 
			wp_link_pages( 
				array( 
					'before' 	=> '<div class="page-link"><span>' . __( 'Pages:', 'standard' ) . '</span>', 
					'after' 	=> '</div>' 
				) 
			); 
		?>
	</div><!-- /.entry-content -->
	
	<?php get_template_part( 'templates/meta', 'footer' ); ?>
	
</article> <!-- /#post- -->