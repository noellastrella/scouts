<?php


add_action( 'init', 'create_subjects_hierarchical_taxonomy', 0 );
 
//create a custom taxonomy name it subjects for your posts
 
function create_subjects_hierarchical_taxonomy() {
 
// Add new taxonomy, make it hierarchical like categories
//first do the translations part for GUI
 
  $labels = array(
    'name' => _x( 'Dens', 'taxonomy general name' ),
    'singular_name' => _x( 'Den', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Dens' ),
    'all_items' => __( 'All Dens' ),
    'parent_item' => __( 'Parent Den' ),
    'parent_item_colon' => __( 'Parent Den:' ),
    'edit_item' => __( 'Edit Den' ), 
    'update_item' => __( 'Update Den' ),
    'add_new_item' => __( 'Add New Den' ),
    'new_item_name' => __( 'New Den Name' ),
    'menu_name' => __( 'Dens' ),
  );    
 
// Now register the taxonomy
  register_taxonomy('dens',array('packs'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_in_rest' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'den' ),
  ));
 
}
