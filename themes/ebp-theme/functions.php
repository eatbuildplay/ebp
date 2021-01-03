<?php

add_filter('show_admin_bar', '__return_false');
add_theme_support( 'editor-styles' );

add_action('enqueue_block_editor_assets', function() {

  wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',
    [],
    '5.15.1'
  );

});

/*
 * Enqueue scripts
 */
add_action('wp_enqueue_scripts', function() {

  wp_enqueue_style(
    'font-awesome',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css',
    array(),
    true
  );

  wp_enqueue_style(
    'bootstrap',
    'https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css',
    array(),
    true
  );

  wp_enqueue_style(
    'ebp-theme-main',
    get_template_directory_uri() . '/style.css',
    ['font-awesome', 'bootstrap'],
    time()
  );

  wp_enqueue_script(
    'ebp-theme-main-script',
    get_template_directory_uri() . '/script.js',
    ['jquery'],
    time(),
    true
  );

});

/*
 * Optimizations to remove core WP loading of scripts
 */

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

add_action('wp_footer', function() {
  wp_dequeue_script( 'wp-embed' );
});
add_action( 'wp_print_styles', 'deregisterStyles', 100 );
// add_action( 'wp_print_scripts', 'deregisterJquery', 100 );

function deregisterJquery() {

  // don't do this in admin
  if ( is_admin() ) { return; }

  wp_deregister_script('jquery');
  wp_deregister_script('jquery-migrate');

}

function deregisterStyles() {

  if (current_user_can( 'update_core' )) {
    return;
  }
  wp_deregister_style('dashicons');

}

add_action('wp_ajax_register_form_process', 'registerFormProcess' );
add_action('wp_ajax_nopriv_register_form_process', 'registerFormProcess' );

function registerFormProcess() {

  $firstName = sanitize_text_field( $_POST['firstName'] );
  $lastName = sanitize_text_field( $_POST['lastName'] );
  $email = sanitize_text_field( $_POST['email'] );
  $companyName = sanitize_text_field( $_POST['companyName'] );

  $result = wp_create_user(
    $email,
    '1234',
    $email
  );
  if( is_wp_error($result) ) {
    $error = $result->get_error_message();
    //handle error here
  } else {
    $user = get_user_by('id', $result);
    //handle successful creation here
  }

  $response = new \stdClass();
  $response->code = 200;
  wp_send_json_success( $response );

}
