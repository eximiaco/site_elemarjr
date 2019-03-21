<?php
/**
 * Restrict Area page.
 *
 * @package Aztec
 */

namespace Aztec\Pages;

use Aztec\Base;

/**
 * Restricted Area page.
 */
class RestrictedArea extends Base {
	/**
	 * Init.
	 */
	public function init() {
		add_action( 'after_setup_theme', array( $this, 'remove_admin_bar' ) );
		add_action( 'wp', array( $this, 'redirect_if_user_is_not_logged_in' ) );
	}

	/**
	 * Redirect to login page if user is not logged in.
	 */
	public function redirect_if_user_is_not_logged_in() {
		if ( is_page_template( 'page-templates/restricted-area.php' ) ) {
			if ( ! is_user_logged_in() ) {
				auth_redirect();
			}
		}
	}

	/**
	 * Remove admin bar for users with "subscriber" role.
	 *
	 * @TODO: Passar código para escopo global, pois não funciona apenas na área restrita.
	 */
	public function remove_admin_bar() {
		$user = wp_get_current_user();

		if ( isset( $user ) && in_array( 'subscriber', $user->roles ) ) {
			show_admin_bar( false );
		}
	}
}
