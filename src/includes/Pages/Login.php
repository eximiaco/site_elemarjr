<?php
/**
 * Style login page.
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Style login page.
 */
class Login extends Base {

	/**
	 * Add hooks.
	 */
	public function init() {
		add_action( 'login_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
	}

	/**
	 * Enqueue styles.
	 */
	public function enqueue_scripts() {
		wp_enqueue_style( 'elemar-login', get_stylesheet_directory_uri() . '/assets/css/login.css' );
	}
}
