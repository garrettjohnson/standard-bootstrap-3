<?php
/**
 * The template for displaying quote post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Main Loop */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-quote clearfix' ); ?>>
		
	<div class="post-header clearfix">
			<div class="entry-content clearfix">
				<?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
					<?php the_excerpt( ); ?>
					<a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'standard' ); ?></a>
				<?php } else { ?>
					<?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
				<?php } // end if/else ?>
			</div><!-- /.entry-content -->
	</div> <!-- /.post-header -->

	<div id="content-<?php the_ID(); ?>" class="entry-content clearfix">	
		
		<?php if( '' !== get_the_title() ) { ?>
			<?php if( is_single() ) { ?>
				<h1 class="post-title entry-title"><?php the_title(); ?></h1>	
			<?php } else { ?>
				<h2 class="post-title entry-title">
					<a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'standard' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a>
				</h2>
			<?php } // end if ?>
		<?php } // end if ?>
		
		<?php 
			wp_link_pages( 
				array( 
					'before' => '<div class="page-link"><span>' . __( 'Pages:', 'standard' ) . '</span>', 
					'after' => '</div>' 
				) 
			); 
		?>
		
	</div><!-- /.entry-content -->
	
	<?php get_template_part( 'templates/meta', 'footer' ); ?>
</article><!-- /#post -->