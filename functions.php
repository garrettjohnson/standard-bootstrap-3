<?php

/*
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ INSTRUCTIONS /\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\

	The following functions in Standard 3 are able to be overridden in your child 
	theme.
	
		standard_page_menu
		standard_add_theme_background
		standard_add_theme_editor_style
		standard_add_theme_menus
		standard_add_theme_sidebars
		standard_add_theme_features
		standard_set_theme_colors
		standard_header_style
		standard_admin_header_style
		standard_admin_header_image
		standard_custom_comment
		standard_process_link_post_format_content
		standard_process_link_post_format_title
		standard_remove_paragraph_on_media
		standard_wrap_embeds
		standard_search_form
		standard_post_format_rss
		standard_modify_widget_titles
		standard_add_title_to_single_post_pagination
		standard_comment_form
    
    Do not modify anything in-between the "DO NOT MODIFY" start and end sections.
    
	You may place any functions outlined in our FAQs & tutorials on the support
	forum in this file, as instructed, or any other code you create yourself or find
	from around the web below the "CUSTOMIZATIONS" section at the end of the file.
	
	Be forewarned that even the simplest mistake within this file can completely
	bring down your website. Please make sure to create backups and have FTP
	access to your server before modifying this file so you amy correct any issues.
	
/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\//\/\/\/\/\/\/\/\/\/\
*/


/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/ DO NOT MODIFY START /\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

/**
 * Reorders the loading of Standard's styles to ensure that the child theme kit's
 * styles.css gets loaded last. This allows the child theme kit to override all
 * Standard styles.
 *
 * @since	3.2.1
 * @version	1.0
 */
function standard_child_theme_kit_reorder_styles() {
    wp_dequeue_style( 'theme-responsive' );
    wp_dequeue_style( 'bootstrap' );
    wp_dequeue_style( 'bootstrap-responsive' );

    // bootstrap
    wp_enqueue_style( 'bootstrap-3', get_stylesheet_directory_uri() . '/assets/css/bootstrap.css', false, STANDARD_THEME_VERSION );

    // child theme
    wp_enqueue_script( 'child-theme', get_stylesheet_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), STANDARD_THEME_VERSION );

} // end standard_child_theme_kit_reorder_styles

add_action( 'wp_enqueue_scripts', 'standard_child_theme_kit_reorder_styles', 1000 );

/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ DO NOT MODIFY END /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ */

require_once locate_template('/lib/utils.php');             // Custom nav modifications
require_once locate_template('/lib/nav.php');             // Custom nav modifications



/* /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/\ CUSTOMIZATIONS /\/\/\/\/\/\/\/\/\/\/\/\/\/\/\/ */

/**
 * Overriding standard_add_theme_features in the functions.php file
 * in the standard parent theme
 */
function standard_add_theme_features() {

// Feedlinks
    add_theme_support( 'automatic-feed-links' );

// enable select post formats
    add_theme_support(
        'post-formats',
        array(
            'status',
            'image',
            'link',
            'quote',
            'video'
        )
    );

// post thumbnail support
    add_theme_support( 'post-thumbnails' );

    if( standard_using_native_seo() ) {
        standard_add_plugin( '/lib/seo/plugin.php' );
    } // end if

// Include our customized plugin instead of the stock one
    include_once( get_stylesheet_directory() . '/lib/standard-ad-125x125/plugin.php' );

    standard_add_plugin( '/lib/activity/plugin.php' );
    standard_add_plugin( '/lib/google-custom-search/plugin.php' );
    standard_add_plugin( '/lib/standard-ad-300x250/plugin.php' );
    standard_add_plugin( '/lib/standard-ad-billboard/plugin.php' );
    standard_add_plugin( '/lib/personal-image/plugin.php' );
    standard_add_plugin( '/lib/influence/plugin.php' );

} // end add_theme_features
add_action( 'after_setup_theme', 'standard_add_theme_features' );
