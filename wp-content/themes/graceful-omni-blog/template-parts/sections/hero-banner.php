<?php
/**
 * Template part for Hero Banner below Header
 *
 * @package Graceful Omni
 */

// Open the links in New Tab
$graceful_links_window = ( graceful_omni_blog_options( 'hero_banner_window' ) )?'_blank':'_self';
?>

<div id="graceful-hero-banner-wrap" class="<?php echo esc_attr( graceful_omni_blog_options( 'hero_banner_width' ) ) === 'wrapped' ? ' wrapped-content': ''; ?> clear-fix">
	<!-- Link No 1 -->
	<?php if ( graceful_omni_blog_options( 'hero_banner_image_1' ) !== '' ): ?>
	<div class="graceful-hero-banner">
		<div class="graceful-hb-col">
			<img src="<?php echo esc_url( wp_get_attachment_url( graceful_omni_blog_options( 'hero_banner_image_1' ) ) ); ?>" alt="<?php echo esc_html( graceful_omni_blog_options( 'hero_banner_title_1' ) ); ?>">
		</div>
		<div class="graceful-hb-col">
			<div class="graceful-hb-col-inner">
				<h2><?php echo esc_html( graceful_omni_blog_options( 'hero_banner_title_1' ) ); ?></h2>
				<a style="background: <?php echo esc_attr( graceful_omni_blog_options( 'hero_banner_button_color' ) ) ?>;" href="<?php echo esc_url( graceful_omni_blog_options( 'hero_banner_url_1' ) ); ?>" target="<?php echo esc_attr($graceful_links_window); ?>">
					<?php esc_html_e( 'Read More', 'graceful-omni-blog' ); ?>
				</a>
			</div>
		</div>
		</a>
	</div>
	<?php endif; ?>

</div><!-- #hero-section end -->