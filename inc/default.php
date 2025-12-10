<?php

// ===========================
// Theme Deafult File
// ===========================

function cleancraft_theme_setup() {

    // Add Title Support
    add_theme_support('title-tag');

    // Add Thumbnail Support for multiple post types
    add_theme_support('post-thumbnails', array('page', 'post', 'portfolio', 'service'));

}
add_action('after_setup_theme', 'cleancraft_theme_setup');
