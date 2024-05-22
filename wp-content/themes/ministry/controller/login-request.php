<?php
session_start();

if (is_user_logged_in()) {
    wp_redirect(home_url());
}

if ($_POST) {

    // $nonce = $_REQUEST['_wpnonce'];
    // if (!wp_verify_nonce($nonce, 'submit_picture')) {
    //     exit; // Get out of here, the nonce is rotten!
    // }

    //We shall SQL escape all inputs  
    $username = esc_sql($_POST['username']);
    $password = esc_sql($_POST['password']);
    // $remember = (isset($_POST['rememberme'])) ? esc_sql($_POST['rememberme']) : false;

    $login_data = array();
    $login_data['user_login'] = $username;
    $login_data['user_password'] = $password;
    // $login_data['remember'] = $remember;

    $user_verify = wp_signon($login_data, false);

    if (is_wp_error($user_verify)) {

        $_SESSION['error'] = __('Invalid Username or Password, try again', 'aster');

        // Note, I have created a page called "Error" that is a child of the login page to handle errors. This can be anything, but it seemed a good way to me to handle errors.  
        wp_redirect(home_url('login'));
    } else {
        echo "<script type='text/javascript'>window.location.href='" . home_url() . "'</script>";
        exit();
    }
}