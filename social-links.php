<?php
/**
 * Plugin Name: Social Links
 * Description: Social links widget.
 * Version: 1.0.0
 * Author: Shmuli Markel
 * Author URI: http://shmulimarkel.com/
 * Tested up to: 4.4.0
 **/

// exit if plugin accessed directly
if( !defined( 'ABSPATH' ) ) exit;

// load scripts
require_once( plugin_dir_path(__FILE__) . '/includes/social-links-class.php' );
require_once( plugin_dir_path(__FILE__) . '/includes/social-links-scripts.php' );

// register widget
function register_sl_widget(){
  register_widget( 'Social_Links_Widget' );
}
add_action( 'widgets_init', 'register_sl_widget' );