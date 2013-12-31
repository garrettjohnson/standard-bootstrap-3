<?php
/**
 * The template for displaying standard post formats.
 *
 * @package Standard
 * @since 	3.0
 * @version	3.1
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'post clearfix' ); ?>>

    <div class="aside-date">
        <span class="the-date"><?php the_time('M'); ?></span>
        <span class="the-time"><?php the_time('j'); ?></span>
    </div><!--/aside-date -->

    <div id="content-<?php the_ID(); ?>" class="entry-content clearfix">

        <p class="aside-post-title"><?php the_title(); ?></p>

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
</article><!-- /#post -->