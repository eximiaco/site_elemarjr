<?php
/**
 * Event component.
 *
 * @package WordPress
 * @subpackage ElemarJr
 * @since 0.1.0
 * @version 0.1.0
 */

use Aztec\Helper\Text;

global $container;
?>

<div class="card card--white card--service">
    <div class="card__wrapper">
        <div class="card__header">
            <h3 class="card__title">
                <?php echo wp_kses_post( $container->get( Text::class )->asterisk_to_strong( get_the_title() ) ); ?>
            </h3>
			<div class="card__thumbnail"><?php the_post_thumbnail(); ?></div>
        </div>
        <div class="card__content">
            <?php the_content(); ?>
        </div>
        <div class="card__footer">
            <a href="<?php the_permalink(); ?>" class="card__button">Saiba mais</a>
        </div>
    </div>
</div>
