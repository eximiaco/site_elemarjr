<?php
/**
 * Create ACF for template
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\Pages;

use Aztec\Base;

/**
 * Add custom fields to about template.
 */
class Services extends Base {

	/**
	 * About template location
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param'    => 'post_template',
				'operator' => '==',
				'value'    => 'page-templates/services.php',
			),
		),
	);

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'acf/include_fields', $this->callback( 'remove_the_content' ) );
		}
	}

	/**
	 * Add Hero custom fields
	 */
	public function remove_the_content() {
		acf_add_local_field_group(
			array(
			    'key'            => 'services_page',
                'hide_on_screen' => array( 'the_content' ),
			    'location'       => $this->location,
			)
		);
	}
}
