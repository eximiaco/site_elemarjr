<?php
/**
 * Mail class
 *
 * @package Aztec
 */

namespace Aztec\Integration;

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
		add_filter( 'ocean_post_layout_class', $this->callback( 'archive_layout_class' ), 20 );
		add_filter( 'ocean_main_metaboxes_post_types', $this->callback( 'oceanwp_metabox' ) );
	}

	/**
	 * Add scroll top after content wrap.
	 */
	public function add_scroll_top() {
		get_template_part( 'template-parts/scroll-top' );
	}

	/**
	 * Alter your post layouts
	 *
	 * Replace is_singular( 'post' ) by the function where you want to alter the layout
	 * You can also use is_page ( 'page name' ) to alter layouts on specific pages
	 *
	 * @param array $class Body class.
	 *
	 * @return full-width, full-screen, left-sidebar, right-sidebar or both-sidebars
	 */
	public function archive_layout_class( $class ) {
		// Alter your layout.
		if ( is_post_type_archive( 'archive' ) || 'archive' === get_post_type() ) {
			$class = 'full-width';
		}

		return $class;
	}

	/**
	 * Add the OceanWP Settings metabox in your CPT.
	 *
	 * @param array $types Array post types.
	 */
	public function oceanwp_metabox( $types ) {

		// Your custom post type.
		$types[] = 'archive';

		return $types;
	}
}
