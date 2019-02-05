<?php
/**
 * The post query.
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Query;

use WP_Query;
use Aztec\Base;

/**
 * The post query.
 */
class Post extends Base {
	/**
	 * Init.
	 */
	public function init() {
		add_action( 'pre_get_posts', array( $this, 'hide_private' ) );
	}

	 /**
	  * Esconde posts privados no site
	  *
	  * @param WP_Query $query A consulta que está sendo processada.
	  */
	public function hide_private( $query ) {
		if ( ! is_admin() ) {
			$query->set( 'post_status', 'publish' );
		}
	}
}
