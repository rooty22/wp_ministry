<?php

session_start();

if (isset($_POST)) {

    // $nonce = $_REQUEST['_wpnonce'];
    // if (!wp_verify_nonce($nonce, 'submit_picture')) {
    //     exit; // Get out of here, the nonce is rotten!
    // }

    // Check first name is present 
    // $user['first_name'] = esc_sql($_REQUEST['first_name']);

    $errors = [];

    if (empty($user['first_name'])) {
        $errors['first_name'] = __("من فضلك أدخل الاسم الأول", 'qeema');
    }

    echo "desdf";

    // Check last name is present 
    $user['last_name'] = esc_sql($_REQUEST['last_name']);

    if (empty($user['last_name'])) {
        $errors['last_name'] = __("من فضلك أدخل الاسم الأخير", 'qeema');
    }

    // Check username is present and not already in use  
    $user['username'] = $user['user_login'] = esc_sql($_REQUEST['user_login']);

    if (strpos($user['username'], ' ') !== false) {
        $errors['username'] = __("عذرًا، لا يسمح بوجود مسافات في أسماء المستخدمين", 'qeema');
    }

    if (empty($user['username'])) {
        $errors['username'] = __("من فضلك أدخل اسم المستخدم", 'qeema');
    } elseif (username_exists($user['username'])) {
        $errors['username'] = __("اسم المستخدم موجود بالفعل، يرجى تجربة اسم مستخدم آخر", 'qeema');
    }

    // Check email address is present and valid  
    $user['user_email'] = esc_sql($_REQUEST['email']);

    if (!is_email($user['user_email'])) {
        $errors['email'] = __("يرجى إدخال البريد الإلكتروني الصحيح", 'qeema');
    } elseif (email_exists($user['user_email'])) {
        $errors['email'] = __("عنوان البريد الإلكتروني هذا مستخدم بالفعل", 'qeema');
    }

    // Check password is valid  
    if (0 === preg_match("/.{6,}/", $_POST['password'])) {
        $errors['password'] = __("يجب أن تتكون كلمة المرور من ستة أحرف على الأقل", 'qeema');
    }

    if (0 !== strcmp($_POST['password'], $_POST['password_confirmation'])) {
        $errors['password_confirmation'] = __("كلمة المرور غير مطابقة", 'qeema');
    }

    if (0 === count($errors)) {

        $user['user_pass'] = esc_sql($_POST['password']);

        $phonenumber = isset($_POST['phonenumber']) ? esc_sql($_POST['phonenumber']) : '';

        // Insert new user.
        $new_user_id = wp_insert_user($user);

        // ==== Update User Meta ====//
        if (!empty($country)) {
            update_user_meta($new_user_id, 'country', $country);
        }

        $user = get_user_by('id', $new_user_id);
        wp_set_current_user($new_user_id, $user->user_login);
        wp_set_auth_cookie($new_user_id);
        do_action('wp_login', $user->user_login, $user); //`[Codex Ref.][1]


        // $user_login = 'guest';

        // //get user ID
        // $user = get_userdatabylogin($user_login); // below WP 3.3.0

        // //$user =  get_user_by('login', $user_login); above or equals WP 3.3.0

        // $user_id = $user->ID;

        // //login
        // wp_set_current_user($user_id, $user_login);
        // wp_set_auth_cookie($user_id);
        // do_action('wp_login', $user_login);

        wp_redirect(home_url());

    } else {
        $_SESSION['errors'] = $errors;

        // var_dump($errors);
        wp_safe_redirect($_SERVER['HTTP_REFERER']);
    }
}