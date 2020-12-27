<?php

namespace Ebp_Portfolio;

if (!defined('ABSPATH')) {
	exit;
}

class PortfolioController {


	public function render() {

		$content = '';
		$content .= '<div id="portfolio-loader">PORTA LOADER...</div>';
		return $content;

	}

	public function fetchAll() {

		$queryArgs = [
			'post_type' => 'acfg_portfolio',
			'numberposts' => -1
		];
		$posts = get_posts( $queryArgs );
		$ports = [];
		foreach( $posts as $post ) {
			$port = new PortfolioModel();
			$port->id = $post->ID;
			$port->title = $post->post_title;
			$ports[] = $port;
		}
		return $ports;

	}


}
