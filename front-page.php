<?php

/**
 * Front Page Template
 *
 * @package		First Genesis Child Theme
 * @author 		Mohit Bajaj
 * @copyright	Copyright (c) 2019, Mohit Bajaj
 * @license 	GPL-3.0-or-later
 * @link		https://github.com/mohitb35/first-genesis-child-theme
 */


add_action('genesis_meta', 'fgct_home_page_setup');

/**
 * Set up home page layout by continually loading sections where widgets are active
 *
 * @since 1.0.0
 */
function fgct_home_page_setup() {

	// Array to store booleans for which sidebars are active
	$home_sidebars = array(
		'home-welcome' => is_active_sidebar('home-welcome'),
		'call-to-action' => is_active_sidebar('call-to-action')
	);

	// Returns early if there are no active sidebars
	if( !in_array(true, $home_sidebars) ){
		return;
	}

	// Add home welcome area if the widget is active
	if( $home_sidebars['home-welcome'] ){
		add_action('genesis_after_header', 'fgct_show_home_welcome');
	}

	// Add Call to action area if the widget is active
	if( $home_sidebars['call-to-action'] ){
		add_action('genesis_after_header', 'fgct_show_call_to_action');
	}

	//* Force full-width-content layout setting
	add_filter( 'genesis_pre_get_option_site_layout', '__genesis_return_full_width_content' );

	// Remove the genesis loop from the home page

	remove_action( 'genesis_loop', 'genesis_do_loop');
}


/**
 * Display Home Welcome Widget
 *
 * @since 1.0.0
 */
function fgct_show_home_welcome() {
	genesis_widget_area( 'home-welcome', array(
			'before' => '<div class="home-welcome-widget"><div class="wrap">',
			'after'  => '</div></div>',
		) );
}


/**
 * Display Call to Action widget
 *
 * @since 1.0.0
 */
function fgct_show_call_to_action() {
	genesis_widget_area( 'call-to-action', array(
			'before' => '<div class="cta-widget"><div class="wrap">',
			'after'  => '</div></div>',
		) );
}


 genesis();