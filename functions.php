<?php /*
================================================================================
Commentpress Flat Child Theme Functions
================================================================================
AUTHOR: Christian Wach <needle@haystack.co.uk>
--------------------------------------------------------------------------------
NOTES

Example theme amendments and overrides.

This file is loaded before the Commentpress Flat Theme's functions.php file,
so changes and updates can be made here. Most theme-related functions are
pluggable, so if they are defined here, they will override the ones defined in
the Commentpress Flat Theme or common theme functions file.

--------------------------------------------------------------------------------
*/



/**
 * Augment the CommentPress Flat Theme setup function.
 */
function commentpress_flat_child_setup() {

	/**
	 * Make theme available for translation.
	 *
	 * Translations can be added to the /languages directory of the child theme.
	 */
	load_child_theme_textdomain(
		'commentpress-flat-child',
		get_stylesheet_directory() . '/languages'
	);

}

// hook into after_setup_theme
add_action( 'after_setup_theme', 'commentpress_flat_child_setup' );



/**
 * Enqueue child theme styles.
 *
 * Styles can be overridden because the child theme is:
 * 1. enqueueing later than the CommentPress Flat Theme
 * 2. making the file dependent on the CommentPress Flat Theme's stylesheet
 */
function commentpress_flat_child_enqueue_styles() {

	// dequeue parent theme colour styles
	//wp_dequeue_style( 'cp_webfont_lato_css' );
	//wp_dequeue_style( 'cp_colours_css' );

	// add child theme's css file
	wp_enqueue_style(
		'commentpress_flat_child_css',
		get_stylesheet_directory_uri() . '/assets/css/style-overrides.css',
		array( 'cp_screen_css' ),
		'1.0', // version
		'all' // media
	);

}

// add action for the above
add_action( 'wp_enqueue_scripts', 'commentpress_flat_child_enqueue_styles', 998 );
