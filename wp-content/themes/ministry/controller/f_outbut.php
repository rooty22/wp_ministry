<?php

// All Count
function filter_outo_cate_all() {
    // check_ajax_referer('ajax-outo-nonce', 'nonce');

    // إنشاء دالة مساعدة لحساب عدد المنشورات لكل حالة
    function get_post_count_by_status($status) {
        $args = array(
            'post_type'  => 'makateb',
            'meta_query' => array(
                array(
                    'key'   => 'halet_tanfez',
                    'value' => $status,
                ),
            ),
        );
        $query = new WP_Query($args);
        return $query->found_posts;
    }

    // حساب كل حالة
    $count_start = get_post_count_by_status('لم يبدأ', $post_cat);
    $count_ongoing = get_post_count_by_status('مستمر', $post_cat);
    $count_ended = get_post_count_by_status('انتهى', $post_cat);
    $count_stopped = get_post_count_by_status('متوقف', $post_cat);

    $total_count = $count_start + $count_ongoing + $count_ended + $count_stopped;

    // إرسال النتائج ككائن JSON
    echo json_encode(array(
        'nostart' => $count_start,
        'ongoing' => $count_ongoing,
        'ended' => $count_ended,
        'stopped' => $count_stopped,
        'total' => $total_count,
    ));

    wp_die();
}
add_action('wp_ajax_filterOutoCateAll', 'filter_outo_cate_all');
add_action('wp_ajax_nopriv_filterOutoCateAll', 'filter_outo_cate_all');


// Select
function filter_outo_cate() {
    check_ajax_referer('ajax-outo-nonce', 'nonce');

    $post_cat = $_POST['catOut'];

    // إنشاء دالة مساعدة لحساب عدد المنشورات لكل حالة
    function get_post_count_by_status($status, $post_cat) {
        $args = array(
            'post_type'  => 'makateb',
            'meta_query' => array(
                array(
                    'key'   => 'halet_tanfez',
                    'value' => $status,
                ),
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'maktab',
                    'field'    => 'id',
                    'terms'    => $post_cat,
                ),
            ),
        );
        $query = new WP_Query($args);
        return $query->found_posts;
    }

    // حساب كل حالة
    $count_start = get_post_count_by_status('لم يبدأ', $post_cat);
    $count_ongoing = get_post_count_by_status('مستمر', $post_cat);
    $count_ended = get_post_count_by_status('انتهى', $post_cat);
    $count_stopped = get_post_count_by_status('متوقف', $post_cat);

    $total_count = $count_start + $count_ongoing + $count_ended + $count_stopped;

    // إرسال النتائج ككائن JSON
    echo json_encode(array(
        'nostart' => $count_start,
        'ongoing' => $count_ongoing,
        'ended' => $count_ended,
        'stopped' => $count_stopped,
        'total' => $total_count,
    ));

    wp_die();
}
add_action('wp_ajax_filterOutoCate', 'filter_outo_cate');
add_action('wp_ajax_nopriv_filterOutoCate', 'filter_outo_cate');

// Show Page
// function filter_outo_show() {

//     $post_cat = $_POST['catOut'];

//     wp_die();
// }
// add_action('wp_ajax_filterOutoShow', 'filter_outo_show');
// add_action('wp_ajax_nopriv_filterOutoShow', 'filter_outo_show');

// Edit Post
// function create_edit_post() {
//     $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;
//     $title = sanitize_text_field($_POST['title']);
//     $content = sanitize_textarea_field($_POST['content']);
//     $extra_field = sanitize_text_field($_POST['extra_field']);

//     $post_data = array(
//         'post_title' => $title,
//         'post_content' => $content,
//         'meta_input' => array(
//             'extra_field' => $extra_field
//         ),
//         'post_status' => 'publish',
//         'post_type' => 'post'
//     );

//     if ($post_id) {
//         $post_data['ID'] = $post_id;
//         $post_id = wp_update_post($post_data);
//     }

//     if ($post_id) {
//         wp_send_json_success(array('message' => 'Post saved successfully', 'post_id' => $post_id));
//     } else {
//         wp_send_json_error(array('message' => 'Error saving post'));
//     }
// }
// add_action('wp_ajax_create_edit_post', 'create_edit_post');
// add_action('wp_ajax_nopriv_create_edit_post', 'create_edit_post');

function update_custom_post() {
    $post_id = isset($_POST['post_id']) ? intval($_POST['post_id']) : 0;

    $category_id = $_POST['catID'];

    $post_title = sanitize_text_field($_POST['post_title']);
    $post_cont = sanitize_textarea_field($_POST['post_feqa']);
    $post_date_from = sanitize_text_field($_POST['post_date_from']);
    $post_date_to = sanitize_text_field($_POST['post_date_to']);
    $post_num = sanitize_text_field($_POST['post_num']);
    $post_moasher = sanitize_text_field($_POST['post_moasher']);
    $post_ketat = sanitize_text_field($_POST['post_ketat']);
    $post_mostah = sanitize_text_field($_POST['post_mostah']);
    $post_tahqeeq = sanitize_text_field($_POST['post_tahaqaq']);
    $post_soubat = sanitize_text_field($_POST['soubat']);
    $post_any = sanitize_text_field($_POST['any_updatee']);
    $post_radioo = sanitize_text_field($_POST['custom_field_radio']);

    $post_data = array(
        'post_title' => $post_title,
        'meta_input' => array(
            'feqa_mostah' => $post_cont,
            'date_from' => $post_date_from,
            'date_to' => $post_date_to,
            'adad' => $post_num,
            'moashr_adaa' => $post_moasher,
            'ketat_asas' => $post_ketat,
            'mostahdaf' => $post_mostah,
            'tahaqaq_moash' => $post_tahqeeq,
            'soubat' => $post_soubat,
            'any_updatee' => $post_any,
            'halet_tanfez' => $post_radioo
        ),
        'post_status' => 'publish',
        'post_type' => 'makateb'
    );

    if ($post_id) {
        $post_data['ID'] = $post_id;
        wp_set_post_terms($post_id, array($category_id), 'maktab');
        $post_id = wp_update_post($post_data);
    }

    if ($post_id) {
        wp_send_json_success(array('message' => 'Post saved successfully', 'post_id' => $post_id));
    } else {
        wp_send_json_error(array('message' => 'Error saving post'));
    }

    wp_die();
}
add_action('wp_ajax_update_custom_post', 'update_custom_post');
add_action('wp_ajax_nopriv_update_custom_post', 'update_custom_post');