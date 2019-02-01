<?php

namespace Aztec\Query;

use WP_Query;
use Aztec\Base;

class Post extends Base {
    /**
	 * Init.
	 */
	public function init() {
		//
    }

    /**
     * Get posts.
     *
     * @param  int $per_page Posts per page.
     * @return WP_Query
     */
    public function get_posts( $per_page = null, $language = null ) {
        $args = array(
            'post_status' => 'publish',
        );

        if ( null != $per_page ) {
            $args['posts_per_page'] = $per_page;
        }

        if ( null != $language ) {
            $args['lang'] = $language;
        }

        return new WP_Query( $args );
    }
}
