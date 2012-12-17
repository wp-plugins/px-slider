<?php
/*
Plugin Name:PX Slider
Plugin URI: 
Description: This plugin creates a Px slider with multiple background.
Author: Nishant Jain, rahulbrilliant2004, tikendramaitry
Version: 1.0.1
Author URI: http://www.wpfruits.com
*/
// ----------------------------------------------------------------------------------
// include all required files
include_once('inc/admin/pxups.php');
include_once('scripts.php');
include_once('inc/admin/px_admin-options.php');
// Add slider default options in database
function pxslider_defaults(){
	    $default = array(
    	'cat_id' => 1,
    	'no_of_posts' =>3,
		'bglayerSet' =>'Set-1',
		'customBgs'=> 'false',
		'bg1url'=>plugins_url('images/slide1.jpg',__FILE__),
		'bg2url'=>plugins_url('images/slide1.jpg',__FILE__),	
		'bg3url'=>plugins_url('images/slide1.jpg',__FILE__),	
    	'auto_play' =>5000,
		'slide_speed' =>1000,
    	'thumbRotation' => 'true',
    	'navigation' => 'true',
		'circular' =>'true'
    );
return $default;
}
// Runs when plugin is activated and creates new database field
register_activation_hook(__FILE__,'pxslider_plugin_install');
function pxslider_plugin_install() {
    add_option('pxslider_options', pxslider_defaults());
}	
// Hook for adding admin menus
add_action('admin_menu', 'pxslider_plugin_admin_menu');
function pxslider_plugin_admin_menu() {
     add_menu_page('pxSlider', 'PxSlider','administrator', 'pxslider', 'pxslider_admin_page', plugins_url('inc/images/icon.png',__FILE__));
}
// get pxslider version
function pxs_get_version(){
	if (!function_exists( 'get_plugins' ) )
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	$plugin_folder = get_plugins( '/' . plugin_basename( dirname( __FILE__ ) ) );
	$plugin_file = basename( ( __FILE__ ) );
	return $plugin_folder[$plugin_file]['Version'];
}
// pxslider shortcode
function pxslider_shortcode() {
	ob_start();
	pxslider();
	$out1 = ob_get_contents();
	ob_end_clean();
	return $out1;
}
add_shortcode('pxslider','pxslider_shortcode');
include_once('inc/front/px_front.php');
//---------------------------------------------------------------------------------//
?>