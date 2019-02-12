<?php
/**
 * Index taxonomy
 *
 * @package Aztec
 */

namespace Aztec\Taxonomy;

use Aztec\Base;

/**
 * Index taxonomy
 */
class Index extends Base {
	/**
	 * Slug name.
	 *
	 * @var string
	 */
	private $slug = 'index';

	/**
	 * Add hooks.
	 */
	public function init() {
		add_action( 'init', $this->callback( 'register_taxonomy' ) );
	}

	/**
	 * Register taxonomy.
	 */
	public function register_taxonomy() {
		register_taxonomy(
			$this->slug,
			'post',
			array(
				'hierarchical' => true,
				'label'        => __( 'Indexes', 'elemarjr' ),
				'labels'       => array(
					'name' => __( 'Indexes', 'elemarjr' ),
					'singular_name'     => __( 'Index', 'elemarjr' ),
					'all_items'         => __( 'All Indexes', 'elemarjr' ),
					'edit_item'         => __( 'Edit Index', 'elemarjr' ),
					'view_item'         => __( 'View Index', 'elemarjr' ),
					'update_item'       => __( 'Update Index', 'elemarjr' ),
					'add_new_item'      => __( 'Add New Index', 'elemarjr' ),
					'new_item_name'     => __( 'New Index Name', 'elemarjr' ),
					'parent_item'       => __( 'Parent Index', 'elemarjr' ),
					'parent_item_colon' => __( 'Parent Index:', 'elemarjr' ),
					'search_items'      => __( 'Search Indexes', 'elemarjr' ),
					'popular_series'    => __( 'Popular Indexes', 'elemarjr' ),
					'not_found'         => __( 'No indexes found.', 'elemarjr' ),
				),
				'public'       => true,
			)
		);
	}
}
