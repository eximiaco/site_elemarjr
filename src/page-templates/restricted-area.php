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

$indexes = $container->get( Aztec\Taxonomy\Index::class )->get_posts();

get_header();
?>

<main>
	<nav class="indexes-tags">
		<div class="indexes-tags__arrow indexes-tags__arrow--prev">
			<i class="i-arrow-left"></i>
		</div>
		<div class="indexes-tags__container">
			<div class="indexes-tags__selected">
				<?php echo esc_html( reset($indexes)['term']->name ) ?>
			</div>
			<ul class="indexes-tags__list">
				<?php foreach( $indexes as $slug => $index ) : ?>
				<li class="indexes-tags__item">
					<a href="#<?php echo esc_attr( $index['term']->slug ); ?>">
						<?php echo esc_html( $index['term']->name ); ?>
					</a>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		<div class="indexes-tags__arrow indexes-tags__arrow--next">
			<i class="i-arrow-right"></i>
		</div>
		<div class="indexes-tags__toggler">
			<i class="i-arrow-left"></i>
		</div>
	</nav>
</main>

<div class="container">
	<?php foreach( $indexes as $slug => $index ) : ?>
	<section id="<?php echo esc_attr( $index['term']->slug ); ?>" class="index-section">
		<h2 class="index-section__title">
			<?php echo esc_html( $index['term']->name ); ?>
		</h2>
		<?php
		while( $index['query']->have_posts() ) : $index['query']->the_post();
			get_template_part( 'template-parts/blog/content' );
		endwhile;
		?>
	</section>
	<?php endforeach; ?>
</div>

<?php get_footer(); ?>
