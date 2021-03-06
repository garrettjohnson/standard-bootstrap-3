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