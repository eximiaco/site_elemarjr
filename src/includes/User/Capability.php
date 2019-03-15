<?php
/**
 * Add user capability.
 *
 * @package Aztec
 */

namespace Aztec\User;

use Aztec\Base;

/**
 * Add user capability.
 */
class Capability extends Base {

	/**
	 * Add hooks
	 */
	public function init() {
		add_action( 'init', $this->callback( 'read_private_posts' ) );
	}

	/**
	 * Adicionado capacidade para todos os usuários visualizar posts privados.
	 */
	public function read_private_posts() {
		$roles = array(
			'author',
			'subscriber',
			'contributor',
		);

		foreach ( $roles as $role ) {
			get_role( $role )->add_cap( 'read_private_posts' );
		}
	}
}
