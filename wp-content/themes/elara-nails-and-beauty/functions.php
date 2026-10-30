<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Elara Nails And Beauty for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'elara_nails_and_beauty_register_required_plugins', 0);
function elara_nails_and_beauty_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'elara-nails-and-beauty',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => true,
		'message'      => '',
	);

	tgmpa($plugins, $config);
}


function elara_nails_and_beauty_pattern_styles()
{
	wp_enqueue_style('elara-nails-and-beautypatterns', get_stylesheet_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('elara-nails-and-beautyeditor', get_stylesheet_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'elara_nails_and_beauty_pattern_styles');


add_theme_support('wp-block-styles');

// Removes the default wordpress patterns
add_action('init', function () {
	remove_theme_support('core-block-patterns');
});

// Register customer Elara Nails And Beauty pattern categories
function elara_nails_and_beauty_register_block_pattern_categories()
{
	register_block_pattern_category(
		'header',
		array(
			'label'       => __('Header', 'elara-nails-and-beauty'),
			'description' => __('Header patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'call_to_action',
		array(
			'label'       => __('Call To Action', 'elara-nails-and-beauty'),
			'description' => __('Call to action patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'content',
		array(
			'label'       => __('Content', 'elara-nails-and-beauty'),
			'description' => __('Elara Nails And Beauty content patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'elara-nails-and-beauty'),
			'description' => __('Team patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'banners',
		array(
			'label'       => __('Banners', 'elara-nails-and-beauty'),
			'description' => __('Banner patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'contact',
		array(
			'label'       => __('Contact', 'elara-nails-and-beauty'),
			'description' => __('Contact patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'layouts',
		array(
			'label'       => __('Layouts', 'elara-nails-and-beauty'),
			'description' => __('layout patterns', 'elara-nails-and-beauty'),
		)
	);
	register_block_pattern_category(
		'testimonials',
		array(
			'label'       => __('Testimonial', 'elara-nails-and-beauty'),
			'description' => __('Testimonial and review patterns', 'elara-nails-and-beauty'),
		)
	);

}

add_action('init', 'elara_nails_and_beauty_register_block_pattern_categories');



