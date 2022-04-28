<?php

//========================================
    
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Theme General Settings',
        'menu_title'	=> 'Theme Settings',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));        
}

//========================================

    function cc_mime_types($mimes) {
        $mimes['svg'] = 'image/svg+xml';
        return $mimes;
    }
    add_filter('upload_mimes', 'cc_mime_types');

//================================


    add_filter('acf/format_value/type=textarea', 'do_shortcode');

//================================


function enable_frontend_dashicons() {
    wp_enqueue_style( 'dashicons' );
  }
  add_action( 'wp_enqueue_scripts', 'enable_frontend_dashicons' );


  //================================





  //================================
  //================================