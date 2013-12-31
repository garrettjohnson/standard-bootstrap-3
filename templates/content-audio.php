<?php
/**
 * The template for displaying audio post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Audio Loop */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-audio clearfix' ); ?>>
	<div class="post-header clearfix">
		<div class="title-wrap clearfix row">
            <div class="col-sm-1 hidden-xs">
                <span class="icon-music"></span>
            </div> <!-- /.col-md-1 -->
            <div class="col-sm-11 col-xs-12">
                <h1 class="post-title entry-title">
                    <a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'standard' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
				</h1>
            </div> <!-- /.col-md-11 -->
		</div><!-- /.title-wrap -->
	</div>

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