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

    // Footer Tag Customizer
    $wp_customize->add_setting('cleancraft_footer_tag', array(
        'default' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum id vero quod earum aliquam. Sint deleniti officiis voluptatibus vel iure.',
    ));
    $wp_customize->add_control('cleancraft_footer_tag', array(
        'label' => 'CleanCraft Footer Tag',
        'description' => 'Chnage Footer tag from here',
        'section' => 'cleancraft_footer_customizer',
        'setting' => 'cleancraft_footer_tag',
    ));

    
   

}
add_action('customize_register', 'cleancraft_footer');

