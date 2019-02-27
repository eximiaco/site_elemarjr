<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template name: Restricted area
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container;

// Redirect to login page if the user is not logged
if ( ! is_user_logged_in() ) {
	auth_redirect();
}

$indexes = $container->get( Aztec\Taxonomy\Index::class )->get_posts();

get_header();
?>

<main>
	<div class="indexes">
		<div class="container indexes__container">
			<div class="swiper-container indexes__swiper-container">
				<div class="swiper-wrapper indexes__swiper-wrapper">
					<?php foreach ( $indexes as $slug => $index ) : ?>
					<div class="swiper-slide indexes__item">
						<a href="#<?php echo esc_attr( $index['term']->slug ); ?>">
							<?php echo esc_html( $index['term']->name ); ?>
						</a>
					</div>
					<?php endforeach; ?>
				</div>
				<div class="indexes__nav indexes__nav--next"><i class="i-arrow-right"></i></div>
				<div class="indexes__nav indexes__nav--prev"><i class="i-arrow-left"></i></div>
			</div>
			<div class="indexes__toggler">
				<i class="i-arrow-down"></i>
			</div>
		</div>
		<div class="indexes__select"></div>
	</div>

	<div class="container">
		<?php
		foreach ( $indexes as $slug => $index ) :
			if ( $index['query']->have_posts() ) :
		?>
		<section id="<?php echo esc_attr( $index['term']->slug ); ?>" class="index-section">
			<h2 class="index-section__title">
				<?php echo esc_html( $index['term']->name ); ?>
			</h2>
			<div class="cards-list">
				<div class="cards-list__wrapper">
				<?php
				while ( $index['query']->have_posts() ) :
					$index['query']->the_post();
					get_template_part( 'template-parts/blog/content' );
				endwhile;
				?>
				</div>
			</div>
		</section>
		<?php
			endif;
		endforeach;
		?>
	</div>
</main>

<?php get_footer(); ?>
