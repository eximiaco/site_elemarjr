<?php
/**
 * Archive Category Taxonomy
 *
 * @package Aztec
 */

namespace Aztec\Taxonomy;

use Aztec\Base;

/**
 * Init Archive Category Taxonomy.
 */
class Archive_Category extends Base {
	/**
	 * Post type name
	 *
	 * @var string
	 */
	const TAX_NAME = 'archive_category';

	/**
	 * Execute hooks
	 */
	public function init() {
		add_action( 'init', $this->callback( 'register_taxonomy' ) );
		add_action( 'the_taxonomy_archive_category', $this->callback( 'the_archive_category' ), 10 );
	}

	/**
	 * Register taxonomy `archive_category`.
	 */
	public function register_taxonomy() {
		$labels = array(
			'name'              => _x( 'Archive Categories', 'taxonomy general name', 'elemar-jr_inc' ),
			'singular_name'     => _x( 'Archive Category', 'taxonomy singular name', 'elemar-jr_inc' ),
			'search_items'      => __( 'Search Archive Categories', 'elemar-jr_inc' ),
			'all_items'         => __( 'All Archive Categories', 'elemar-jr_inc' ),
			'parent_item'       => __( 'Parent Archive Category', 'elemar-jr_inc' ),
			'parent_item_colon' => __( 'Parent Archive Category:', 'elemar-jr_inc' ),
			'edit_item'         => __( 'Edit Archive Category', 'elemar-jr_inc' ),
			'update_item'       => __( 'Update Archive Category', 'elemar-jr_inc' ),
			'add_new_item'      => __( 'Add New Archive Category', 'elemar-jr_inc' ),
			'new_item_name'     => __( 'New Archive Category Name', 'elemar-jr_inc' ),
			'menu_name'         => __( 'Archive Category', 'elemar-jr_inc' ),
		);

		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'public'            => true,
			'show_in_rest'      => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => true,
			'rewrite'           => array( 'slug' => 'archive-category' ),
		);

		register_taxonomy( self::TAX_NAME, array( 'archive' ), $args );
	}

	/**
	 * Print taxonomy list links.
	 */
	public function the_archive_category() {
		global $post;
		$terms = get_the_terms( $post->ID, self::TAX_NAME );

		$thelist = array();
		foreach ( $terms as $term ) {
			$thelist[] = '<a href="' . esc_url( get_term_link( $term->term_id ) ) . '">' . $term->name . '</a>';
		}
		echo wp_kses_post( implode( ', ', $thelist ) );
	}
}
