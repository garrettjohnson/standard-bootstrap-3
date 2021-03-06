<?php
/**
 * The template for displaying link post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Main Loop */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-link clearfix' ); ?>>

	<div class="post-header clearfix">
			<div id="content-<?php the_ID(); ?>"  class="entry-content clearfix">	
			
				<?php

					// Read the attribute of the anchor from the post format
					$title = standard_get_link_post_format_attribute( 'title' );
					$href = standard_get_link_post_format_attribute( 'href' );
					$target = strlen( standard_get_link_post_format_attribute( 'target' ) ) > 0 ? standard_get_link_post_format_attribute( 'target' ) : '_blank';
					
					// And attempt to read the link from the post meta
					$href = ( '' == get_post_meta( get_the_ID(), 'standard_link_url_field', true ) ) ? $href : get_post_meta( get_the_ID(), 'standard_link_url_field', true );
					$post_title = strip_tags( stripslashes( get_the_title() ) );
					$content = strip_tags( get_the_content() );
					
				?>

				<?php if( is_single() && '' !== get_the_title() ) { ?>
					<h1 class="post-title entry-title">
                        <span class="glyphicon glyphicon-link"></span> <a href="<?php echo $href; ?>" title="<?php echo strlen( trim( $title ) ) > 0 ? $title : $post_title; ?>" target="<?php echo $target; ?>" rel="bookmark">
							<?php if( strlen( trim( $post_title ) ) > 0 ) { ?>
								<?php echo $post_title; ?>
							<?php } elseif( strlen( trim( $title ) ) > 0 ) { ?>
								<?php echo $title; ?>
							<?php } elseif( '' != $meta_href ) { ?>
								<?php the_content(); ?>
							<?php } else { ?>
								<?php echo $content; ?>
							<?php } // end if ?>
						</a>
					</h1>
				<?php } else { ?>
					<h2 class="post-title entry-title">
                        <span class="glyphicon glyphicon-link"></span> <a href="<?php echo $href; ?>" title="<?php echo strlen( trim( $title ) ) > 0 ? $title : $post_title; ?>" target="<?php echo $target; ?>" rel="bookmark">
							<?php if( strlen( trim( $post_title ) ) > 0 ) { ?>
								<?php echo $post_title; ?>
							<?php } elseif( strlen( trim( $title ) ) > 0 ) { ?>
								<?php echo $post_title; ?>
							<?php } elseif( '' != $meta_href ) { ?>
								<?php the_content(); ?>
							<?php } else { ?>
								<?php echo $content; ?>
							<?php } // end if ?>
						</a>
					</h2>
				<?php } // end if ?>
				
			</div><!-- /.entry-content -->
	</div> <!-- /.post-header -->
		
	<?php if( '' != get_post_meta( get_the_ID(), 'standard_link_url_field', true ) ) { ?>
		<div class="entry-content clearfix link-description">
			<?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
		</div><!-- /entry-content -->
	<?php } // end if ?>
		
			
	<?php get_template_part( 'templates/meta', 'footer' ); ?>
</article> <!-- /#post -->