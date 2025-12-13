<?php get_header(); ?>

<main>
    <section class="article-single">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                <?php if ( have_posts() ) : 
                    while ( have_posts() ) : the_post();

                    // Get custom meta
                    $article_overview = get_post_meta(get_the_ID(), '_article_overview', true);
                    $article_details  = get_post_meta(get_the_ID(), '_article_details', true);
                    $article_gallery  = get_post_meta(get_the_ID(), '_article_galery', true);
                ?>

                    <!-- Article Title -->
                    <h1 class="article-title"><?php the_title(); ?></h1>

                    <!-- Featured Image -->
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="article-featured">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Article Overview -->
                    <?php if ( ! empty($article_overview) ) : ?>
                        <div class="article-overview">
                            <h3>Overview</h3>
                            <?php echo wp_kses_post($article_overview); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Article Details -->
                    <?php if ( ! empty($article_details) ) : ?>
                        <div class="article-details">
                            <h3>Details</h3>
                            <?php echo wp_kses_post($article_details); ?>
                        </div>
                    <?php endif; ?>

                    <!-- Article Gallery -->
                    <?php if ( ! empty($article_gallery) ) : 
                        $images = explode(',', $article_gallery);
                    ?>
                        <div class="article-gallery">
                            <h3>Gallery</h3>

                            <div class="gallery-grid">
                                <?php foreach ( $images as $image_id ) : ?>
                                    <div class="gallery-item">
                                        <?php echo wp_get_attachment_image($image_id, 'large'); ?>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                <?php 
                    endwhile;
                endif; 
                ?>

                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>
