<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template name: Subscriber
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

<nav class="index-tags">
	<div class="index-tags__container">
		<div class="index-tags__current">
			<div class="index-tags__nav index-tags__nav--left">
				<i class="i-arrow-left"></i>
			</div>
			<div class="index-tags__current-title">
				<a href="#">Current</a>
			</div>
			<div class="index-tags__nav index-tags__nav--right">
				<i class="i-arrow-right"></i>
			</div>
		</div>
		<ul class="index-tags__list">
			<?php foreach( $indexes as $slug => $index ) : ?>
			<li class="index-tags__item <?php echo esc_attr( $index['term']->slug == 'index-a' ? 'index-tags__item--active' : '' ); ?>">
				<a href="#<?php echo esc_attr( $index['term']->slug ); ?>">
					<?php echo esc_html( $index['term']->name ); ?>
				</a
			></li>
			<?php endforeach; ?>
		</ul>
	</div>
	<div class="index-tags__toggler">
		<i class="i-arrow-left"></i>
	</div>
</nav>

<div class="container">
	<div id="<?php echo esc_attr( $index['term']->slug ); ?>" class="index-section">
	<?php foreach( $indexes as $slug => $index ) : ?>
		<h2 class="index-section__title"><?php echo esc_html( $index['term']->name ); ?></h2>
		<?php
		while( $index['query']->have_posts() ) : $index['query']->the_post();
			get_template_part( 'template-parts/blog/content' );
		endwhile;
		?>
	<?php endforeach; ?>
	</div>
</div>

<?php get_footer(); ?>
