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

$services     = $container->get( Service::class )->get_services();
$page_section = $container->get( PageSection::class );
?>

<main class="container services__container">
	<?php
	while ( have_posts() ) :
		the_post();
		?>
	<div class="page-header">
		<h3 class="page-header--title"><?php the_title(); ?></h3>
	</div>

	<div class="cards-list cards-list--services">
		<div class="cards-list__wrapper">
			<?php
			while ( $services->have_posts() ) :
				$services->the_post();
				get_template_part( 'template-parts/service/service' );
				endwhile;

				wp_reset_postdata();
			?>
		</div>
	</div>

	<?php endwhile; ?>
</main>

<?php get_footer(); ?>
