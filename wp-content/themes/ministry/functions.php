<?php
/*
Page Name: Functions Page
Description: Basic functions used in the theme
*/

function minis_theme_support(){
    add_theme_support('title-tag'); // title of website page
    add_theme_support('custom-logo'); // logo image
    add_theme_support('post-thumbnails'); // post image
}
add_action('after_setup_theme', 'minis_theme_support');


function mtc_menus(){
    $locations = array(
        'primary' => 'Desctop Primary Top menu',
        'account' => 'Account Menu',
        'footer' => 'footer menu',
    );
    register_nav_menus($locations);
}

add_action('init','mtc_menus');

function my_custom_body_class($classes) {
    is_front_page() ? $classes[] = 'content_container' : '';
    is_page(66) ? $classes[] = 'content_container' : '';
    return $classes;
}
add_filter('body_class', 'my_custom_body_class');

// Allow SVG Uploaded
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];

}, 10, 4 );

function cc_mime_types( $mimes ){
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

function fix_svg() {
    echo '<style type="text/css">
        .attachment-266x266, .thumbnail img {
            width: 100% !important;
            height: auto !important;
        }
    </style>'; 
}
add_action( 'admin_head', 'fix_svg' );


// Auth
function redirect_wp_login_to_custom_login() {
    $login_page = home_url('/custom-login');
    $page_viewed = basename($_SERVER['REQUEST_URI']);

    if ($page_viewed == "wp-login.php" && $_SERVER['REQUEST_METHOD'] == 'GET') {
        wp_redirect($login_page);
        exit();
    }
}
add_action('init', 'redirect_wp_login_to_custom_login');

function custom_login_page_template_redirect() {
    if ($_SERVER['REQUEST_URI'] == '/custom-login' && !is_user_logged_in()) {
        include(get_template_directory() . '/custom-login.php');
        exit();
    }
}
add_action('template_redirect', 'custom_login_page_template_redirect');

// Login
function ajax_login() {

    check_ajax_referer('ajax-auth-nonce', 'security');
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = wp_authenticate($username, $password);

    if (is_wp_error($user)) {
        // echo json_encode(array('loggedin' => false, 'message_fal' => qtranxf_getLanguage() == 'ar' ? "البريد الإلكتروني أو كلمة السر خاطئة." : "Invalid Email or Password."));
        echo json_encode(array('loggedin' => false));
        // wp_redirect( home_url() );
        exit;
    
    } else {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        echo json_encode(array('loggedin' => true));
    }
    die();
}

// AJAX Handlers
add_action('wp_ajax_nopriv_ajax_login', 'ajax_login');
// add_action('wp_ajax_nopriv_ajax_register', 'ajax_register');

wp_enqueue_script( 'ajax-auth-script',  get_template_directory_uri().'/js/ajax-login.js', array( 'jquery' ), '1.0', true );

wp_localize_script( 'ajax-auth-script', 'ajax_auth_object', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'nonce' => wp_create_nonce('ajax-auth-nonce'),
    'siteUrl' => site_url(),
));

function custom_logout_url() {
    // توليد رابط تسجيل الخروج مع توجيه إلى الصفحة الرئيسية بعد الخروج
    return wp_logout_url(home_url());
}

// مكاتب
function create_custom_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'makatep';
    
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        selected_value varchar(55) NOT NULL,
        field1 text NOT NULL,
        field2 text NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}

add_action('after_switch_theme', 'create_custom_table');

// Makateb
wp_enqueue_script( 'ajax-outo-script',  get_template_directory_uri().'/js/custom-ajax.js', array( 'jquery' ), '1.0', true );

wp_localize_script( 'ajax-outo-script', 'ajax_outo_object', array(
    'ajaxurl' => admin_url( 'admin-ajax.php' ),
    'nonce' => wp_create_nonce('ajax-outo-nonce')
));

// Access Page
// function validate_phone_number_login($user, $username, $password) {
//     // التحقق من صحة اسم المستخدم (رقم الهاتف المكون من 8 أرقام)
//     if (!preg_match('/^[0-9]{8}$/', $username)) {
//         return new WP_Error('invalid_username', __('The username must be an 8-digit phone number.'));
//     }

//     // استدعاء الدالة الأصلية authenticate للتحقق من صحة المستخدم وكلمة المرور
//     return wp_authenticate_username_password(null, $username, $password);
// }
// add_filter('authenticate', 'validate_phone_number_login', 30, 3);

function handle_create_custom_post() {
    check_ajax_referer('post_nonce', 'post_nonce_field');

    $title = sanitize_text_field($_POST['post_title']);
    $content = sanitize_textarea_field($_POST['post_content']);
    $image_data = $_POST['image_data'];

    // إعداد البوست
    $new_post = array(
        'post_title' => $title,
        'post_content' => $content,
        'post_status' => 'publish',
        'post_type' => 'post'
    );

    // إدراج البوست في قاعدة البيانات
    $post_id = wp_insert_post($new_post);

    if ($post_id) {
        // معالجة الصورة إذا كانت موجودة
        if (!empty($image_data)) {
            $upload_dir = wp_upload_dir();
            $img_data = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $image_data));
            $file_path = $upload_dir['path'] . '/' . uniqid() . '.png';
            file_put_contents($file_path, $img_data);

            // إعداد المرفق (attachment)
            $file_url = $upload_dir['url'] . '/' . basename($file_path);
            $attachment = array(
                'guid' => $file_url,
                'post_mime_type' => 'image/png',
                'post_title' => basename($file_path),
                'post_content' => '',
                'post_status' => 'inherit'
            );

            // إدخال المرفق في قاعدة البيانات
            $attachment_id = wp_insert_attachment($attachment, $file_path, $post_id);
            if (!is_wp_error($attachment_id)) {
                require_once(ABSPATH . 'wp-admin/includes/image.php');
                $attachment_data = wp_generate_attachment_metadata($attachment_id, $file_path);
                wp_update_attachment_metadata($attachment_id, $attachment_data);

                update_post_meta($post_id, '_thumbnail_id', $attachment_id);

                update_field('migo', $attachment_id, $post_id);
            }
        }

        wp_send_json_success(array('message' => 'Post created successfully!', 'post_id' => $post_id));
    } else {
        wp_send_json_error(array('message' => 'Error creating post.'));
    }
}
add_action('wp_ajax_create_custom_post', 'handle_create_custom_post');
add_action('wp_ajax_nopriv_create_custom_post', 'handle_create_custom_post');

// function enqueue_custom_scripts() {
//     // تضمين jQuery من ووردبريس
//     wp_enqueue_script('jquery');

//     // تضمين Bootstrap CSS وJS
//     wp_enqueue_style('bootstrap-css', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css');
//     wp_enqueue_script('popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js', array('jquery'), null, true);
//     wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js', array('jquery', 'popper-js'), null, true);
//     wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/scripts.js', array('jquery'), null, true);
// }
// add_action('wp_enqueue_scripts', 'enqueue_custom_scripts');



require_once get_template_directory() . '/controller/f_makateb_input.php';
require_once get_template_directory() . '/controller/f_outbut.php';
require_once get_template_directory() . '/controller/f_input_mass2.php';