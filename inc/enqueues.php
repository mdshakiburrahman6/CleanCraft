<?php

// Enqueue CSS & jQuerry & JS & Fonts
function cleancraft_enqueues(){

    // Enqueue Main CSS (style.css)
    wp_enqueue_style('cleancraft_main_css', get_stylesheet_uri(), array(), '1.0.0', 'all');

    // Enqueue Custome CSS
    wp_register_style('cleancract_custome_css', get_template_directory_uri() . '/assets/css/custome.css' , array(), '1.0.0', 'all');
    wp_enqueue_style('cleancract_custome_css');

    // Enqueue Bootstrap CSS
    wp_register_style('cleancraft_bootstrap_css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css');
    wp_enqueue_style('cleancraft_bootstrap_css');

    //===========================//
    
    // Enqueue jQuerry
    wp_enqueue_script('jquery');

    // Enqueue Bootstrap JS
    wp_register_script('cleancraft_bootstrap_js','https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js');
    wp_enqueue_script('cleancraft_bootstrap_js');

    //===========================//

    // Enqueue Fonts
    wp_register_style('cleancrafr_font','https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');
    wp_enqueue_style('cleancrafr_font');

}
add_action('wp_enqueue_scripts', 'cleancraft_enqueues');