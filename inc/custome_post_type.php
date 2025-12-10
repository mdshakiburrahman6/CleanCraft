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
        'labels' => array(
            'name'          => 'Service',
            'singular_name' => 'Service',
            'add_new'       => 'Add New Service',
            'add_new_item'  => 'Add New Service',
            'edit_item'     => 'Edit Service',
            'view_item'     => 'View Service',
            'new_item'      =>  'New Service',
            'not_found'     => 'No services found!! Please create a new service.',
        ),
        'manu_icon'             => 'dashicons-editor-kitchensink',
        'meni_posotion'         => 7,
        'public'                => true,
        'publicly_queryable'    => true,
        'has_arcihve'           => true,
        'cxclude_from_search'   => true,
        'hierarchical'          => false,
        'show_ui'               => true,
        'capability_type'       => 'post',
        'rewrite'               => array('slug' => 'service'),
        'supports'              => array('title','thumbnail','editor','excerpt'),
    ));
}
add_action('init', 'cleancraft_custom_post_service');