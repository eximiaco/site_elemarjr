<?php
/**
 * Lab component.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

/**
 * Get ACF fields.
 */
$lab_tag = get_field( 'lab_tag' );
$lab_link = get_field( 'lab_link' );
?>

<div class="card lab">
    <div class="card__wrapper lab__wrapper">
        <div class="lab__header">
            <h3 class="lab__title">
                <?php the_title(); ?>
            </h3>
            <div class="lab__thumbnail">
                <?php the_post_thumbnail(); ?>
            </div>
        </div>
        <div class="lab__content">
            <?php the_content(); ?>
        </div>
        <div class="lab__footer">
            <a href="<?php echo esc_url( $lab_link ); ?>" target="_blank" class="lab__repository">
                <i class="i-github"></i>
            </a>
            <div class="lab__tag">
                <?php if ( pll_get_term( $lab_tag ) ) : ?>
                <a href="<?php echo esc_url( get_term_link( pll_get_term( $lab_tag ) ) ); ?>" class="lab__button">
                    <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/note.svg' ); ?>" class="lab__button-note">
                    <?php echo __( 'what we wrote about it', 'elemarjr' ); ?>
                </a>
                <?php endif; ?>
                
                <?php if( get_locale() == 'pt_BR' ) : ?>
                <ul class="lab__langs">
                    <?php if ( $pt_term_id = pll_get_term( $lab_tag, 'pt_BR' ) ) : ?>
                    <li class="lab__langs-item">
                        <a href="<?php echo esc_url( get_term_link( $pt_term_id ) ); ?>">PT</a>
                    </li>
                    <?php endif; ?>
                    <?php if ( $en_term_id = pll_get_term( $lab_tag, 'en_US' ) ) : ?>
                    <li class="lab__langs-item">
                        <a href="<?php echo esc_url( get_term_link( $en_term_id ) ); ?>">EN</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
