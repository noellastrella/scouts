<?php

function mff_MIDI_styles() {    
    wp_enqueue_style( 'style1', get_stylesheet_directory_uri() . '/css/main.css');
}
add_action( 'wp_enqueue_scripts', 'mff_MIDI_styles' );
