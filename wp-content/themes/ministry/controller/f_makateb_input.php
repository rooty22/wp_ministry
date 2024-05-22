<?php

function filter_posts_by_category() {
    // check_ajax_referer('custom_post_nonce', 'nonce');

    $category_id = $_POST['catID'];

    if (!current_user_can('edit_posts')) {
        wp_die('Unauthorized user');
    }

    $post_type = 'makateb';
    $post_title = sanitize_text_field($_POST['post_title']);
    $post_cont = sanitize_textarea_field($_POST['post_content']);
    $post_date_from = sanitize_text_field($_POST['post_date_from']);
    $post_date_to = sanitize_text_field($_POST['post_date_to']);
    $post_num = sanitize_text_field($_POST['post_num']);
    $post_moasher = sanitize_text_field($_POST['post_moasher']);
    $post_ketat = sanitize_text_field($_POST['post_ketat']);
    $post_mostah = sanitize_text_field($_POST['post_mostah']);
    $post_tahqeeq = sanitize_text_field($_POST['post_tahqeeq']);
    $post_soubat = sanitize_text_field($_POST['post_soubat']);
    $post_any = sanitize_text_field($_POST['post_any']);
    $post_radioo = sanitize_text_field($_POST['post_redio']);
    $post_category = intval($category_id);

    $qr_input = $_FILES['qr_input'];

    $post_data = array(
        'post_title'   => $post_title,
        'post_status'  => 'publish',
        'post_type'    => $post_type
    );

    $post_id = wp_insert_post($post_data);

    if ($post_id) {
        // update_post_meta($post_id, 'الفئة_المستهدفة', $post_content);

        update_post_meta($post_id, 'feqa_mostah', $post_cont);
        update_post_meta($post_id, 'date_from', $post_date_from);
        update_post_meta($post_id, 'date_to', $post_date_to);
        update_post_meta($post_id, 'adad', $post_num);
        update_post_meta($post_id, 'moashr_adaa', $post_moasher);
        update_post_meta($post_id, 'ketat_asas', $post_ketat);
        update_post_meta($post_id, 'mostahdaf', $post_mostah);
        update_post_meta($post_id, 'tahaqaq_moash', $post_tahqeeq);
        update_post_meta($post_id, 'soubat', $post_soubat);
        update_post_meta($post_id, 'any_updatee', $post_any);
        update_post_meta($post_id, 'halet_tanfez', $post_radioo);
        
        wp_set_post_terms($post_id, array($post_category), 'maktab');

        // معالجة رفع الملف
        if (!empty($qr_input['name'])) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            $uploaded = media_handle_upload('qr_input', $post_id);

            if (is_wp_error($uploaded)) {
                echo 'Failed to upload image.';
            } else {
                update_field($post_id, 'qrt', $uploaded);
                echo 'Post and image created successfully!';
            }
        } else {
            echo 'Post created successfully!';
        }

        echo 'Post created successfully!';
    } else {
        echo 'Failed to create post.';
    }

    wp_die();
}
add_action('wp_ajax_filterPostsByCategory', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filterPostsByCategory', 'filter_posts_by_category');

