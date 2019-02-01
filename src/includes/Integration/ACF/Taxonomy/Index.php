<?php
/**
 * Index taxonomy ACF
 *
 * @package Aztec
 */

namespace Aztec\Integration\ACF\Taxonomy;

use Aztec\Base;

/**
 * Index taxonomy ACF
 */
class Index extends Base {
	/**
	 * Index taxonomy condition
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param'    => 'taxonomy',
				'operator' => '==',
				'value'    => 'index',
			),
		),
	);

	/**
	 * Add hooks.
	 */
	public function init() {
		add_action( 'init', $this->callback( 'add_index_fields' ) );
	}

	/**
	 * Add index taxonomy fields.
	 */
	public function add_index_fields() {
		acf_add_local_field_group(
			array(
				'key'            => 'taxonomy_index',
				'title'          => __( 'Page sections', 'elemarjr' ),
				'fields'         => array(
					array(
						'type'          => 'number',
						'label'         => __( 'Order', 'elemarjr' ),
						'key'           => 'taxonomy_index_order',
						'name'          => 'taxonomy_index_order',
						'default_value' => '0',
					),
				),
				'location'      => $this->location,
			)
		);
	}
}
