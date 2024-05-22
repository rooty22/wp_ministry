<?php 

function handle_form_wizzer() {
    $title = sanitize_text_field($_POST['post_title']);
    $post_maktab = sanitize_text_field($_POST['post_maktab']);
    $post_addadM = sanitize_text_field($_POST['post_addadM']);
    $adud = sanitize_text_field($_POST['post_adud']);
    $adud2 = sanitize_text_field($_POST['post_adud2']);
    $adud3 = sanitize_text_field($_POST['post_adud3']);
    $adud4 = sanitize_text_field($_POST['post_adud4']);
    $adud5 = sanitize_text_field($_POST['post_adud5']);
    $adud6 = sanitize_text_field($_POST['post_adud6']);
    $adud7 = sanitize_text_field($_POST['post_adud7']);
    $adud8 = sanitize_text_field($_POST['post_adud8']);

    $new_post = array(
        'post_title' => $title,
        'meta_input' => array(
            'maktap_talem' => $post_maktab,
            'addad_tapaa' => $post_addadM
        ),
        'post_status' => 'publish',
        'post_type' => 'self_evaluation'
    );

    $post_id = wp_insert_post($new_post);


    if ($post_id) {
        update_field('adad_taheaa', array('aam_mady'=>$adud), $post_id);
        update_field('adad_taheaa', array('aam_haly'=>$adud2), $post_id);

        update_field('adad_netaq', array('aam_mady'=>$adud3), $post_id);
        update_field('adad_netaq', array('aam_haly'=>$adud4), $post_id);
        
        update_field('adad_takdum', array('aam_mady'=>$adud5), $post_id);
        update_field('adad_takdum', array('aam_haly'=>$adud6), $post_id);

        update_field('adad_tamuz', array('aam_mady'=>$adud7), $post_id);
        update_field('adad_tamuz', array('aam_haly'=>$adud8), $post_id);

        wp_send_json_success(array('message' => 'Post created successfully!', 'post_id' => $post_id));
    } else {
        wp_send_json_error(array('message' => 'Error creating post'));
    }

    wp_die();
}
add_action('wp_ajax_submit_form_wizz', 'handle_form_wizzer');
add_action('wp_ajax_nopriv_submit_form_wizz', 'handle_form_wizzer');
