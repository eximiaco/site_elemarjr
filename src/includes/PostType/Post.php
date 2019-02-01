<?php
/**
 * Default post type.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\PostType;

use Aztec\Base;

/**
 * Default post type.
 */
class Post extends Base {

	/**
	 * Add hooks.
	 */
	public function init() {
		add_action( 'init', $this->callback( 'add_page_attributes_support' ) );
	}

	/**
	 * Add `page-attriutes` support for posts.
	 */
	public function add_page_attributes_support() {
		add_post_type_support( 'post', 'page-attributes' );
	}
}
