<?php

/*
    Template Name: Repeater Manager 
*/ 

    // Text, Editor, Radio, Image, Gallery - Repeators

//  1. Register Post Type
function cleancraft_repeater(){
    $labels = array(
        'name' => 'Repeater',
        'singular_name' => 'Repeater',
        'not_found' => 'No Dara Found!',
    );
    $args = array(
        'labels' =>  $labels,
        'menu_icon' => 'dashicons-update',
        'has_archive' => false,
        'public' => true,
        'rewrite' => array('slug' => 'repeater'),
        'supports' => array(''), // If no Support Needed
    );
    register_post_type('repeater', $args);
}
add_action('init', 'cleancraft_repeater');



//  2. Add Meta Box
function cleancraft_repeater_meta_box(){
    add_meta_box(
        'repeater_id',
        'Repeater Details',
        'cleancraft_repeater_callback',
        'repeater',
        'normal',
        'high',
    );
}
add_action('add_meta_boxes','cleancraft_repeater_meta_box');



//  3. Meta Box Callback (Dahsboard - UI)