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
$lab_tag  = get_field( 'lab_tag' );
$lab_link = get_field( 'lab_link' );
?>

<div class="card card--white card--lab">
	<div class="card__wrapper lab__wrapper">
		<div class="card__header">
			<h3 class="card__title"><?php the_title(); ?></h3>
			<div class="card__thumbnail"><?php the_post_thumbnail(); ?></div>
		</div>
		<div class="card__content">
			<?php the_content(); ?>
		</div>
		<div class="card__footer">
			<a href="<?php echo esc_url( $lab_link ); ?>" target="_blank" class="card--lab__repository">
				<i class="i-github"></i>
			</a>
			<div class="card--lab__tags">
				<?php if ( pll_get_term( $lab_tag ) ) : ?>
				<a href="<?php echo esc_url( get_term_link( pll_get_term( $lab_tag ) ) ); ?>" class="card__button">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/note.svg' ); ?>" class="card--lab__button-note">
					<?php echo esc_html__( 'what we wrote about it', 'elemarjr' ); ?>
				</a>
				<?php endif; ?>

				<?php if ( 'pt_BR' === get_locale() ) : ?>
				<ul class="card--lab__langs">
					<?php
					$pt_term_id = pll_get_term( $lab_tag, 'pt_BR' );

					if ( null !== $pt_term_id && false !== $pt_term_id ) :
						?>
					<li class="card--lab__langs-item">
						<a href="<?php echo esc_url( get_term_link( $pt_term_id ) ); ?>">PT</a>
					</li>
					<?php endif; ?>
					<?php
                    $en_term_id = pll_get_term( $lab_tag, 'en_US' );

					if ( null !== $en_term_id && false !== $en_term_id ) :
						?>
					<li class="card--lab__langs-item">
						<a href="<?php echo esc_url( get_term_link( $en_term_id ) ); ?>">EN</a>
					</li>
					<?php endif; ?>
				</ul>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>
