<?php
/**
 * Polylang integration
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\Polylang;

use Aztec\Base;

/**
 * Integrate with Polylang plugin
 */
class Polylang extends Base {

	/**
	 * Init on container
	 */
	public function init() {
		add_filter( 'pll_the_languages_args', $this->callback( 'display_language_slug' ) );
		add_filter( 'pll_get_post_types', $this->callback( 'custom_post_type_support' ), 10, 2 );
	}

	/**
	 * Display language slug instead the full name.
	 *
	 * @param  array $args Language arguments.
	 * @return array
	 */
	public function display_language_slug( $args ) {
		$args['display_names_as'] = 'slug';
		return $args;
	}

	/**
	 * Custom post type support.
	 *
	 * @param  array   $post_types Post types.
	 * @param  boolean $is_settings Is settings.
	 * @return array
	 */
	public function custom_post_type_support( $post_types, $is_settings ) {

		$post_types['archive'] = 'archive';

		return $post_types;
	}
}
