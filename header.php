<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add WP HEADER -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <header class="header">           
        <div class="container">
            <div class="row">
                <nav class="nav d-flex justify-content-between align-items-center" id="nav">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="<?php  ?>"><img src="<?php echo get_theme_mod('cleancraft_logo') ?>" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="menus font-primary">
                           
                            <?php 
                                wp_nav_menu( array(
                                    'Theme_location' => 'main_menu',
                                    'menu_id' => 'main-menu',
                                )); 
                            ?>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </header>