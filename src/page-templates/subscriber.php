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
	<div class="container index-tags__container">
		<div class="index-tags__nav">
			<i class="i-arrow-left"></i>
		</div>
		<ul class="index-tags__list">
			<?php foreach( $indexes as $key => $value ) : ?>
			<li class="index-tags__item">
				<a href="#"><?php echo esc_html( $key ); ?></a
			></li>
			<?php endforeach; ?>
		</ul>
		<div class="index-tags__nav">
			<i class="i-arrow-right"></i>
		</div>
	</div>
</nav>

<div class="container index-section">
<?php foreach( $indexes as $key => $query ) : ?>
	<h2 class="index-section__title"><?php echo esc_html( $key ); ?></h2>
	<?php
	while( $query->have_posts() ) : $query->the_post();
		get_template_part( 'template-parts/blog/content' );
	endwhile;
	?>
<?php endforeach; ?>
</div>

<?php get_footer(); ?>
