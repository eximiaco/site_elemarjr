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
	 * Event post type condition
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
			add_action( 'acf/include_fields', $this->callback( 'event_fields' ) );
        }
        
        $this->page_section = $this->container->get( PageSection::class );
	}

	/**
	 * Add event fields.
	 *
	 * @return void
	 */
	public function event_fields() {
		acf_add_local_field_group(
			array(
			'key'    => 'service',
			'title'  => __( 'Service settings', 'elemarjr' ),
			'fields' => array(
                $this->page_section->add_image_field(),
                $this->page_section->add_image_position_field(),
                $this->page_section->add_color_scheme_field(),
			 ),
			 'location' => $this->location,
			)
		);
	}
}
