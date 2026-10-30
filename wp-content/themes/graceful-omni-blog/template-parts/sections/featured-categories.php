<?php
/**
 * Template part for Featured Categories Section
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$graceful_omni_featured_cat_width       = graceful_omni_blog_options( 'featured_categories_width' );
$graceful_omni_featured_cat_width_class = ( 'wrapped' === $graceful_omni_featured_cat_width ) ? 'wrapped-content' : '';
?>

<section class="graceful-omni-featured-categories <?php echo esc_attr( $graceful_omni_featured_cat_width_class ); ?>">
	<div class="graceful-omni-featured-categories-wrapper">
		<div class="graceful-omni-featured-categories-grid">
			<?php
			for ( $i = 1; $i <= 4; $i++ ) {
				$graceful_omni_cat_id    = graceful_omni_blog_options( 'featured_category_' . $i );
				$graceful_omni_cat_image = graceful_omni_blog_options( 'featured_category_image_' . $i );

				if ( $graceful_omni_cat_id && $graceful_omni_cat_id !== 'null' ) {
					$graceful_omni_category = get_category( $graceful_omni_cat_id );

					if ( $graceful_omni_category && ! is_wp_error( $graceful_omni_category ) ) {
						$graceful_omni_cat_link  = get_category_link( $graceful_omni_cat_id );
						$graceful_omni_cat_name  = $graceful_omni_category->name;
						$graceful_omni_image_url = '';

						if ( $graceful_omni_cat_image ) {
							$graceful_omni_image_url = wp_get_attachment_image_url( $graceful_omni_cat_image, 'large' );
						}
						?>
						<div class="graceful-omni-featured-cat-item">
							<a href="<?php echo esc_url( $graceful_omni_cat_link ); ?>" class="graceful-omni-featured-cat-link">
								<div class="graceful-omni-featured-cat-image" <?php if ( $graceful_omni_image_url ) : ?>style="background-image: url('<?php echo esc_url( $graceful_omni_image_url ); ?>');"<?php endif; ?>>
									<?php if ( ! $graceful_omni_image_url ) : ?>
										<span class="graceful-omni-featured-cat-placeholder"></span>
									<?php endif; ?>
								</div>
								<div class="graceful-omni-featured-cat-overlay">
									<h3 class="graceful-omni-featured-cat-name"><?php echo esc_html( strtoupper( $graceful_omni_cat_name ) ); ?></h3>
								</div>
							</a>
						</div>
						<?php
					}
				}
			}
			?>
		</div>
	</div>
</section>
