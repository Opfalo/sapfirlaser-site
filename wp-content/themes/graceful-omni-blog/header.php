<?php
/**
 * The header for our theme
 *
 * This is the template that displays the <head> section, Header and Navigation
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Graceful Omni Blog
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

	<?php
	if ( graceful_options( 'basic_header_width' ) === 'wrapped' ) {
	    $graceful_header_width = 'class=wrapped-content';
	} else {
	    $graceful_header_width = '';
	}
	if ( graceful_options( 'basic_content_width' ) === 'wrapped' ) {
	    $graceful_content_width = 'wrapped-content';
	} else {
	    $graceful_content_width = '';
	}
	?>

	<?php // Site Loading Animation
	get_template_part('template-parts/sections/site', 'loadinganim'); 
	?>

	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'graceful-omni-blog' ); ?></a>	

	<div id="site-container">
		<div id="site-header" <?php echo esc_attr( $graceful_header_width ); ?>>
		<?php
		
		get_template_part( 'template-parts/header/main', 'navigation' );
		get_template_part( 'template-parts/header/site', 'header' );
		get_template_part( 'template-parts/header/top', 'navigation' );
		
		?>
		</div><!-- site-header close -->

		<!-- Page Content -->
		<main id="primary" class="site-main">
		<?php
			if ( is_home() && !is_paged() ) {

			    // Show Omni Post Slider if enabled
			    $graceful_omni_post_slider_enabled = graceful_omni_blog_options('omni_post_slider_show');

			    if ( $graceful_omni_post_slider_enabled ) {
			        get_template_part('template-parts/sections/omni', 'slider');
			    }
			    
				// Show Omni Latest Posts if enabled
			    $graceful_omni_posts_enabled = graceful_omni_blog_options('latest_posts_show');

			    if ( $graceful_omni_posts_enabled ) {
			        get_template_part('template-parts/sections/omni', 'posts');
			    }

			    // Show Featured Links if enabled
			    $graceful_omni_featured_links_enabled = graceful_omni_blog_options('featured_links_show');

			    if ( $graceful_omni_featured_links_enabled ) {
			        get_template_part('template-parts/sections/featured', 'links');
			    }

			    // Show Post Slider if enabled
			    $graceful_post_slider_enabled = graceful_options('post_slider_label');

			    if ( $graceful_post_slider_enabled ) {
			        get_template_part('template-parts/sections/post', 'slider');
			    }

			    // Show Hero Banner if enabled
			    $graceful_hero_banner_enabled = graceful_omni_blog_options('hero_banner_show');

			    if ( $graceful_hero_banner_enabled ) {
			        get_template_part('template-parts/sections/hero', 'banner');
			    }
			}
		?>
		<div class="main-content clear-fix <?php echo esc_attr( $graceful_content_width ); ?>" data-layout="<?php echo esc_attr( graceful_page_layout() ); ?>" data-sidebar-sticky="<?php echo esc_attr( graceful_options( 'basic_sidebar_sticky' ) ); ?>">
