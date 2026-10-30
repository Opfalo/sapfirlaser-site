<?php
/**
 * Graceful Omni Blog - Post Slider with Full-Width Image & Centered Card Overlay
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$graceful_omni_slider_posts = get_posts(
	array(
		'numberposts' => 4,
		'post_status' => 'publish',
	)
);

if ( empty( $graceful_omni_slider_posts ) ) {
	return;
}
?>

<div class="omni-slider-container <?php echo esc_attr( graceful_omni_blog_options( 'omni_slider_width' ) ) === 'wrapped' ? 'wrapped-content' : ''; ?> clear-fix">
	<div class="omni-slider-wrapper">
		<div class="owl-carousel omni-slider-carousel">
			<?php foreach ( $graceful_omni_slider_posts as $graceful_omni_post ) : ?>
				<?php
				setup_postdata( $graceful_omni_post );
				$graceful_omni_image_url  = get_the_post_thumbnail_url( $graceful_omni_post, 'large' );
				$graceful_omni_categories = get_the_category( $graceful_omni_post->ID );
				$graceful_omni_cat_names  = array();

				if ( ! empty( $graceful_omni_categories ) ) {
					foreach ( $graceful_omni_categories as $graceful_omni_cat ) {
						$graceful_omni_cat_names[] = $graceful_omni_cat->name;
					}
				}

				$graceful_omni_category_text = ! empty( $graceful_omni_cat_names )
					? implode( ' / ', $graceful_omni_cat_names )
					: __( 'Uncategorized', 'graceful-omni-blog' );
				?>
				<div class="omni-slide">
					<?php if ( $graceful_omni_image_url ) : ?>
						<div class="omni-slide-bg" style="background-image: url('<?php echo esc_url( $graceful_omni_image_url ); ?>');"></div>
					<?php else : ?>
						<div class="omni-slide-bg omni-slide-bg--placeholder"></div>
					<?php endif; ?>
					<div class="omni-slide-card">
						<span class="omni-slide-category"><?php echo esc_html( $graceful_omni_category_text ); ?></span>
						<h2 class="omni-slide-title"><?php echo esc_html( get_the_title( $graceful_omni_post ) ); ?></h2>
						<a class="omni-slide-button" href="<?php echo esc_url( get_permalink( $graceful_omni_post ) ); ?>">
							<?php esc_html_e( 'Read More', 'graceful-omni-blog' ); ?>
						</a>
					</div>
				</div>
			<?php endforeach; ?>
			<?php wp_reset_postdata(); ?>
		</div>
		<span class="omni-nav omni-prev" aria-label="<?php esc_attr_e( 'Previous slide', 'graceful-omni-blog' ); ?>">&#8249;</span>
		<span class="omni-nav omni-next" aria-label="<?php esc_attr_e( 'Next slide', 'graceful-omni-blog' ); ?>">&#8250;</span>
	</div>
</div>
