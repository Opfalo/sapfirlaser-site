<?php
/**
 * Template part for Single Post Content
 *
 * @package Graceful_Omni_Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$graceful_omni_tag_allowed = array(
	'a'   => array(
		'href' => array(),
		'rel'  => array(),
	),
	'div' => array(
		'class' => array(),
	),
);

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();

			$graceful_omni_thumb_url = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : '';
			$graceful_omni_cats      = get_the_category();
			$graceful_omni_cat_name  = ! empty( $graceful_omni_cats ) ? $graceful_omni_cats[0]->name : '';
			$graceful_omni_cat_link  = ! empty( $graceful_omni_cats ) ? get_category_link( $graceful_omni_cats[0]->term_id ) : '';
			?>

			<div class="omni-single-header">
				<div class="omni-single-header-image"<?php if ( $graceful_omni_thumb_url ) : ?> style="background-image: url('<?php echo esc_url( $graceful_omni_thumb_url ); ?>');"<?php endif; ?>>
					<?php if ( ! $graceful_omni_thumb_url ) : ?>
						<span class="omni-single-header-placeholder"></span>
					<?php endif; ?>
				</div>
				<div class="omni-single-header-overlay">
					<?php if ( graceful_options( 'single_post_page_show_categories' ) && $graceful_omni_cat_name ) : ?>
						<a class="omni-single-header-category" href="<?php echo esc_url( $graceful_omni_cat_link ); ?>"><?php echo esc_html( $graceful_omni_cat_name ); ?></a>
					<?php endif; ?>
					<h1 class="omni-single-header-title"><?php the_title(); ?></h1>
					<?php if ( graceful_options( 'single_post_page_show_author' ) || graceful_options( 'single_post_page_show_date' ) ) : ?>
						<div class="omni-single-header-meta">
							<?php if ( graceful_options( 'single_post_page_show_author' ) ) : ?>
								<span class="omni-single-header-author"><?php echo esc_html__( 'By', 'graceful-omni-blog' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a></span>
							<?php endif; ?>
							<?php if ( graceful_options( 'single_post_page_show_author' ) && graceful_options( 'single_post_page_show_date' ) ) : ?>
								<span class="omni-single-header-separator">&bull;</span>
							<?php endif; ?>
							<?php if ( graceful_options( 'single_post_page_show_date' ) ) : ?>
								<span class="omni-single-header-date"><?php echo esc_html( get_the_date() ); ?></span>
							<?php endif; ?>
						</div>
					<?php endif; ?>
				</div>
			</div>

			<div class="post-page-content">
				<?php
				the_content();
				$graceful_omni_link_pages_args = array(
					'before' => '<p class="site-pagination">' . esc_html__( 'Pages:', 'graceful-omni-blog' ),
					'after'  => '</p>',
				);
				wp_link_pages( $graceful_omni_link_pages_args );
				?>
			</div>

			<footer class="post-footer">
				<?php
				$graceful_omni_tag_list = get_the_tag_list( '<div class="post-tags">', '', '</div>' );
				if ( graceful_options( 'single_post_page_show_tags' ) && $graceful_omni_tag_list ) {
					echo wp_kses( $graceful_omni_tag_list, $graceful_omni_tag_allowed );
				}
				if ( graceful_options( 'single_post_page_show_comments' ) && comments_open() ) {
					comments_popup_link(
						esc_html__( 'No Comments', 'graceful-omni-blog' ),
						esc_html__( '1 Comment', 'graceful-omni-blog' ),
						'% ' . esc_html__( 'Comments', 'graceful-omni-blog' ),
						'post-comments'
					);
				}
				?>
			</footer>

			<?php
		endwhile;
	endif;
	?>
</article>
