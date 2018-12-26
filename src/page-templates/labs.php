<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * Template name: Labs
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

global $container;

$labs = $container->get( Aztec\PostType\Lab::class )->get_labs();

get_header();
?>

<div class="container labs">
    <?php
    while ( have_posts() ) :
        the_post();
        ?>
    <div class="page-header">
		<h3 class="page-header--title">
            <?php the_title(); ?>
        </h3>
	</div>

    <div class="cards-list labs__list">
        <?php
            while ( $labs->have_posts() ) : $labs->the_post();
                get_template_part( 'template-parts/lab/lab' );
            endwhile;

            wp_reset_postdata();
            ?>
    </div>
    <?php endwhile; ?>
</div>

<?php get_footer(); ?>