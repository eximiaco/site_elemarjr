<?php
/**
 * Ocean Social Sharing
 *
 * @package Aztec
 */

namespace Aztec\Integration;

use Aztec\Base;

/**
 * Ocean Social Sharing language supports.
 */
class Ocean_Social_Sharing extends Base {
	/**
	 * Add hooks and filters
	 */
	public function init() {
		add_filter( 'ocean_register_tm_strings', $this->callback( 'register_tm_strings' ) );
	}

	/**
	 * Register translation strings.
	 *
	 * @param string $strings Translations strings.
	 *
	 * @return array
	 */
	public function register_tm_strings( $strings ) {
		if ( is_array( $strings ) ) {
			$strings['oss_social_share_heading'] = 'Please Share This';
		}

		return $strings;
	}
}
