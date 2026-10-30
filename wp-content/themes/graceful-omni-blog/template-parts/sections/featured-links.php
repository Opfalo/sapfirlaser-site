<?php
/**
 * Template part for Featured Links Section
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$graceful_omni_links_width       = graceful_omni_blog_options( 'featured_links_width' );
$graceful_omni_links_width_class = ( 'wrapped' === $graceful_omni_links_width ) ? 'wrapped-content' : '';
?>

<section class="graceful-omni-featured-links <?php echo esc_attr( $graceful_omni_links_width_class ); ?>">
	<div class="graceful-omni-featured-links-wrapper">
		<div class="graceful-omni-featured-links-grid">
			<?php
			for ( $graceful_omni_i = 1; $graceful_omni_i <= 4; $graceful_omni_i++ ) {
				$graceful_omni_link_title = graceful_omni_blog_options( 'featured_link_title_' . $graceful_omni_i );
				$graceful_omni_link_url   = graceful_omni_blog_options( 'featured_link_url_' . $graceful_omni_i );
				$graceful_omni_link_image = graceful_omni_blog_options( 'featured_link_image_' . $graceful_omni_i );

				if ( ! empty( $graceful_omni_link_title ) && ! empty( $graceful_omni_link_url ) ) {
					$graceful_omni_image_url = '';

					if ( $graceful_omni_link_image ) {
						$graceful_omni_image_url = wp_get_attachment_image_url( $graceful_omni_link_image, 'large' );
					}
					?>
					<div class="graceful-omni-featured-link-item">
						<a href="<?php echo esc_url( $graceful_omni_link_url ); ?>" class="graceful-omni-featured-link-anchor">
							<div class="graceful-omni-featured-link-image"<?php if ( $graceful_omni_image_url ) : ?> style="background-image: url('<?php echo esc_url( $graceful_omni_image_url ); ?>');"<?php endif; ?>>
								<?php if ( ! $graceful_omni_image_url ) : ?>
									<span class="graceful-omni-featured-link-placeholder"></span>
								<?php endif; ?>
							</div>
							<div class="graceful-omni-featured-link-overlay">
								<h3 class="graceful-omni-featured-link-title"><?php echo esc_html( $graceful_omni_link_title ); ?></h3>
							</div>
						</a>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>
