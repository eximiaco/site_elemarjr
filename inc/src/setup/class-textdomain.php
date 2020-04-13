<?php
/**
 * Textdomain class
 *
 * @package Aztec
 */

namespace Aztec\Setup;

use Aztec\Base;

/**
 * Load translation files
 */
class Textdomain extends Base {
	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'after_setup_theme', $this->callback( 'load_textdomain' ) );
	}

	/**
	 * Load the installation locale theme language file
	 */
	public function load_textdomain() {
		load_theme_textdomain( 'elemar-jr', get_stylesheet_directory() . '/languages' );
		load_textdomain( 'elemar-jr_inc', ABSPATH . '../../inc/languages/elemar-jr_inc-pt_BR.mo' );
	}
}
