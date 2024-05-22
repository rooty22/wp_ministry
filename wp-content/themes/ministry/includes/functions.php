<?php

//---- ACF Functions ----//
require_once get_template_directory() . '/includes/acf-fields.php';

//---- Ajax Functions ----//
require_once get_template_directory() . '/includes/ajax.php';

//---- Create a custom post types ----//
require_once get_template_directory() . '/includes/custom-post-types.php';

//---- Create a Meta Boxs ----//
require_once get_template_directory() . '/includes/meta-boxs.php';

//---- Helper files get all functions and hooks ----//
require_once get_template_directory() . '/includes/helpers.php';

//---- Get Elementor View Path ----//
function getElementorView($fileName)
{
    $path = get_template_directory() . '/includes/elementor/views/';
    $filePath = $path . $fileName . '.php';

    return $filePath;
}

// function my_plugin_editor_scripts()
// {
//     wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css');
//     wp_register_style('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css');
//     wp_register_style('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
//     wp_register_style('sweetalert2', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.css');

//     wp_register_style('custom-style', THEME_DIR_URI . '/assets/css/custom-style.css');


//     wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', '', '3.7.1', true);
//     wp_register_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', '', '1.8.0', true);
//     wp_register_script('bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.min.js', '', '5.3.2', true);
//     wp_register_script('sweetalert2', 'https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.32/sweetalert2.all.js');

//     wp_register_script('lc-script', THEME_DIR_URI . '/assets/js/custom-app.js', '', HELLO_ELEMENTOR_VERSION, true);

//     wp_enqueue_style('fontawesome');
//     wp_enqueue_style('bootstrap');
//     wp_enqueue_style('slick');
//     wp_enqueue_style('sweetalert2');
//     wp_enqueue_style('custom-style');

//     wp_enqueue_script('jquery');
//     wp_enqueue_script('slick');
//     wp_enqueue_script('bootstrap');
//     wp_enqueue_script('sweetalert2');
//     wp_enqueue_script('lc-script');

//     wp_localize_script(
//         'lc-script',
//         'lc',
//         array(
//             'ajaxurl' => admin_url('admin-ajax.php'),
//             'nonce' => wp_create_nonce('aster-ajax')
//         )
//     );
// }
// add_action('wp_enqueue_scripts', 'my_plugin_editor_scripts');

function change_login_page_style()
{
?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/images/qeema.webp);
            height: auto;
            width: 100%;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            padding-bottom: 30px;
        }

        .login {
            background-image: url(https://www.qeematech.net/wp-content/uploads/2019/10/home-2-bg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            background-attachment: fixed;
        }

        #nav a,
        #backtoblog a,
        #language-switcher span {
            color: #fff !important;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'change_login_page_style');

/**
 * Admin page for the 'country' taxonomy
 */
function cb_add_country_taxonomy_admin_page()
{
    $tax = get_taxonomy('country');

    add_users_page(
        esc_attr($tax->labels->menu_name),
        esc_attr($tax->labels->menu_name),
        $tax->cap->manage_terms,
        'edit-tags.php?taxonomy=' . $tax->name
    );
}
add_action('admin_menu', 'cb_add_country_taxonomy_admin_page');

function uploadFile($file)
{
    if (!function_exists('wp_crop_image')) {
        include(ABSPATH . 'wp-admin/includes/image.php');
    }

    $file_name = sanitize_file_name($file['name']);

    // first checking if tmp_name is not empty
    if (!empty($file['tmp_name'])) {
        // if not, then try creating a file on disk
        $upload = wp_upload_bits($file_name, null, file_get_contents($file['tmp_name']));

        // if wp does not return a file creation error
        if ($upload['error'] === false) {
            // then you can create an attachment
            $attachment = array(
                'post_mime_type' => $upload['type'],
                'post_title' => $file_name,
                'post_content' => '',
                'post_status' => 'inherit'
            );

            // creating an attachment in db and saving its ID to a variable
            $attach_id = wp_insert_attachment($attachment, $upload['file']);

            // generation of attachment metadata
            $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);

            // attaching metadata and creating a thumbnail
            wp_update_attachment_metadata($attach_id, $attach_data);

            return $attach_id;
        }
    }
}

function user_count_meta($user_id, $meta_key, $post_id)
{
    global $wpdb;

    $query = $wpdb->get_var("SELECT COUNT(*) FROM {$wpdb->prefix}usermeta 
                            WHERE user_id = $user_id
                            AND meta_key = '$meta_key'
                            AND meta_value = '$post_id' ");

    return $query;
}

function post_count_meta($meta_key, $meta_value)
{
    global $wpdb;

    $query = $wpdb->get_results("SELECT COUNT(*) as order_count, post_id FROM {$wpdb->prefix}postmeta 
        WHERE meta_key = '$meta_key'
        AND meta_value = '$meta_value' ");

    return $query;
}

function cutText($text, $chars = 25) {
    if (strlen($text) <= $chars) {
        return $text;
    }
    $text = $text." ";
    $text = substr($text,0,$chars);
    $text = substr($text,0,strrpos($text,' '));
    $text = $text."...";
    return $text;
}
add_filter('show_admin_bar', '__return_false');

