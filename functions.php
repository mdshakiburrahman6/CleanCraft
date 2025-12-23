<?php

// =======================
// Theme Function File
//=======================

// include Default 
include_once 'inc/default.php';

// include Enqueues
include_once 'inc/enqueues.php';

// include Header Customizer
include_once 'inc/header_customizer.php';

// include Footer Customizer
include_once 'inc/footer-customizer.php';

// include Post Manager
include_once 'inc/post_manager.php';

// include Custome Post
include_once 'inc/custome_post_type.php';
 
// include Q&A Register
include_once 'inc/question_form.php';

// include Q&A Register
include_once 'inc/repeater_manager.php';






/* ================= Custom From ======================  */ 

// Add CPT
function msr_custom_form(){
     $labels = array(
        'name' => 'Advance From',
        'not_found' => 'No Dara Found!',
    );
    $args = array(
        'labels' =>  $labels,
        'menu_icon' => 'dashicons-email-alt2',
        'show_ui'     => true,
        'public' => false,
        'capabilities' => array('create_posts' => 'do_not_allow',),
        'supports' => array('title'),
        'map_meta_cap' => true,
    );
    register_post_type('advance_form', $args);
} 
add_action('init', 'msr_custom_form');


// 2. Remove Edit Option
function msr_custom_form_remove_edit(){
    remove_post_type_support('advance_form', 'editor');
}
add_action('init', 'msr_custom_form_remove_edit');


// 3. Disable Quick Edit & Bulk Actions
add_filter('post_row_actions', function($actions, $post){
    if ($post->post_type === 'advance_form') {
        unset($actions['edit']);
        unset($actions['inline hide-if-no-js']);
        unset($actions['trash']);
    }
    return $actions;
}, 10 , 2 );


// 4. Lock Post Status
function msr_custom_form_disable_update() {
    global $post_type;
    if ($post_type === 'advance_form') {
        echo '<style>
            #publish, #minor-publishing-actions { display:none; }
        </style>';
    }
}
add_action('admin_head', 'msr_custom_form_disable_update');


// 5. Show Submitted Data
function msr_custom_form_meta_box() {
    add_meta_box(
        'msr_custom_form_view',
        'Submitted Information',
        'msr_custom_form_callback',
        'advance_form',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'msr_custom_form_meta_box');



//6. Call Back Fucntion
function msr_custom_form_callback($post) {
    echo '<p><strong>Name:</strong> ' . esc_html($post->post_title) . '</p>';
    echo '<p><strong>Email:</strong> ' . esc_html(get_post_meta($post->ID, 'msr_email', true)) . '</p>';
    echo '<p><strong>Message:</strong><br>' . esc_html(get_post_meta($post->ID, 'msr_message', true)) . '</p>';
}




function msr_handle_frontend_form() {

    if (!isset($_POST['msr_submit_form'])) {
        return;
    }

    // Security check
    if (
        !isset($_POST['msr_contact_nonce']) ||
        !wp_verify_nonce($_POST['msr_contact_nonce'], 'msr_contact_form_action')
    ) {
        return;
    }

    // Sanitize inputs
    $name    = sanitize_text_field($_POST['msr_name']);
    $email   = sanitize_email($_POST['msr_email']);
    $message = sanitize_textarea_field($_POST['msr_message']);

    // Insert post (submission)
    $post_id = wp_insert_post(array(
        'post_type'   => 'advance_form',
        'post_title'  => $name,
        'post_status' => 'publish',
    ));

    // Save meta
    if ($post_id) {
        update_post_meta($post_id, 'msr_email', $email);
        update_post_meta($post_id, 'msr_message', $message);
    }

}
add_action('init', 'msr_handle_frontend_form');
