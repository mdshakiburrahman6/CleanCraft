<!-- Include Header -->
<?php get_header(); ?>

<main>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="post-cards">

                        <?php 
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                        ?>

                            <article class="blog secondury-font">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>

                                <a href="<?php the_permalink(); ?>">
                                    <h5 class="blog-title"><?php the_title(); ?></h5>
                                </a>

                                <p class="blog-excerpt">
                                    <?php the_excerpt(); ?>
                                </p>
                            </article>

                        <?php 
                            endwhile;
                        else:
                            echo 'No post found';
                        endif; 
                        ?>

                    </div>
                </div>
                <div class="col-md-2">
                    <h3>Sidebar</h3>
                    <br>
                    <p><strong>Total Artcle : </strong> <span><?php echo wp_count_posts('article')->publish; ?></span> </p>
                </div>
            </div>
        </div>
    </section>
</main>

<!-- Include Footer -->
<?php get_footer(); ?>
