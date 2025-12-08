<?php

// Add Menu
register_nav_menu('main_menu', __('Primary Menu', 'cleancraft'));


// Header Customizer
function cleancraft_header($wp_customize){

    // Logo Customizarion
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

    // Menu Position
    // $wp_customize->add_setting('cleancraft_menu', array(
    //     'default' => 'right_menu',
    // ));
    // $wp_customize->add_control('cleancraft_menu', array(
    //     'label' => 'CleanCraft Menu',
    //     'description' => 'Chnage menu position from here',
    //     'section' => 'cleancraft_header_customizer',
    //     'setting' => 'cleancraft_menu',
    //     'type' => 'radio',
    //     'option' => array(
    //         'left_menu' => 'Left Menu',
    //         'right_menu' => 'Right Menu',
    //     ),
    // ));

}
add_action('customize_register','cleancraft_header');