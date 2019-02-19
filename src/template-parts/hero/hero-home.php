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
<h1 class="hero--title"><?php echo wp_kses_post( get_field( 'hero_title' ) ); ?></h1>
<p class="hero--description"><?php echo wp_kses_post( get_field( 'hero_text' ) ); ?></p>
<a href="<?php echo esc_url( get_field( 'hero_button_url' ) ); ?>" class="hero--button button button__bordered button__white">
	<?php echo esc_html( get_field( 'hero_button_label' ) ); ?>
</a>
