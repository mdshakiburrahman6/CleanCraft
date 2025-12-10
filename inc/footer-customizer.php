<?php

// Register Footer Menu
register_nav_menu('footer_menu', __('Footer Menu', 'cleancraft'));


// Footer Custoimzer
function cleancraft_footer($wp_customize){
     // Logo Customizarion
    $wp_customize->add_section('cleancraft_footer_customizer', array(
        'title' => 'CleanCraft Footer',
        'description' => 'You can change CleanCraft Theme Footer from here',
    ));
    $wp_customize->add_setting('cleancraft_footer_logo', array(
        'default' => get_template_directory_uri('template_directory') . '/assets/img/logo-w.png',
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cleancraft_footer_logo', array(
        'label' => 'CleanCraft Footer Logo',
        'description' => 'Chnage logo from here',
        'section' => 'cleancraft_footer_customizer',
        'setting' => 'cleancraft_footer_logo',
    )));

    
}
add_action('customize_register', 'cleancraft_footer');

