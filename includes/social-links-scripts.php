<?php

function sl_add_scripts(){
  wp_enqueue_style( 'sl-stlyes-css', plugins_url() . '/social-links/css/styles.css' );
  wp_enqueue_script( 'sl-main-js', plugins_url() . '/social-links/js/main.js' );
}
add_action( 'wp_enqueue_scripts', 'sl_add_scripts' );