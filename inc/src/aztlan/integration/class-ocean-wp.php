<?php
/**
 * Mail class
 *
 * @package Aztec
 */

namespace Aztec\Aztlan\Integration;

use Aztec\Base;

/**
 * Fix mail stuffs
 */
class Ocean_Wp extends Base {
	/**
	 * Add hooks and filters
	 */
	public function init() {
		add_action( 'ocean_after_content_wrap', $this->callback( 'add_scroll_top' ) );
	}

	/**
	 * Add scroll top after content wrap.
	 */
	public function add_scroll_top() {
		get_template_part( 'template-parts/scroll-top' );
	}
}
