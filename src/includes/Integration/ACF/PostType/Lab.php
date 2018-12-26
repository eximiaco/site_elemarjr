<?php
/**
 * Testimonial class
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\PostType;

use Aztec\Base;

/**
 * Create ACF for event post type
 */
class Lab extends Base {

	/**
	 * Event post type condition
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'lab',
			),
		),
	);

	/**
	 * Init.
	 *
	 * @return void
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'acf/include_fields', $this->callback( 'event_fields' ) );
		}
	}

	/**
	 * Add event fields.
	 *
	 * @return void
	 */
	public function event_fields() {
		acf_add_local_field_group(
			array(
			'key'    => 'lab',
			'title'  => __( 'Lab', 'elemarjr' ),
			'fields' => array(
				array(
					'type'         => 'taxonomy',
					'key'          => 'lab_tag',
					'name'         => 'lab_tag',
					'required'     => true,
					'label'        => __( 'Tag', 'elemarjr' ),
					'taxonomy'     => 'post_tag',
					'field_type'   => 'select',
					'wrapper'      => array(
						'width' => '50%'
					),
				),
				array(
					'type'       => 'url',
					'key'        => 'lab_link',
					'name'       => 'lab_link',
					'required'   => true,
					'label'      => __( 'Repository', 'elemarjr' ),
					'wrapper'    => array(
						'width' => '50%'
					),
				),
			 ),
			 'location' => $this->location,
			)
		);
	}
}
