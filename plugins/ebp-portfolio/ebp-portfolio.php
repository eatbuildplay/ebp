<?php

/*
Plugin Name: EBP Portfolio
Plugin URI: https://eatbuildplay.com/plugins/ebp-portfolio/
Description: Creates a portfolio post type and portfolio pages.
Version: 1.0.0
Author: Eat/Build/Play
Author URI: https://eatbuildplay.com/
Text Domain: ebp-portfolio
License: GPLv2 or later
*/

namespace Ebp_Portfolio;

define( 'EBP_PORTFOLIO_PATH', plugin_dir_path( __FILE__ ) );
define( 'EBP_PORTFOLIO_URL', plugin_dir_url( __FILE__ ) );
define( 'EBP_PORTFOLIO_VERSION', '1.0.0' );
define( 'EBP_PORTFOLIO_TEXT_DOMAIN', 'ebp-portfolio');

class Plugin {

  public function __construct() {

    require_once( EBP_PORTFOLIO_PATH . '/lib/PostType.php' );
    require_once( EBP_PORTFOLIO_PATH . '/lib/PostTypePortfolio.php' );
    require_once( EBP_PORTFOLIO_PATH . '/lib/PostTypePortfolioItem.php' );
    require_once( EBP_PORTFOLIO_PATH . '/lib/Taxonomy.php' );
    require_once( EBP_PORTFOLIO_PATH . '/lib/PortfolioController.php' );
    require_once( EBP_PORTFOLIO_PATH . '/lib/PortfolioModel.php' );

    add_action('wp_enqueue_scripts', function() {

      wp_enqueue_script(
        'ebp-portfolio',
        EBP_PORTFOLIO_URL . '/assets/portfolio.js',
        [],
        time(),
        true
      );

      $js = 'var ajaxurl = ' . json_encode( admin_url( "admin-ajax.php" ));
      wp_add_inline_script( 'ebp-portfolio', $js, 'before');

    });

    add_action('init', function() {

      $pt = new PostTypePortfolio();
      $pt->register();

    });

    add_shortcode('ebp_portfolio', function() {

      $portfolio = new PortfolioController();
      return $portfolio->render();

    });

    add_action('wp_ajax_portfolio_read', function() {

      $port = new PortfolioController();

      $response = new \stdClass;
      $response->code = 200;
      $response->objects = $port->fetchAll();
      wp_send_json_success( $response );

    });

  }

}

new Plugin();
