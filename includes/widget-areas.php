<?php 

// Add support for new widget area
genesis_register_widget_area(array(
	'id'          => 'home-welcome',
	'name'        => __( 'Home Welcome', 'first-genesis-child-theme' ),
	'description' => __( 'Home widget area that will show on the home page', 'first-genesis-child-theme' )
));


genesis_register_widget_area(array(
	'id'          => 'call-to-action',
	'name'        => __( 'Call to Action', 'first-genesis-child-theme' ),
	'description' => __( 'CTA widget area that will show on the home page', 'first-genesis-child-theme' )
));