<?php
/*
Template Name: custom-login
*/

if (is_user_logged_in()) {
    wp_redirect(home_url());
    exit;
}
?>


<?php
get_footer();
?>
