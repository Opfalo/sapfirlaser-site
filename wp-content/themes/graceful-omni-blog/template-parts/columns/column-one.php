<?php
/**
 * Template part for displaying Posts in One Column
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="content-wrap">
	<?php if ( is_search() ) : ?>
	<h1>
		<?php
		printf(
			/* translators: %s: search query */
			esc_html__( 'Search Results for: %s', 'graceful-omni-blog' ),
			'<span>' . esc_html( get_search_query() ) . '</span>'
		);
		?>
	</h1>
	<?php endif; ?>

	<?php if ( is_category() ) { ?>
		<h1 class="graceful-omni-category-title">
		    <?php echo esc_html( single_cat_title( '', false ) ); ?>
		</h1>
	<?php } ?>
	<ul class="content-column">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php
			$graceful_omni_thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '';
			$graceful_omni_cats      = get_the_category();
			$graceful_omni_cat_name  = ! empty( $graceful_omni_cats ) ? $graceful_omni_cats[0]->name : '';
			$graceful_omni_cat_link  = ! empty( $graceful_omni_cats ) ? esc_url( get_category_link( $graceful_omni_cats[0]->term_id ) ) : '';
			?>
			<li>
				<article id="post-<?php the_ID(); ?>" <?php post_class('content-post omni-blog-card'); ?>>
					<div class="omni-blog-card-image"<?php if ( $graceful_omni_thumb_url ) : ?> style="background-image: url('<?php echo esc_url( $graceful_omni_thumb_url ); ?>');"<?php endif; ?>>
						<?php if ( ! $graceful_omni_thumb_url ) : ?>
							<span class="omni-blog-card-placeholder"></span>
						<?php endif; ?>
					</div>
					<div class="omni-blog-card-overlay">
						<?php if ( graceful_options( 'post_page_show_categories' ) && $graceful_omni_cat_name ) : ?>
							<a class="omni-blog-card-category" href="<?php echo esc_url( $graceful_omni_cat_link ); ?>"><?php echo esc_html( $graceful_omni_cat_name ); ?></a>
						<?php endif; ?>
						<h2 class="omni-blog-card-title">
							<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>
						</h2>
						<?php if ( graceful_options( 'post_page_show_author' ) || graceful_options( 'post_page_show_date' ) ) : ?>
							<div class="omni-blog-card-meta">
								<?php if ( graceful_options( 'post_page_show_author' ) ) : ?>
									<span class="omni-blog-card-author"><?php echo esc_html__( 'By', 'graceful-omni-blog' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
								<?php endif; ?>
								<?php if ( graceful_options( 'post_page_show_author' ) && graceful_options( 'post_page_show_date' ) ) : ?>
									<span class="omni-blog-card-separator">&bull;</span>
								<?php endif; ?>
								<?php if ( graceful_options( 'post_page_show_date' ) ) : ?>
									<span class="omni-blog-card-date"><?php echo esc_html( get_the_date() ); ?></span>
								<?php endif; ?>
							</div>
						<?php endif; ?>
					</div>
				</article>
			</li>

		<?php endwhile; else: ?>
			<div class="no-result-found">
				<h3><?php esc_html_e( 'Nothing Found!', 'graceful-omni-blog' ); ?></h3>
				<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'graceful-omni-blog' ); ?></p>
				<div class="graceful-widget widget_search">
					<?php get_search_form(); ?>
				</div>
			</div>
		<?php endif; //have_posts ?>
	</ul>
	<?php get_template_part( 'template-parts/sections/site', 'pagination' ); ?>
</div><!-- content-wrap -->