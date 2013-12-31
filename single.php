<?php
/**
 * The template for displaying a single post and its related content as well as author boxes. Uses
 * get_post_format to render the appropriate template based on the post's format.
 *
 * @package Standard
 * @since 	3.0
 * @version	3.1
 */
?>
<?php get_header(); ?>
<?php $presentation_options = get_option( 'standard_theme_presentation_options' ); ?>
<?php
if( 1 == get_post_meta( get_the_ID(), 'standard_seo_post_level_layout', true ) ) {
	$content_width = 900;
} // end if
?>
<div id="wrapper">
	<div class="container">
		<div class="row">

            <?php if ( 'left_sidebar_layout' == $presentation_options['layout'] ) { ?>
                <?php get_sidebar(); ?>
            <?php } // end if ?>

            <section id="main" class="<?php echo 'full_width_layout' == $presentation_options['layout'] ? 'col-md-12' : 'col-md-8'; ?> clearfix" role="main">
				
				<?php get_template_part( 'breadcrumbs' ); ?>
				
				<?php if ( have_posts() ) { ?>
					<?php while ( have_posts() ) { ?>
					<?php the_post(); ?>
					<?php get_template_part( 'templates/content', get_post_format() ); ?>

						<?php $publishing_options = get_option( 'standard_theme_publishing_options' ); ?>
						<?php $display_author_box = isset( $publishing_options['display_author_box'] ) ? $publishing_options['display_author_box'] : ''; ?>
			
						<?php get_template_part( 'pagination '); ?>

						<?php $social_options = get_option( 'standard_theme_social_options' ); ?>
                        <?php if( 'always' == $display_author_box ) { ?>
                            <?php get_template_part( 'templates/meta', 'author-box' ); ?>
                        <?php } // end if ?>
						
						<?php if( is_active_sidebar( 'sidebar-2' ) ) { ?>
							<div id="standard-post-advertisement">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div><!-- #standard-post-advertisement -->
						<?php } // end if ?>
						
						<?php get_template_part( 'pagination' ); ?>
						
						<?php comments_template( '', true ); ?>	
						
				 	<?php } // end while ?>

				<?php } // end if ?>
			</section><!-- /#main -->

            <?php if ( 'right_sidebar_layout' == $presentation_options['layout'] ) { ?>
                <?php get_sidebar(); ?>
            <?php } // end if ?>
				
		</div> <!-- /row -->
	</div><!-- /container -->
</div> <!-- /#wrapper -->
<?php get_footer(); ?>