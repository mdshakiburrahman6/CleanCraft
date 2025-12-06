<?php

// Add Menu
register_nav_menu('main_menu', __('Primary Menu', 'cleancraft'));


// Header Customizer
function cleancraft_header($wp_customize){
    $wp_customize->add_section('cleancraft_header_customizer', array(
        'title' => 'CleanCraft Header',
        'description' => 'You can change CleanCraft Theme header from here',
    ));
    $wp_customize->add_setting('cleancraft_logo', array(
        'default' => get_bloginfo('template_directory') . '/assets/img/logo.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cleancraft_logo', array(
        'label' => 'CleanCraft Logo',
        'description' => 'Chnage logo from here',
        'section' => 'cleancraft_header_customizer',
        'setting' => 'cleancraft_logo',
    )));
}
add_action('customize_register','cleancraft_header');