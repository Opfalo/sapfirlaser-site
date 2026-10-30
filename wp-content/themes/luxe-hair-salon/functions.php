<?php

/**
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for parent theme Luxe Hair Salon for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/tgm/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'luxe_hair_salon_register_required_plugins', 0);
function luxe_hair_salon_register_required_plugins()
{
	$plugins = array(
		array(
			'name'      => 'Superb Addons',
			'slug'      => 'superb-blocks',
			'required'  => false,
		),
	);

	$config = array(
		'id'           => 'luxe-hair-salon',
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


function luxe_hair_salon_pattern_styles()
{
	wp_enqueue_style('luxe-hair-salonpatterns', get_template_directory_uri() . '/assets/css/patterns.css', array(), filemtime(get_template_directory() . '/assets/css/patterns.css'));
	if (is_admin()) {
		global $pagenow;
		if ('site-editor.php' === $pagenow) {
			// Do not enqueue editor style in site editor
			return;
		}
		wp_enqueue_style('luxe-hair-saloneditor', get_template_directory_uri() . '/assets/css/editor.css', array(), filemtime(get_template_directory() . '/assets/css/editor.css'));
	}
}
add_action('enqueue_block_assets', 'luxe_hair_salon_pattern_styles');


add_theme_support('wp-block-styles');

// Removes the default WordPress patterns
add_action('init', function () {
	remove_theme_support('core-block-patterns');
});

// Register customer Luxe Hair Salon pattern categories
function luxe_hair_salon_register_block_pattern_categories()
{
	register_block_pattern_category(
		'header',
		array(
			'label'       => __('Header', 'luxe-hair-salon'),
			'description' => __('Header patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'call_to_action',
		array(
			'label'       => __('Call To Action', 'luxe-hair-salon'),
			'description' => __('Call to action patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'content',
		array(
			'label'       => __('Content', 'luxe-hair-salon'),
			'description' => __('Luxe Hair Salon content patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'teams',
		array(
			'label'       => __('Teams', 'luxe-hair-salon'),
			'description' => __('Team patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'banners',
		array(
			'label'       => __('Banners', 'luxe-hair-salon'),
			'description' => __('Banner patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'contact',
		array(
			'label'       => __('Contact', 'luxe-hair-salon'),
			'description' => __('Contact patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'layouts',
		array(
			'label'       => __('Layouts', 'luxe-hair-salon'),
			'description' => __('layout patterns', 'luxe-hair-salon'),
		)
	);
	register_block_pattern_category(
		'testimonials',
		array(
			'label'       => __('Testimonial', 'luxe-hair-salon'),
			'description' => __('Testimonial and review patterns', 'luxe-hair-salon'),
		)
	);

}

add_action('init', 'luxe_hair_salon_register_block_pattern_categories');





// Initialize information content
require_once trailingslashit(get_template_directory()) . 'inc/vendor/autoload.php';

use SuperbThemesThemeInformationContent\ThemeEntryPoint;
add_action("init", function () {
ThemeEntryPoint::init([
    'type' => 'block', // block / classic
    'theme_url' => 'https://superbthemes.com/luxe-hair-salon/',
    'demo_url' => 'https://superbthemes.com/demo/luxe-hair-salon/',
    'features' => array(
    	array(
    		'title' => __("Theme Designer", "luxe-hair-salon"),
    		'icon' => "lego-duotone.webp",
    		'description' => __("Choose from over 300 designs for footers, headers, landing pages & all other theme parts.", "luxe-hair-salon")
    	),
    	   	array(
    		'title' => __("Editor Enhancements", "luxe-hair-salon"),
    		'icon' => "1-1.png",
    		'description' => __("Enhanced editor experience, grid systems, improved block control and much more.", "luxe-hair-salon")
    	),
    	array(
    		'title' => __("Custom CSS", "luxe-hair-salon"),
    		'icon' => "2-1.png",
    		'description' => __("Add custom CSS with syntax highlight, custom display settings, and minified output.", "luxe-hair-salon")
    	),
    	array(
    		'title' => __("Animations", "luxe-hair-salon"),
    		'icon' => "wave-triangle-duotone.webp",
    		'description' => __("Animate any element on your website with one click. Choose from over 50+ animations.", "luxe-hair-salon")
    	),
    	array(
    		'title' => __("WooCommerce Integration", "luxe-hair-salon"),
    		'icon' => "shopping-cart-duotone.webp",
    		'description' => __("Choose from over 100 unique WooCommerce designs for your e-commerce store.", "luxe-hair-salon")
    	),
    	array(
    		'title' => __("Responsive Controls", "luxe-hair-salon"),
    		'icon' => "arrows-out-line-horizontal-duotone.webp",
    		'description' => __("Make any theme mobile-friendly with SuperbThemes responsive controls.", "luxe-hair-salon")
    	)
    )
]);
});