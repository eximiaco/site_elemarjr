<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

get_header();

use Aztec\Helper\Text;
use Aztec\Helper\PageSection;
use Aztec\PostType\Service;

global $container;

$page_section = $container->get( PageSection::class );
?>

<main>

		<?php
		while ( have_posts() ) :
			the_post();
			?>
        <div class="single-service__header">
            <?php the_post_thumbnail( 'post-thumbnail', array( 'class' => 'single-service__header-image' ) ); ?>
        </div>

        <h1 class="single-service__title">
            <?php echo wp_kses_post( $container->get( Text::class )->asterisk_to_strong( get_the_title() ) ); ?>
        </h1>

        <article id="post-<?php the_ID(); ?>" <?php post_class( 'rich-content' ); ?>>
            <?php
            while ( have_rows( 'service_repeater' ) ) :
                the_row();
                ?>
            <div class="<?php echo esc_attr( $page_section->get_row_classes() ); ?>">
                <?php get_template_part( 'template-parts/page-sections' ); ?>
            </div>
            <?php endwhile; ?>
        </article>

        <?php endwhile; ?>

</main>

<?php get_footer(); ?>
