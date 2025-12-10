<?php

// Register Footer Menu
function cleancraft_footer_menus_register() {
    register_nav_menus(array(
        'footer_menu'     => __('Footer Menu', 'cleancraft'),
        'secondary_menu'  => __('Secondary Menu', 'cleancraft'),
    ));
}
add_action('after_setup_theme', 'cleancraft_footer_menus_register');

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

    
    // Footer Social Link Customizer
    $wp_customize->add_setting('cleancraft_footer_social', array(
        'default' => 'FB, IN, INSTA, YT',
    ));
    $wp_customize->add_control('cleancraft_footer_social', array(
        'label' => 'Social Links',
        'description' => 'Chnage Footer Social Links from here',
        'section' => 'cleancraft_footer_customizer',
        'setting' => 'cleancraft_footer_social',
        'type' => 'select',
        'choices' => array(
            '<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i>'           => 'FB, IN, INSTA, YT',

            '<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>'     => 'FB, IN, INSTA',

            '<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>'     => 'FB, INSTA',

            '<a href="#"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="#"><i class="fa-brands fa-instagram"></i></a>
            <a href="#"><i class="fa-brands fa-youtube"></i>'           => 'FB, INSTA, YT',
        )
    ));

}
add_action('customize_register', 'cleancraft_footer');

