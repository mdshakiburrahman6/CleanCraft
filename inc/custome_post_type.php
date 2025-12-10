<?php

// Register Custome Post Type
function cleanCraft_custome_post(){
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'add_new' => 'Add New Portfolio',
            'add_new_item' => 'Add New Portfolio',
            'view_item' => 'View Portfolio',
            'edit_item' => 'Edit Portfolio',
            'not_found' => 'No portfolio found!!!',
        ),
        'menu_icon' =>'dashicons-money',
        'menu_position' => '6',
        'show_ui' => true,
        'public' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'hierarchial' => false,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
    ));
}
add_action('init', 'cleanCraft_custome_post');