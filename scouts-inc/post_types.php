<?php
$labels = array(
    "name" => "Pack Events",
    "singular_name" => "Pack Event",
);

$args = array(
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "slug" => 'events',
    "show_ui" => true,
    "has_archive" => true,
    "show_in_menu" => true,
    "show_in_nav_menus " => true,
    "exclude_from_search" => false,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => false,
    'menu_icon' => 'dashicons-calendar-alt',
    "rewrite" => array("slug" => "events", "pack160_events" => true),
    "query_var" => true,
    "supports" => array("title", "excerpt", "trackbacks", "custom-fields", "revisions", "thumbnail",
        "author", "page-attributes"),);

register_post_type("pack160_events", $args);


// ==========================================================================================

$labels = array(
    "name" => "Dens",
    "singular_name" => "Den",
);
$args = array(
    "labels" => $labels,
    "description" => "",
    "public" => true,
    "slug" => 'dens',
    "show_ui" => true,
    "has_archive" => false,
    "show_in_menu" => true,
    "show_in_nav_menus " => true,
    "exclude_from_search" => false,
    "capability_type" => "page",
    "map_meta_cap" => true,
    "hierarchical" => false,
    'menu_icon' => 'dashicons-pets',
    "rewrite" => array("slug" => "dens", "pack160_dens" => true),
    "query_var" => true,
    "supports" => array("title", "excerpt", "trackbacks", "custom-fields", "revisions", "thumbnail",
        "author", "page-attributes"),);

register_post_type("pack160_dens", $args);

