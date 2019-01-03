<?php
/**
 * Page section.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Helper\PageSection;

global $container;
$page_section = $container->get( PageSection::class );
?>
<div class="about--row--container container">
    <div class="about--row--content">
        <!-- Title -->
        <h2 class="about--row--title">
            <?php echo wp_kses_post( $page_section->row_title() ); ?>
        </h2>

        <!-- Content -->
        <div class="about--row--text">
            <?php echo wp_kses_post( get_sub_field( 'text' ) ); ?>
        </div>

        <!-- List -->
        <?php if ( have_rows( 'items' ) ) : ?>
        <ul class="about--row--list">
            <?php
            while ( have_rows( 'items' ) ) :
                the_row();
                ?>
                <li><?php the_sub_field( 'item_text' ); ?></li>
            <?php endwhile; ?>
        </ul>
        <?php endif; ?>
    </div>

    <!-- Button -->
    <?php
    $url   = get_sub_field( 'button_url' );
    $label = get_sub_field( 'button_label' );

    if ( $label && $url ) :
        ?>
        <div class="about--row--button">
            <a href="<?php echo esc_url( $url ); ?>" class="button button__bordered button__white">
                <?php echo esc_html( $label ); ?>
            </a>
        </div>
    <?php endif; ?>

    <!-- Image -->
    <div class="about--row--image wow fadeIn">
        <?php
            $media_id = get_sub_field( 'image' );
            echo wp_kses_post( wp_get_attachment_image( $media_id, 'full' ) );
        ?>
    </div>
</div>