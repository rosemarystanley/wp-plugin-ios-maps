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

if ( ! defined( 'IOSM_PLUGIN_DIR' ) )
	define( 'IOSM_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( IOSM_PLUGIN_DIR . "/includes/widget.php" );

function maps() {
	wp_register_script( 'maps', IOSM_PLUGIN_DIR . 'js/maps.js', array('jquery') );
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

// Register the widget
function ios_maps_register_widget()  {
	register_widget( "ios_maps_widget" );

}
add_action( 'widgets_init', 'ios_maps_register_widget');