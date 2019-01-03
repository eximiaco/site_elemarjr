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
use Aztec\Helper\PageSection;

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
				'param' => 'post_template',
				'operator' => '==',
				'value' => 'page-templates/services.php',
			),
		),
	);

	/**
	 * Section template.
	 * 
	 * @var \Aztec\Helper\PageSection
	 */
	private $page_section;

	/**
	 * Init on container
	 */
	public function init() {
		if ( function_exists( 'acf_add_options_page' ) ) {
			add_action( 'acf/include_fields', $this->callback( 'page_section' ) );
		}

		$this->page_section = $this->container->get( PageSection::class );
	}

	/**
	 * The repeater to create the body lines
	 */
	public function page_section() {
		acf_add_local_field_group(
			array(
			'key'            => 'services_page_sections',
			'title'          => __( 'Page Sections', 'elemarjr' ),
			'hide_on_screen' => array( 'the_content' ),
			'fields'         => array(
				array(
					'type'       => 'repeater',
					'key'        => 'services_repeater',
					'name'       => 'services_repeater',
					'layout'     => 'block',
					'sub_fields' => array(
						$this->page_section->add_title_field(),
						$this->page_section->add_content_field(),
						$this->page_section->add_image_field(),
						$this->page_section->add_image_position_field(),
                        $this->page_section->add_color_scheme_field(),
                    ),
				),
			 ),
			 'location'          => $this->location,
			)
		);
	}
}
