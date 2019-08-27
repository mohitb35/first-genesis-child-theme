<?php

/**
 * Theme Customization
 *
 * This file adds functions to my first genesis child theme.
 *
 * @package		First Genesis Child Theme
 * @author 		Mohit Bajaj
 * @copyright	Copyright (c) 2019, Mohit Bajaj
 * @license 	GPL-3.0-or-later
 * @link		https://github.com/mohitb35/first-genesis-child-theme
 */


load_child_theme_textdomain('first-genesis-child-theme');


// Creating a setup function
add_action('genesis_setup', 'fgct_setup', 15);

/**
* Theme Setup
* 
* Attach all site wide functions to the correct hooks and filters. 
* All the functions themselves are defined below this setup function.
*
* @since 1.0.0
*/
function fgct_setup() {

	// Define theme constants
	define('CHILD_THEME_NAME', 'First Genesis Child Theme');
	define('CHILD_THEME_URL', 'https://github.com/mohitb35/first-genesis-child-theme');
	define('CHILD_THEME_VERSION', '1.0.0');

	// Add HTML5 markup structure
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

	// Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	// Add theme support for accessibility
	add_theme_support( 
		'genesis-accessibility',
		array(
			'drop-down-menu',
			'headings',
			'rems',
			'search-form',
			'skip-links',
		)
	);

	// Add theme support for genesis footer widgets
	add_theme_support( 'genesis-footer-widgets', 3);

	// Remove unused sidebar
	unregister_sidebar( 'sidebar-alt' );

	// unregister layouts that use a secondary sidebar
	genesis_unregister_layout( 'content-sidebar-sidebar' );
	genesis_unregister_layout( 'sidebar-content-sidebar' );
	genesis_unregister_layout( 'sidebar-sidebar-content' );

	// Repositions primary navigation menu.
	remove_action( 'genesis_after_header', 'genesis_do_nav' );
	add_action( 'genesis_header', 'genesis_do_nav', 12 );

	
	require_once( get_stylesheet_directory() . '/includes/widget-areas.php' );
};

add_action('wp_enqueue_scripts', 'fgct_enqueue_styles');

function fgct_enqueue_styles() {
	wp_enqueue_style('google_fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,400i,700,700i&display=swap');
}






