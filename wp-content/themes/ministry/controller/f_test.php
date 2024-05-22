<?php

// function my_ajax_script_localize() {
//     wp_enqueue_script('my-ajax-script', get_template_directory_uri() . '/js/makateb.js', array('jquery'), null, true);
//     $lango = qtranxf_getLanguage();

//     wp_localize_script('my-ajax-script', 'myAjax', 
//         array(
//             'ajaxurl' => admin_url('admin-ajax.php')
//         )
//     );
// }
// add_action('wp_enqueue_scripts', 'my_ajax_script_localize');



// function enqueue_custom_scripts() {
//     wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), null, true);

//     wp_localize_script('custom-ajax-script', 'ajax_auth_object', array(
//         'ajaxurl' => admin_url('admin-ajax.php'),
//         'nonce' => wp_create_nonce('custom_post_nonce')
//     ));
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');

function render_custom_form() {
    
    ob_start();
    ?>
    <form method="post">
        <label for="post_type_select">Select Post Type:</label>
        <select name="post_type_select" id="post_type_select" required>
            <option value="">--Select Post Type--</option>
            <?php foreach (get_post_types(array('public' => true), 'objects') as $post_type) : ?>
                <option value="<?php echo esc_attr($post_type->name); ?>"><?php echo esc_html($post_type->label); ?></option>
            <?php endforeach; ?>
        </select>
        
        <label for="post_title">Post Title:</label>
        <input type="text" name="post_title" id="post_title" required>
        
        <label for="post_content">Post Content:</label>
        <textarea name="post_content" id="post_content" required></textarea>
        
        <!-- <label for="post_date">Post Date:</label> -->
        <!-- <input type="date" name="post_date" id="post_date" required> -->

        <button type="button" class="btn btn-success" id="bootu">Add</button>
    </form>
    <div id="form-response"></div>
    <?php
    return ob_get_clean();
}
add_shortcode('custom_post_form', 'render_custom_form');


function handle_create_custom_post() {
    check_ajax_referer('custom_post_nonce', 'nonce');

    if (!current_user_can('edit_posts')) {
        wp_die('Unauthorized user');
    }

    $post_type = sanitize_text_field($_POST['post_type']);
    $post_title = sanitize_text_field($_POST['post_title']);
    $post_content = sanitize_textarea_field($_POST['post_content']);
    $post_date = sanitize_text_field($_POST['post_date']);

    $post_data = array(
        'post_title'   => $post_title,
        'post_content' => $post_content,
        'post_status'  => 'publish',
        'post_type'    => $post_type
    );

    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        update_post_meta($post_id, 'name', $post_content);
        echo 'Post created successfully!';
    } else {
        echo 'Failed to create post.';
    }

    wp_die();
}
add_action('wp_ajax_create_custom_post', 'handle_create_custom_post');
add_action('wp_ajax_nopriv_create_custom_post', 'handle_create_custom_post');


function enqueue_custom_scripts() {
    wp_enqueue_script('custom-ajax-script', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), null, true);

    wp_localize_script('custom-ajax-script', 'ajax_auth_object2', array(
        'ajaxurl' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('custom_post_nonce')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');




// Post
function create_custom_post_type() {
    register_post_type('custom_post_type',
        array(
            'labels'      => array(
                'name'          => __('Custom Posts'),
                'singular_name' => __('Custom Post'),
            ),
            'public'      => true,
            'has_archive' => true,
            'supports'    => array('title', 'editor', 'thumbnail'),
        )
    );
}
add_action('init', 'create_custom_post_type');


function custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // ID
        'Custom Field', // العنوان
        'display_custom_meta_box', // دالة العرض
        'custom_post_type', // نوع المنشور المخصص
        'normal', // السياق
        'high' // الأولوية
    );
}
add_action('add_meta_boxes', 'custom_meta_box');

function display_custom_meta_box($post) {
    $value = get_post_meta($post->ID, '_custom_field', true);
    ?>
    <label for="custom_field">Custom Field:</label>
    <input type="text" name="custom_field" id="custom_field" value="<?php echo esc_attr($value); ?>" />
    <?php
}

function save_custom_meta_box($post_id) {
    if (array_key_exists('custom_field', $_POST)) {
        update_post_meta(
            $post_id,
            '_custom_field',
            sanitize_text_field($_POST['custom_field'])
        );
    }
}
add_action('save_post', 'save_custom_meta_box');