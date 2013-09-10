<!DOCTYPE html>
<!--[if IE 8 ]><html id="ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <title><?php wp_title( '' ); ?></title>
    <?php $presentation_options = get_option( 'standard_theme_presentation_options'); ?>
    <?php if( '' != $presentation_options['fav_icon'] ) { ?>
        <link rel="shortcut icon" href="<?php echo $presentation_options['fav_icon']; ?>" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $presentation_options['fav_icon']; ?>" />
    <?php } // end if ?>
    <?php global $post; ?>
    <?php if( standard_using_native_seo() && ( ( is_single() || is_page() ) && ( 0 != strlen( trim( ( $google_plus = get_user_meta( $post->post_author, 'google_plus', true ) ) ) ) ) ) ) { ?>
        <?php if( false != standard_is_gplusto_url( $google_plus ) ) { ?>
            <?php $google_plus = standard_get_google_plus_from_gplus( $google_plus ); ?>
        <?php } // end if ?>
        <link rel="author" href="<?php echo trailingslashit( $google_plus ); ?>"/>
    <?php } // end if ?>
    <?php $global_options = get_option( 'standard_theme_global_options' ); ?>
    <?php if( '' != $global_options['google_analytics'] ) { ?>
        <?php if(!is_user_logged_in() ) { // Google Analytics is restricted only to users who are not logged in. ?>
            <script>
              (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
              (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
              m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
              })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
              <?php if( 0 != strlen( $global_options[ 'google_analytics_domain'] ) ) { ?>
                ga('create', '<?php echo $global_options[ 'google_analytics' ] ?>', '<?php echo $global_options[ 'google_analytics_domain' ] ?>');
              <?php } else { ?>
                ga('create', '<?php echo $global_options[ 'google_analytics' ] ?>');
              <?php } // end if/else ?>
              ga('send', 'pageview');
            </script>
        <?php } // end !is_user_logged_in ?>
    <?php } // end if ?>
    <?php if( standard_google_custom_search_is_active() ) { ?>
        <?php $gcse = get_option( 'widget_standard-google-custom-search' ); ?>
        <?php $gcse = array_shift( array_values ( $gcse ) ); ?>
        <script type="text/javascript">
            (function() {
                var cx = '<?php echo trim( $gcse['gcse_content'] ); ?>';
                var gcse = document.createElement('script'); gcse.type = 'text/javascript'; gcse.async = true;
                gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                    '//www.google.com/cse/cse.js?cx=' + cx;
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(gcse, s);
            })();
        </script>
    <?php } // end if ?>
    <?php wp_head(); ?>
</head>