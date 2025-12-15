<?php

// Register Custome Post Type
function cleanCraft_custome_post(){
    register_post_type('portfolio', array(
        'labels' => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
            'add_new' => 'Add New Portfolio',
            'add_new_item' => 'Add New Portfolio',
            'view_item' => 'View Portfolio',
            'edit_item' => 'Edit Portfolio',
            'not_found' => 'No portfolio found!!!',
        ),
        'menu_icon' =>'dashicons-money',
        'menu_position' => '6',
        'show_ui' => true,
        'public' => true,
        'publicly_queryable' => true,
        'has_archive' => true,
        'exclude_from_search' => true,
        'hierarchial' => false,
        'capability_type' => 'post',
        'rewrite' => array('slug' => 'portfolio'),
        'supports' => array('title', 'thumbnail', 'excerpt', 'editor'),
    ));
}
add_action('init', 'cleanCraft_custome_post');

// ===========================
// Add Meta box for Portfolio
// ==========================

// Register Metabox
function cleancraft_portfolio_add_meta_box(){
    add_meta_box(
        'portfolio_metaa_box_id',  // id
        'Portfolio Details', // Title
        'cleancraft_portfolio_meta_box_field', //Callback
        'portfolio', // post type
        'side', // position
        'low' // Priority
    );
}
add_action('add_meta_boxes', 'cleancraft_portfolio_add_meta_box');


// Meta box fields
function cleancraft_portfolio_meta_box_field($post){

    // Get old Value
    $port_auth_name = get_post_meta($post->ID, 'cleancraft_portfolio_auth_name', true);

    ?>
        <p>
            <label for="cleancraft_portfolio_auth_name"></label>
            <input style="width: 100%;" name="cleancraft_portfolio_auth_name" type="text" placeholder="Author Name" value="<?php echo esc_attr($port_auth_name ); ?>">
        </p>
    <?php
}

// Save MetaBox 
function cleancraft_meta_boxes_data_save($post_id){
    if(array_key_exists('cleancraft_portfolio_auth_name', $_POST)){
        update_post_meta($post_id, 'cleancraft_portfolio_auth_name', sanitize_text_field( $_POST['cleancraft_portfolio_auth_name'] ));
    }
}
add_action('save_post', 'cleancraft_meta_boxes_data_save');



// ------------------------------------------------------------------------------------------------------------
// Services 
//-------------------------------------------------------------------------------------------------------------
function cleancraft_custom_post_service(){
    register_post_type('service', array(
        'labels' => array(   // Labels
            'name'          => 'Service',
            'singular_name' => 'Service',
            'add_new'       => 'Add New Service',
            'add_new_item'  => 'Add New Service',
            'edit_item'     => 'Edit Service',
            'view_item'     => 'View Service',
            'new_item'      =>  'New Service',
            'not_found'     => 'No services found!! Please create a new service.',
        ),
        'menu_icon'             => 'dashicons-editor-kitchensink',  // args
        'meni_position'         => 7,
        'public'                => true,
        'publicly_queryable'    => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'taxonomies'            => array('category','post_tag'),
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'service'),
        'supports'              => array('title','thumbnail','editor','excerpt'),
    ));
}
add_action('init', 'cleancraft_custom_post_service');


/* // Register Meta box - service
function cleancraft_service_meta_box(){
    add_meta_box(
        'service_id',
        'Service Image',
        'cleancraft_service_meta_field',
        'service',
        'side',
        'low',
    );
}
add_action('add_meta_boxes', 'cleancraft_service_meta_box');


function cleancraft_service_meta_field($post){
    // Get Old Data
    $service_image = get_post_meta($post->ID, 'service_image', true);

    // HTML Meta Fields
    ?>
        <label for="service_image">Service Image</label>
        <input name="service_image" type="file" value="<?php echo esc_attr( $service_image ); ?>">
    <?php
}

function cleancraft_service_meta_field_save($post_id){
    if(array_key_exists('service_image', $_POST)){
        update_post_meta($post_id, 'service_image', sanitize_post_field( $_POST['service_image']));
    }
}
add_action('save_post','cleancraft_service_meta_field_save');

*/ 
//


// ------------- Service Meta Box ------------------- //

// ------------- Service Meta Box ------------------- //
function cleancraft_service_meta_box(){
    add_meta_box(
        'service_id',
        __('Service Image', 'cleancraft'),
        'cleancraft_service_meta_field',
        'service',
        'side',
        'low'
    );
}
add_action('add_meta_boxes', 'cleancraft_service_meta_box');

function cleancraft_service_meta_field($post){
    // nonce for security
    wp_nonce_field('cleancraft_service_image_nonce', 'cleancraft_service_image_nonce_field');

    // Get saved attachment ID (we store attachment ID)
    $attachment_id = get_post_meta($post->ID, '_service_image_id', true);

    // If we have an attachment id, get the image HTML for preview
    $image_html = $attachment_id ? wp_get_attachment_image($attachment_id, 'medium') : '';

    ?>
    <div class="cleancraft-service-image-wrapper">
        <div class="service-image-preview"><?php echo $image_html; ?></div>

        <input type="hidden" name="service_image_id" id="service_image_id" value="<?php echo esc_attr( $attachment_id ); ?>">

        <p>
            <a href="#" class="button button-secondary" id="cleancraft_set_service_image"><?php _e('Choose Image', 'cleancraft'); ?></a>
            <a href="#" class="button button-secondary" id="cleancraft_remove_service_image" <?php echo $attachment_id ? '' : 'style="display:none"'; ?>><?php _e('Remove Image', 'cleancraft'); ?></a>
        </p>
    </div>
    <?php
}

// Save handler
function cleancraft_service_meta_field_save($post_id){
    // autosave / permissions / nonce checks
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can('edit_post', $post_id) ) return;
    if ( ! isset($_POST['cleancraft_service_image_nonce_field']) ) return;
    if ( ! wp_verify_nonce($_POST['cleancraft_service_image_nonce_field'], 'cleancraft_service_image_nonce') ) return;

    // Save attachment ID (or delete if empty)
    if ( isset($_POST['service_image_id']) && '' !== $_POST['service_image_id'] ) {
        $attachment_id = intval( $_POST['service_image_id'] );
        update_post_meta($post_id, '_service_image_id', $attachment_id);
    } else {
        delete_post_meta($post_id, '_service_image_id');
    }
}
add_action('save_post','cleancraft_service_meta_field_save');

// Enqueue admin scripts for media uploader (only where needed)
function cleancraft_admin_enqueue_media_script($hook){
    global $post;

    if ( in_array($hook, array('post.php','post-new.php')) && isset($post) && $post->post_type === 'service' ) {

        wp_enqueue_media();

        wp_enqueue_script(
            'cleancraft-service-meta-js',
            get_template_directory_uri() . '/assets/js/cleancraft-service-meta.js',
            array('jquery'),
            '1.0',
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'cleancraft_admin_enqueue_media_script');



/* Register Custom Taxonomy for services */
function cleancraft_service_custom_taxonomy(){
    $labels = array(
        'name' => 'Service Type',
        'singular_name' => 'Service Type',
        'add_new' => 'Add New Service Type',
        'add_new_item' => 'Add New Service Type',
        'view_item' => 'View Service Type',
        'new_item' => 'New Service Type',
        'edit_item' => 'Edit Service Type',
        'all_items' => 'All Service Types',
        'update_item' => 'Update Service Type',
        'search_items' => 'Search Service Types',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,   // True For Category & False for Tag
        'show_ui' => true,
        'show_admin_column' => true,
        'rewrite' => array('slug' => 'service_type'),
    );
    register_taxonomy('service_type', array('service'), $args);
}
add_action('init','cleancraft_service_custom_taxonomy');










/*   =============================================================
                        Custom Post Type = Article
==============================================================   */ 

// 1. Register Post Type
function cleancraft_article(){
    $labels = array(
        'name' => 'Article',
        'singular_name' => 'Article',
        'all_items' => 'All Articles',
        'new_item' => 'New Article',
        'edit_item' => 'Edit Article',
        'view_item' => 'View Article',
        'add_new'  => 'Add New Article',
        'add_new_item' => 'Add New Article',
        'not_found' => 'No Article found!! Please add a Article.',
    );
    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-id-alt',
        'menu_position'         => 8,
        'public'                => true,
        'publicly_queryable'    => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'article'),
        'supports'              => array('title','thumbnail','excerpt'),
        'taxonomies'            => array('category','post_tag'),
    );
    register_post_type('article', $args );
}
add_action('init', 'cleancraft_article');



//  2. Add Custome Meta Box
function cleancraft_article_meta_boxes(){
    add_meta_box(
        'article_meta_boxes',
        'Article Content',
        'article_meta_boxes_callback',
        'article',
        'normal',
        'high',
    );
}
add_action('add_meta_boxes', 'cleancraft_article_meta_boxes');



// 3. Display Multiple Editors
function article_meta_boxes_callback($post){
    
    // Add wp_nonce_field
    wp_nonce_field('article_meta_boxes_nonce', 'article_meta_boxes_nonce_fields');

    $article_overview = get_post_meta($post->ID, '_article_overview', true);
    $article_details = get_post_meta($post->ID, '_article_details', true);
    $article_galery = get_post_meta($post->ID, '_article_galery', true);

    ?>
        <p><strong>Article Overview</strong></p>
        <?php wp_editor($article_overview, 'article_overview', array(
            'textarea_name' => 'article_overview',
            'textarea_rows' => 6,
            'media_buttons' => true,
        )); ?>
    <?php

    ?>
        <p><strong>Article Details</strong></p>
        <?php wp_editor($article_details, 'article_details', array(
            'textarea_name' => 'article_details',
            'textarea_rows' => 10,
            'media_buttons' => true,
        )) ?>
    <?php

    ?>
        <p><strong>Article Galery</strong></p>
        <div id="gallery_wrapper" class="">
            <ul id="article_image_galery" style="display: flex; flex-wrap: wrap; gap: 20px;">
                <?php
                    if(!empty($article_galery)){
                        $images = explode(',', $article_galery);

                        foreach($images as $image){
                            echo '<li>' . wp_get_attachment_image($image, 'thumbnail') . '</li>';
                        }
                    } 
                ?>
            </ul>
        </div>

        <input type="hidden" name="article_galery" id="article_galery" value="<?php echo esc_attr( $article_galery ); ?>">
        <button type="button" class="article_galery_button" id="article_galery_button">Add</button>
    <?php
}


// 4. Save Meta Fields
function cleancraft_article_save($post_id){

    if(!isset($_POST['article_meta_boxes_nonce_fields']) || !wp_verify_nonce($_POST['article_meta_boxes_nonce_fields'], 'article_meta_boxes_nonce')){
        return;
    }

    if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return;
    }

    if(!current_user_can('edit_post', $post_id)){
        return;
    }

    $fields = array(
        'article_overview' => '_article_overview',
        'article_details' => '_article_details',
    );

    // For Save Editors
    foreach ($fields as $field => $meta_key){
        if(isset($_POST[$field])){
            update_post_meta( $post_id, $meta_key, wp_kses_post( $_POST[$field] ) );
        }
    }

    // For Save Image
    if(isset($_POST['article_galery'])){
        update_post_meta($post_id, '_article_galery', sanitize_text_field( $_POST['article_galery'] ));
    }

}
add_action('save_post','cleancraft_article_save');


// 5. Article Image Admin Enqueue
function cleancraft_article_admin_media($hook){
    global $post;

    if (in_array($hook, array('post.php','post-new.php')) && isset($post) && $post->post_type === 'article') {
            wp_enqueue_media();
            wp_enqueue_script(
                'article-gallery-js',
                get_template_directory_uri() . '/assets/js/article-gallery.js',
                array('jquery'),
                '1.0',
                true
        );
    }
}
add_action('admin_enqueue_scripts', 'cleancraft_article_admin_media');




/*===================================================================
                        Post Type Question
===================================================================*/

// 1. Register Post Type
function cleancraft_questions_faq(){
    $labels = array(
        'name' => 'FAQ',
        'singular_name' => 'FAQ',
        'all_items' => 'All FAQs',
        'new_item' => 'New FAQ',
        'edit_item' => 'Edit FAQ',
        'view_item' => 'View FAQ',
        'add_new'  => 'Add New FAQ',
        'add_new_item' => 'Add New FAQ',
        'not_found' => 'No FAQ found!! Please add a FAQ.',
    );
    $args = array(
        'labels' => $labels,
        'menu_icon' => 'dashicons-editor-help',
        // 'menu_position'         => 8,
        'public'                => true,
        'publicly_queryable'    => true,
        'has_archive'           => true,
        'exclude_from_search'   => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'article'),
        'supports'              => array('title','thumbnail','excerpt'),
        'taxonomies'            => array('category','post_tag'),
    );
    register_post_type('faq', $args );
}
add_action('init', 'cleancraft_questions_faq');


// 2. Add Meta Box
function cleancraft_faq_add_meta_box(){
    add_meta_box(

        'cleancraft_faq_id',
        'cleancraft_faq',
        'cleancraft_faq_callback',
        'faq',
        'normal',
        'high',
    );
}
add_action('add_meta_boxes', 'cleancraft_faq_add_meta_box');


// 3. 

