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
	public function init() {}

	/**
	 * Get posts.
	 *
	 * @param  int    $per_page Posts per page.
	 * @param  string $language Posts language.
	 * @return WP_Query
	 */
	public function get_posts( $per_page = null, $language = null ) {
		$args = array(
			'post_status' => 'publish',
		);

		if ( null != $per_page ) {
			$args['posts_per_page'] = $per_page;
		}

		if ( null != $language ) {
			$args['lang'] = $language;
		}

		return new WP_Query( $args );
	}
}
