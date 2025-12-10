    <footer class="footer-area">
        <div class="container">
            <div class="row">
                    <div class="col-md-3">
                        <div class="footer-container d-flex flex-column justify-content-start align-items-start gap-3">
                            <a class="d-flex justify-content-start align-items-start" href="<?php echo home_url( ); ?>"><img class="footer_logo" src="<?php echo get_theme_mod('cleancraft_footer_logo') ?>" alt="Logo"></a>
                            <p class="text-white"><?php echo get_theme_mod('cleancraft_footer_tag') ?></p>
                        </div>
                    </div>
                    <div class="col-md-3 ml-4">
                        <div class="footer-container quick_links">
                            <h3>Quick Links</h3>
                            <!-- <div class="footer-menu"> -->
                                <?php 
                                    wp_nav_menu( [
                                                    'theme_location' => 'footer_menu',
                                                    'menu_class'     => 'footer-menu',
                                                    'fallback_cb'    => false,
                                                ]); 
                                ?>
                                <!-- <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">About</a></li>
                                    <li><a href="#">Portfolio</a></li>
                                    <li><a href="#">Blog</a></li>
                                    <li><a href="#">Contact</a></li>
                                </ul> -->
                            <!-- </div> -->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-container">
                            <h3>Extra Pages</h3>
                            <div class="footer-menu">
                                <?php 
                                    wp_nav_menu( [
                                                    'theme_location' => 'secondary_menu',
                                                    'menu_class'     => 'footer-menu',
                                                    'fallback_cb'    => false,
                                                ]); 
                                ?>
                                <!-- <ul>
                                    <li><a href="#">Cookie Policy</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
                                    <li><a href="#">Terms & Condition</a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-container">
                            <h3>Social Links</h3>
                            <div class="social-links">
                                <?php echo get_theme_mod('cleancraft_footer_social'); ?>
                                <!-- <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                <a href="#"><i class="fa-brands fa-youtube"></i> -->
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <div class="container">
             <div class="row">
                <div class="col-md-12">
                    <p class="d-flex justify-content-center align-items-center text-white">  </p>
                </div>
            </div>
        </div>
    </footer>

<?php wp_footer();?>
</body>
</html>



<section class="d-flex justify-content-between align-items-start">
                        