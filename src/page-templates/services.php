<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template name: Services
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

get_header();

use Aztec\PostType\Service;
use Aztec\Helper\PageSection;

global $container;
global $container;

$services     = $container->get( Service::class )->get_services();
$page_section = $container->get( PageSection::class );
?>


<main class="services">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<div class="services__header">
		<div class="services__header-image">
			<?php the_post_thumbnail(); ?>
		</div>
	</div>

	<div class="services__page-header page-header">
		<h1 class="page-header--title"><?php the_title(); ?></h1>
	</div>

	<article id="post-<?php the_ID(); ?>" <?php post_class( 'rich-content' ); ?>>
		<?php
		while ( $services->have_posts() ) :
			$services->the_post();
			?>
		<div class="<?php echo esc_attr( $page_section->get_row_classes() ); ?>">
			<?php get_template_part( 'template-parts/page-sections' ); ?>
		</div>
		<?php endwhile; ?>
	</article>
	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
