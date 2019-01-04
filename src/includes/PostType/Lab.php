<?php
/**
 * Lab custom post type.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\PostType;

use Aztec\Base;

/**
 * Manipulate Event post type
 */
class Lab extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'init', $this->callback( 'register_post_type' ) );
	}

	/**
	 * Register post type
	 */
	public function register_post_type() {
		register_post_type(
			'lab',
			array(
				'hierarchical' => true,
				'labels' => array(
					'name'               => __( 'Labs', 'elemarjr' ),
					'singular_name'      => __( 'Lab', 'elemarjr' ),
					'add_new'            => _x( 'Add New', 'lab', 'elemarjr' ),
					'add_new_item'       => __( 'Add New Lab', 'elemarjr' ),
					'new_item'           => __( 'New Lab', 'elemarjr' ),
					'edit_item'          => __( 'Edit Lab', 'elemarjr' ),
					'view_item'          => __( 'View Lab', 'elemarjr' ),
					'all_items'          => __( 'All Labs', 'elemarjr' ),
					'search_items'       => __( 'Search Labs', 'elemarjr' ),
					'not_found'          => __( 'No labs found.', 'elemarjr' ),
					'not_found_in_trash' => __( 'No labs found in Trash.', 'elemarjr' ),
				),
				'show_ui'                => true,
				'supports'               => array( 'title', 'editor', 'thumbnail' ),
				'menu_icon'              => 'dashicons-archive',
			)
		);
	}

	/**
	 * Get all labs.
	 *
	 * @return \WP_Query
	 */
	public function get_labs() {
		return new \WP_Query(
			array(
				'post_type'      => 'lab',
				'order'          => 'ASC',
				'orderby'        => 'menu_order',
				'posts_per_page' => -1,
			)
		);
	}
}
