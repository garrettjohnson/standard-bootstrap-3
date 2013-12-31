<?php
/**
 * The template for displaying video post formats.
 * 
 * @package Standard
 * @since 	3.0
 * @version	3.0
 */
?>
<?php /* Gallery Loop */ ?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-gallery clearfix' ); ?>>

	<div id="content-<?php the_ID(); ?>" class="entry-content">
		<?php
		$gallery_images = get_children( array(
			'post_parent'		=>	$post->ID,
			'post_type'			=>	'attachment',
			'post_mime_type'	=>	'image',
			'orderby'			=>	'menu_order',
			'order'				=>	'ASC',
			'numberposts'		=>	999
		) );
		if ( $gallery_images ) :
			$gallery_total_images	=	count( $gallery_images );
			$gallery_images		=	array_slice( $gallery_images, 0, 10 );
		?>

		<div id="gallery-<?php the_ID(); ?>" class="carousel slide">
			<ol class="carousel-indicators">
                <?php 
                	$counter = 0;
                  foreach ( $gallery_images as $gallery_image ) : {
                  	if($counter == 0) {
                  		echo '<li data-target="#gallery-'.get_the_ID().'" data-slide-to="'.$counter.'" class="active"></li>';
                  	} else {
                  		echo '<li data-target="#gallery-'.get_the_ID().'" data-slide-to="'.$counter.'"></li>';
                  	}
                    $counter++;
                  } endforeach;
                ?>
              </ol>
			<!-- Carousel items -->
			<div class="carousel-inner">
				<?php $counter = 0; ?>
				<?php foreach ( $gallery_images as $gallery_image ) : ?>
				<figure class="item <?php if($counter == 0) : echo " active"; endif; ?>">
					<?php echo wp_get_attachment_image( $gallery_image->ID, 'full' ); 
					if ( has_excerpt( $gallery_image->ID ) ) :?>
					<figcaption class="carousel-caption">
						<h4><?php echo get_the_title( $gallery_image->ID ); ?></h4>
						<p><?php echo apply_filters( 'get_the_excerpt', $gallery_image->post_excerpt ); ?></p>
					</figcaption>
					<?php endif; ?>
				</figure>
				<?php $counter++; ?>
				<?php endforeach; ?>
			</div>
		
			<!-- Carousel nav -->
			<a class="carousel-control left" href="#gallery-<?php the_ID(); ?>" data-slide="prev"><span class="icon-prev"></span></a><a class="carousel-control right" href="#gallery-<?php the_ID(); ?>" data-slide="next"><span class="icon-next"></span></a>
		</div><!-- #gallery-slider -->

	<?php endif; /* if images */ ?>


	<?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
			<?php echo strip_shortcodes(wp_trim_words( get_the_content(), 80 )); ?>
			<a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'standard' ); ?></a>
		<?php } else { ?>
			<?php
			ob_start();
			the_content(''.__('Read more <span class="meta-nav">&raquo;</span>', 'sandbox').'');
			$old_content = ob_get_clean();
			$new_content = strip_tags($old_content, '<p><a><b><br /><input><form><textarea><li><ol><ul><table>');
			echo $new_content;
			?>
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


		<div class="post-meta clearfix">

			<div class="meta-date-cat-tags pull-left">
			
				<?php if( is_multi_author() ) { ?>
					<span class="the-author">&nbsp;<?php _e( 'Posted by', 'standard' ); ?>&nbsp;<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="<?php echo get_the_author_meta( 'display_name' ); ?>"><?php echo the_author_meta( 'display_name' ); ?></a></span>
					<span class="the-time updated">&nbsp;<?php _e( 'on', 'standard' ) . '&nbsp;'; echo get_the_time( get_option( 'date_format' ) ); ?></span>
				<?php } else { ?>
					<?php printf( '<span class="the-time updated">' . __( 'Posted on %1$s', 'standard' ) . '</span>&nbsp;', get_the_time( get_option( 'date_format' ) ) ); ?>
				<?php } // end if ?>
			
				<?php $category_list = get_the_category_list( __( ', ', 'standard' ) ); ?>
				<?php if( $category_list ) { ?>
					<?php printf( '<span class="the-category">' . __( 'In %1$s', 'standard' ) . '</span>', $category_list ); ?>
				<?php } // end if ?>
				
				<?php $tag_list = get_the_tag_list( '', __( ', ', 'standard' ) ); ?>
				<?php if( $tag_list ) { ?>
                    <?php printf( '<span class="glyphicon glyphicon-tags"></span> ' . __( '%1$s', 'standard' ) . '</span>', $tag_list ); ?>
				<?php } // end if ?>
				
			</div><!-- /meta-date-cat-tags -->
			
			<div class="meta-comment-link pull-right">
				<a class="pull-right post-link" href="<?php the_permalink(); ?>" title="<?php esc_attr_e( 'permalink', 'standard' ); ?>">&nbsp;<span class="glyphicon glyphicon-link"></span></a>
				<?php if ( '' != get_post_format() ) { ?>
					<span class="the-comment-link"><?php comments_popup_link( __( 'Leave a comment', 'standard' ), __( '1 Comment', 'standard' ), __( '% Comments', 'standard' ), '', ''); ?></span>
				<?php } // end if ?>
			</div><!-- /meta-comment-link -->

	</div><!-- /.post-meta -->

</article> <!-- /#post- -->