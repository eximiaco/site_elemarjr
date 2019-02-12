<?php
/**
 * Service ACF class
 *
 * @package WordPress
 * @subpackage AztecWpDevEnv
 * @since 0.1.0
 * @version 0.1.0
 */

namespace Aztec\Integration\ACF\PostType;

use Aztec\Base;
use Aztec\Helper\PageSection;

/**
 * Create ACF for service post type
 */
class Service extends Base {

	/**
	 * Section template.
	 *
	 * @var \Aztec\Helper\PageSection
	 */
	private $page_section;

	/**
	 * Service post type condition
	 *
	 * @var array
	 */
	protected $location = array(
		array(
			array(
				'param'    => 'post_type',
				'operator' => '==',
				'value'    => 'service',
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
			add_action( 'acf/include_fields', $this->callback( 'service_fields' ) );
		}

		$this->page_section = $this->container->get( PageSection::class );
	}

	/**
	 * Add servie fields.
	 *
	 * @return void
	 */
	public function service_fields() {
		acf_add_local_field_group(
			array(
			'key'            => 'service_sections',
			'title'          => __( 'Page sections', 'elemarjr' ),
			'fields'         => array(
				array(
					'type'       => 'repeater',
					'key'        => 'service_repeater',
					'name'       => 'service_repeater',
					'layout'     => 'block',
					'sub_fields' => array(
						$this->page_section->add_title_field(),
						$this->page_section->add_content_field(),
						$this->page_section->add_image_field(),
						$this->page_section->add_image_position_field(),
						$this->page_section->add_color_scheme_field(),
						$this->page_section->add_button_label_field(),
						$this->page_section->add_button_url_field(),
					),
				),
			 ),
			 'location'      => $this->location,
			)
		);
	}
}
