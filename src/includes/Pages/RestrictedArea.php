<?php
/**
 * Restrict Area page.
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

class RestrictedArea extends Base {
	/**
	 * Init.
	 */
	public function init() {
		add_action( 'after_setup_theme', array( $this, 'remove_admin_bar' ) );
	}

	/**
	 * Remove admin bar for users with "subscriber" role.
	 */
	public function remove_admin_bar() {
		$user = wp_get_current_user();

		if ( isset( $user ) && in_array( 'subscriber', $user->roles ) ) {
			show_admin_bar( false );
		}
	}
}
