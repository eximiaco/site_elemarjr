<?php
/**
 * Archive
 *
 * @package Aztec
 */

namespace Aztec\PostType;

use Aztec\Base;

/**
 * Init Post Type Archive.
 */
class Archive extends Base {
	/**
	 * Post type name
	 *
	 * @var string
	 */
	const POST_TYPE_NAME = 'archive';

	/**
	 * Execute hooks
	 */
	public function init() {
		add_action( 'init', $this->callback( 'register_post_type' ) );
		add_action( 'get_list_archives', $this->callback( 'get_list_archives' ) );
		add_filter( 'ocean_page_header_background_image', $this->callback( 'page_header_bg_img' ) );
		add_filter( 'ocean_display_breadcrumbs', $this->callback( 'prefix_page_header_breadcrumb' ) );
		add_filter( 'ocean_title', $this->callback( 'my_alter_page_header_title' ), 20 );
	}

	/**
	 * Register post type.
	 */
	public function register_post_type() {
		add_theme_support( 'post-thumbnails', array( self::POST_TYPE_NAME ) );

		$labels = array(
			'name'           => _x( 'Archive', 'Post Type General Name', 'elemar-jr_inc' ),
			'singular_name'  => _x( 'Archive', 'Post Type Singular Name', 'elemar-jr_inc' ),
			'menu_name'      => __( 'Archive', 'elemar-jr_inc' ),
			'name_admin_bar' => __( 'Archive', 'elemar-jr_inc' ),
		);

		$rewrite = array(
			'slug'       => self::POST_TYPE_NAME,
			'with_front' => false,
		);

		$suports = array(
			'title',
			'editor',
			'author',
			'thumbnail',
			'excerpt',
			'trackbacks',
			'custom-fields',
			'comments',
			'revisions',
			'page-attributes',
			'post-formats',
		);

		$taxonomies = array( 'archive_category' );

		$args = array(
			'label'               => __( 'Archive', 'elemar-jr_inc' ),
			'labels'              => $labels,
			'supports'            => $suports,
			'taxonomies'          => $taxonomies,
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_rest'        => true,
			'menu_position'       => 20,
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
			'menu_icon'           => 'dashicons-admin-page',
		);

		register_post_type( self::POST_TYPE_NAME, $args );
	}

	/**
	 * Hide breadcrumb to post type archive.
	 *
	 * @param boolean $return Boolean return if is showind breadcrumb.
	 *
	 * @return boolean
	 */
	public function prefix_page_header_breadcrumb( $return ) {
		if ( 'archive' === get_post_type() && ! is_tax() ) {
			$return = false;
		}
		return $return;
	}

	/**
	 * Alter your page header background image
	 *
	 * Replace is_singular( 'post' ) by the function where you want to alter the layout
	 * Place your image in your "img" folder
	 *
	 * @param string $bg_img Background image url.
	 *
	 * @return string
	 */
	public function page_header_bg_img( $bg_img ) {
		global $post;

		if ( is_singular( 'archive' ) ) {
			$bg_img = get_the_post_thumbnail_url( $post->ID, 'full' );
		}

		return $bg_img;
	}

	/**
	 * Example showing how to alter the page title, adjust accordingly to match your needs
	 *
	 * @param string $title Page header title.
	 *
	 * @return string
	 */
	public function my_alter_page_header_title( $title ) {
		if ( is_post_type_archive( 'archive' ) ) {
			$title = esc_attr__( 'Archive', 'elemar-jr_inc' );
		}

		return $title;
	}
}
