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
add_action( 'wp_print_scripts', 'deregisterJquery', 100 );

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
