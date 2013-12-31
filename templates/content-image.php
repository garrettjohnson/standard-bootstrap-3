<?php
/**
 * The template for displaying image post formats.
 *
 * @package Standard
 * @since 	3.0
 * @version	3.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post format-image' ); ?>>

    <?php if ( '' != get_the_post_thumbnail() ) { ?>
        <div class="post-format-image clearfix">
            <a class="thumbnail-link fademe" href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( '%s', 'standard' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_post_thumbnail( 'post-format-image' );	?></a>
        </div> <!-- /.thumbnail -->
    <?php }  // end if ?>

    <div id="content-<?php the_ID(); ?>" class="entry-content clearfix">
        <?php if( ( is_category() || is_archive() || is_home() ) && has_excerpt() ) { ?>
            <?php the_excerpt( ); ?>
            <a href="<?php echo get_permalink(); ?>"><?php _e( 'Continue Reading...', 'standard' ); ?></a>
        <?php } else { ?>
            <?php if( function_exists( 'the_post_format_image' ) ) { ?>
                <div class="image-post-format-36">
                    <?php the_post_format_image(); ?>
                </div><!-- /.image-post-format-36 -->
                <p>
                    <?php echo get_the_content( __( '<p>Continue Reading...</p>', 'standard' ) ); ?>
                </p>
            <?php } else { ?>
                <?php the_content( __( 'Continue Reading...', 'standard' ) ); ?>
            <?php } // end if/else ?>
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
    
</article><!-- /#post -->