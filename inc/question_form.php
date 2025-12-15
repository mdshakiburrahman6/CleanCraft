<?php
// =============================
// Register Post Type
// =============================
function cleancraft_question_from_register(){
    register_post_type('question_from', array(
        'labels' => array(
            'name' => 'Question Form',
            'singular_name' => 'Question Form',
        ),
        'public' => true,
        'menu_icon' => 'dashicons-format-status',
        'rewrite' => array('slug' => 'question_form'),
        'supports' => array('title'),
    ));
}
add_action('init', 'cleancraft_question_from_register');


// =============================
// Add Meta Box
// =============================
function cleancraft_question_from_meta_box(){
    add_meta_box(
        'question_from_id',
        'Question Builder',
        'cleancraft_question_from_meta_box_callback',
        'question_from',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'cleancraft_question_from_meta_box');


// =============================
// Enqueue Admin JS
// =============================
function cleancraft_question_form_admin_assets($hook){
    global $post;

    if (
        in_array($hook, ['post.php','post-new.php']) &&
        isset($post) &&
        $post->post_type === 'question_from'
    ) {
        wp_enqueue_script(
            'cleancraft-question-form-js',
            get_template_directory_uri() . '/assets/js/question-form-admin.js',
            ['jquery'],
            '1.0',
            true
        );
    }
}
add_action('admin_enqueue_scripts', 'cleancraft_question_form_admin_assets');


// =============================
// Meta Box UI
// =============================
function cleancraft_question_from_meta_box_callback($post){

    wp_nonce_field(
        'cleancraft_question_from_nonce',
        'cleancraft_question_from_nonce_field'
    );

    $questions = get_post_meta($post->ID, '_questions', true);
    $questions = is_array($questions) ? $questions : [];

    if ( empty($questions) ) {
        $questions[] = [
            'question' => '',
            'type'     => 'text',
            'answer'   => '',
            'options'  => [''],
        ];
    }
    ?>

    <div id="questions-wrapper">

        <?php foreach ($questions as $index => $q): ?>
            <div class="question-item" style="border:1px solid #ddd; padding:15px; margin-bottom:15px;">

                <label><strong>Question</strong></label>
                <input type="text"
                       name="qst[<?php echo $index; ?>][question]"
                       value="<?php echo esc_attr($q['question']); ?>"
                       style="width:100%;">

                <label><strong>Type</strong></label>
                <select name="qst[<?php echo $index; ?>][type]" class="qst-type">
                    <option value="text" <?php selected($q['type'],'text'); ?>>Text</option>
                    <option value="radio" <?php selected($q['type'],'radio'); ?>>Radio</option>
                </select>

                <!-- TEXT -->
                <div class="qst-text">
                    <input type="text"
                           name="qst[<?php echo $index; ?>][answer]"
                           value="<?php echo esc_attr($q['answer']); ?>"
                           placeholder="Short answer"
                           style="width:100%;">
                </div>

                <!-- RADIO -->
                <div class="qst-radio">
                    <?php foreach ($q['options'] as $opt): ?>
                        <input type="text"
                               name="qst[<?php echo $index; ?>][options][]"
                               value="<?php echo esc_attr($opt); ?>"
                               placeholder="Option"
                               style="width:100%; margin-bottom:6px;">
                    <?php endforeach; ?>

                    <button type="button" class="add-option button">Add Option</button>
                </div>

            </div>
        <?php endforeach; ?>

    </div>

    <button type="button" id="add-question" class="button button-primary">
        Add Question
    </button>
    <?php
}


// =============================
// Save Meta Data
// =============================
function cleancraft_question_save_meta($post_id){

    if ( get_post_type($post_id) !== 'question_from' ) return;
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;
    if ( ! current_user_can('edit_post', $post_id) ) return;

    if (
        ! isset($_POST['cleancraft_question_from_nonce_field']) ||
        ! wp_verify_nonce(
            $_POST['cleancraft_question_from_nonce_field'],
            'cleancraft_question_from_nonce'
        )
    ) return;

    if ( isset($_POST['qst']) && is_array($_POST['qst']) ) {

        $clean = [];

        foreach ($_POST['qst'] as $q) {
            $clean[] = [
                'question' => sanitize_text_field($q['question'] ?? ''),
                'type'     => sanitize_text_field($q['type'] ?? 'text'),
                'answer'   => sanitize_text_field($q['answer'] ?? ''),
                'options'  => isset($q['options'])
                    ? array_map('sanitize_text_field', $q['options'])
                    : [],
            ];
        }

        update_post_meta($post_id, '_questions', $clean);
    }
}
add_action('save_post', 'cleancraft_question_save_meta');
