<?php
/**
 * The template for displaying status post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Main Loop */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-chat' ); ?>>

	<div class="post-header clearfix">
		<div class="row-fluid">
			<div class="col-sm-2 hidden-xs">
                <span class="glyphicon glyphicon-comment"></span>
            </div>
			<div class="entry-content col-md-10 col-xs-12 clearfix">
				<?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
					<?php the_excerpt( ); ?>
					<a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'standard' ); ?></a>
				<?php } else { ?>
					<?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
				<?php } // end if/else ?>
			</div><!-- /.entry-content -->
		</div><!-- /row-fluid -->
	</div> <!-- /.post-header -->
					
	<?php get_template_part( 'templates/meta', 'footer' ); ?>
	
</article><!-- /#post -->