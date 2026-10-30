<?php
/**
 * Template part for Latest Posts below Header
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$graceful_omni_posts_width       = graceful_omni_blog_options( 'latest_posts_width' );
$graceful_omni_posts_width_class = ( 'wrapped' === $graceful_omni_posts_width ) ? 'wrapped-content' : '';
?>

<section class="omni-posts-section <?php echo esc_attr( $graceful_omni_posts_width_class ); ?>">
	<div class="omni-posts-wrapper">
		<div class="omni-posts-grid">
			<?php
			$graceful_omni_latest_args = array(
				'posts_per_page'      => 4,
				'post_status'         => 'publish',
				'ignore_sticky_posts' => true,
			);

			$graceful_omni_latest_query = new WP_Query( $graceful_omni_latest_args );

			if ( $graceful_omni_latest_query->have_posts() ) :
				while ( $graceful_omni_latest_query->have_posts() ) :
					$graceful_omni_latest_query->the_post();

					$graceful_omni_thumb_url    = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '';
					$graceful_omni_cats         = get_the_category();
					$graceful_omni_cat_name     = ! empty( $graceful_omni_cats ) ? $graceful_omni_cats[0]->name : '';
					$graceful_omni_show_cat     = graceful_omni_blog_options( 'latest_posts_show_category' );
					$graceful_omni_show_author  = graceful_omni_blog_options( 'latest_posts_show_author' );
					$graceful_omni_show_date    = graceful_omni_blog_options( 'latest_posts_show_date' );
					?>

					<article <?php post_class( 'omni-posts-card' ); ?>>
						<a class="omni-posts-card-link" href="<?php the_permalink(); ?>" aria-label="<?php echo esc_attr( get_the_title() ); ?>">
							<div class="omni-posts-card-image"<?php if ( $graceful_omni_thumb_url ) : ?> style="background-image: url('<?php echo esc_url( $graceful_omni_thumb_url ); ?>');"<?php endif; ?>>
								<?php if ( ! $graceful_omni_thumb_url ) : ?>
									<span class="omni-posts-thumb--placeholder"></span>
								<?php endif; ?>
							</div>
							<div class="omni-posts-card-overlay">
								<?php if ( $graceful_omni_show_cat && $graceful_omni_cat_name ) : ?>
									<span class="omni-posts-kicker"><?php echo esc_html( $graceful_omni_cat_name ); ?></span>
								<?php endif; ?>
								<h2 class="omni-posts-title"><?php echo esc_html( get_the_title() ); ?></h2>
								<?php if ( $graceful_omni_show_author || $graceful_omni_show_date ) : ?>
									<div class="omni-posts-meta">
										<?php if ( $graceful_omni_show_author ) : ?>
											<span class="omni-posts-author"><?php echo esc_html__( 'By', 'graceful-omni-blog' ); ?> <?php echo esc_html( get_the_author() ); ?></span>
										<?php endif; ?>
										<?php if ( $graceful_omni_show_author && $graceful_omni_show_date ) : ?>
											<span class="omni-posts-separator">•</span>
										<?php endif; ?>
										<?php if ( $graceful_omni_show_date ) : ?>
											<span class="omni-posts-date"><?php echo esc_html( get_the_date() ); ?></span>
										<?php endif; ?>
									</div>
								<?php endif; ?>
							</div>
						</a>
					</article>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php endif; ?>
		</div>
	</div>
</section>
