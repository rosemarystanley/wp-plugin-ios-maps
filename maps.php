<?php
/**
 * Plugin Name: iOS Maps
 * Plugin URI: http://mrs.dohpaz.com
 * Description: Simple plugin to convert your Google maps links to open in Maps App for iOS devices
 * Version: 0.1
 * Author: Rosemary Stanley
 * Author URI: http://mrs.dohpaz.com
 * License: GPL2
 */

// Prohibit direct script loading.
defined( 'ABSPATH' ) || die( 'No direct script access allowed!' );

function maps() {
	wp_register_script( 'maps', plugin_dir_url('maps') . 'mrsd-ios-maps/js/maps.js', array('jquery') );
	wp_enqueue_script( 'maps' );
}

add_action('init', 'maps');

function ios_maps( $atts, $content = null ) {
	extract( shortcode_atts( array(
		'address' => '',
		'text' => '',
		'show_map' => false,
	), $atts ) );
	
	if ($text == '') $text = $address; 

	$output = '<a href="https://www.google.com/maps/dir//' . str_replace(' ', '+', htmlentities($address)) . '" class="mapLink" target="_blank">';
	$output .= $text;
	$output .= '</a>';

	return $output;
}

add_shortcode('ios_maps', 'ios_maps');
