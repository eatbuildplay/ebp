<?php

namespace Ebp_Portfolio;

if (!defined('ABSPATH')) {
	exit;
}

class PostTypePortfolio extends PostType {

  public function key() {
    return 'portfolio';
  }

	public function nameSingular() {
		return 'Portfolio';
	}


}
