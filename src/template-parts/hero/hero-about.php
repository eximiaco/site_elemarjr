<?php
/**
 * Hero home.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

?>
<h1 id="typed-strings" class="hero--typed">
	<?php echo wp_kses_post( apply_filters( 'the_content', get_field( 'hero_text' ) ) ); ?>
</h1>
<div class="hero--title"></div>
