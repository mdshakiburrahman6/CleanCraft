<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Add WP HEADER -->
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
    <header>           
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <nav class="nav d-flex justify-content-between" id="nav">
                        <div class="logo">
                            <a href="<?php  ?>"><img src="<?php  ?>" alt="Logo"></a>
                        </div>
                        <div class="menus font-primary">
                           
                        <?php 
                            wp_nav_menu( array(
                                'Theme_location' => 'main_menu',
                                'menu_id' => 'main-menu',
                            )); 
                        ?>
                        
                        <!-- <ul class="">
                                <li><a href="#">Home</a></li>
                                <li><a href="#">About</a></li>
                                <li><a href="#">Portfolio</a></li>
                                <li><a href="#">Galery</a></li>
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul> -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>