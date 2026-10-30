<?php
/**
 * Graceful Omni Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Graceful Omni Blog
 */

// ----------------------------------------------------------------------------------
//  Register Front-End Styles And Scripts
// ----------------------------------------------------------------------------------

function graceful_omni_blog_enqueue_child_assets() {

    // Parent theme style
    wp_enqueue_style(
        'graceful-style',
        get_template_directory_uri() . '/style.css'
    );

    // Child theme style
    wp_enqueue_style(
        'graceful-omni-blog-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'graceful-style' ),
        wp_get_theme()->get( 'Version' )
    );

    // Child theme custom JS
    wp_enqueue_script(
        'graceful-omni-blog-main', // Handle name
        get_stylesheet_directory_uri() . '/assets/js/omni-slider.js',
        array( 'jquery' ), // Dependencies
        wp_get_theme()->get( 'Version' ),
        false // Load in footer
    );


}
add_action( 'wp_enqueue_scripts', 'graceful_omni_blog_enqueue_child_assets' );

// ----------------------------------------------------------------------------------
//  Override Parent Theme Defaults
// ----------------------------------------------------------------------------------

/**
 * Override parent theme header width default to full width
 *
 * @param array $defaults Parent theme default options.
 * @return array Modified defaults.
 */
function graceful_omni_blog_override_parent_defaults( $defaults ) {
	if ( isset( $defaults['basic_header_width'] ) ) {
		$defaults['basic_header_width'] = 'full';
	}
	return $defaults;
}
add_filter( 'option_graceful_options', 'graceful_omni_blog_override_parent_defaults', 10 );

/**
 * Set header width to full on theme activation
 */
function graceful_omni_blog_set_header_width() {
	$graceful_omni_parent_options = get_option( 'graceful_options', array() );
	
	if ( ! isset( $graceful_omni_parent_options['basic_header_width'] ) || 'contained' === $graceful_omni_parent_options['basic_header_width'] ) {
		$graceful_omni_parent_options['basic_header_width'] = 'full';
		update_option( 'graceful_options', $graceful_omni_parent_options );
	}
}
add_action( 'after_switch_theme', 'graceful_omni_blog_set_header_width' );

// Load after Theme Setup
function graceful_omni_blog_theme_setup() {

    // ----------------------------------------------------------------------------------
    //  Register New Sections in Customizer
    // ----------------------------------------------------------------------------------
    function graceful_omni_blog_customize_register( $wp_customize ) {

        /*** Omni Latest Posts ***/
        // Omni Posts section
        $wp_customize->add_section( 'graceful_omni_latest_posts' , array(
            'title'      => esc_html__( 'Omni Latest Posts', 'graceful-omni-blog' ),
            'priority'   => 27,
            'capability' => 'edit_theme_options'
        ) );

        // Omni Posts Enable
        $wp_customize->add_setting( 'graceful_omni_blog_options[latest_posts_show]', array(
            'default'    => graceful_omni_blog_options( 'latest_posts_show' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[latest_posts_show]', array(
            'label'     => esc_html__( 'Enable Latest Posts', 'graceful-omni-blog' ),
            'section'   => 'graceful_omni_latest_posts',
            'type'      => 'checkbox',
            'priority'  => 1
        ) );

        // Omni Latest Posts Width
        $graceful_omni_latest_posts_width_choices = array(
            'full'    => esc_html__( 'Full Width', 'graceful-omni-blog' ),
            'wrapped' => esc_html__( 'Boxed', 'graceful-omni-blog' ),
        );

        $wp_customize->add_setting( 'graceful_omni_blog_options[latest_posts_width]', array(
            'default'           => graceful_omni_blog_options( 'latest_posts_width' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_select'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[latest_posts_width]', array(
            'label'    => esc_html__( 'Section Width', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_latest_posts',
            'type'     => 'select',
            'choices'  => $graceful_omni_latest_posts_width_choices,
            'priority' => 2
        ) );

        // Show Category
        $wp_customize->add_setting( 'graceful_omni_blog_options[latest_posts_show_category]', array(
            'default'           => graceful_omni_blog_options( 'latest_posts_show_category' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[latest_posts_show_category]', array(
            'label'    => esc_html__( 'Show Category', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_latest_posts',
            'type'     => 'checkbox',
            'priority' => 3
        ) );

        // Show Author
        $wp_customize->add_setting( 'graceful_omni_blog_options[latest_posts_show_author]', array(
            'default'           => graceful_omni_blog_options( 'latest_posts_show_author' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[latest_posts_show_author]', array(
            'label'    => esc_html__( 'Show Author', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_latest_posts',
            'type'     => 'checkbox',
            'priority' => 4
        ) );

        // Show Date
        $wp_customize->add_setting( 'graceful_omni_blog_options[latest_posts_show_date]', array(
            'default'           => graceful_omni_blog_options( 'latest_posts_show_date' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[latest_posts_show_date]', array(
            'label'    => esc_html__( 'Show Date', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_latest_posts',
            'type'     => 'checkbox',
            'priority' => 5
        ) );


        /*** Featured Links ***/
        // Featured Links section
        $wp_customize->add_section( 'graceful_omni_featured_links' , array(
            'title'      => esc_html__( 'Omni Featured Links', 'graceful-omni-blog' ),
            'priority'   => 28,
            'capability' => 'edit_theme_options'
        ) );

        // Enable Featured Links
        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_links_show]', array(
            'default'           => graceful_omni_blog_options( 'featured_links_show' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_links_show]', array(
            'label'    => esc_html__( 'Enable Featured Links', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'checkbox',
            'priority' => 1
        ) );

        // Featured Links Width
        $graceful_omni_featured_links_width_choices = array(
            'full'    => esc_html__( 'Full Width', 'graceful-omni-blog' ),
            'wrapped' => esc_html__( 'Boxed', 'graceful-omni-blog' ),
        );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_links_width]', array(
            'default'           => graceful_omni_blog_options( 'featured_links_width' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_select'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_links_width]', array(
            'label'    => esc_html__( 'Section Width', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'select',
            'choices'  => $graceful_omni_featured_links_width_choices,
            'priority' => 2
        ) );

        // Background Color
        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_links_bg_color]', array(
            'default'           => graceful_omni_blog_options( 'featured_links_bg_color' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_omni_blog_options[featured_links_bg_color]', array(
            'label'    => esc_html__( 'Background Color', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'priority' => 3
        ) ) );

        // Link 1
        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_title_1]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_title_1' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_title_1]', array(
            'label'    => esc_html__( 'Link 1 Title', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'text',
            'priority' => 4
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_url_1]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_url_1' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_url_1]', array(
            'label'    => esc_html__( 'Link 1 URL', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'url',
            'priority' => 5
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_image_1]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_omni_blog_options[featured_link_image_1]', array(
                'label'       => esc_html__( 'Link 1 Image', 'graceful-omni-blog' ),
                'section'     => 'graceful_omni_featured_links',
                'flex_width'  => true,
                'flex_height' => true,
                'width'       => 400,
                'height'      => 300,
                'priority'    => 6
            )
        ) );

        // Link 2
        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_title_2]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_title_2' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_title_2]', array(
            'label'    => esc_html__( 'Link 2 Title', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'text',
            'priority' => 7
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_url_2]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_url_2' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_url_2]', array(
            'label'    => esc_html__( 'Link 2 URL', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'url',
            'priority' => 8
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_image_2]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_omni_blog_options[featured_link_image_2]', array(
                'label'       => esc_html__( 'Link 2 Image', 'graceful-omni-blog' ),
                'section'     => 'graceful_omni_featured_links',
                'flex_width'  => true,
                'flex_height' => true,
                'width'       => 400,
                'height'      => 300,
                'priority'    => 9
            )
        ) );

        // Link 3
        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_title_3]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_title_3' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_title_3]', array(
            'label'    => esc_html__( 'Link 3 Title', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'text',
            'priority' => 10
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_url_3]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_url_3' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_url_3]', array(
            'label'    => esc_html__( 'Link 3 URL', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'url',
            'priority' => 11
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_image_3]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_omni_blog_options[featured_link_image_3]', array(
                'label'       => esc_html__( 'Link 3 Image', 'graceful-omni-blog' ),
                'section'     => 'graceful_omni_featured_links',
                'flex_width'  => true,
                'flex_height' => true,
                'width'       => 400,
                'height'      => 300,
                'priority'    => 12
            )
        ) );

        // Link 4
        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_title_4]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_title_4' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_title_4]', array(
            'label'    => esc_html__( 'Link 4 Title', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'text',
            'priority' => 13
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_url_4]', array(
            'default'           => graceful_omni_blog_options( 'featured_link_url_4' ),
            'type'              => 'option',
            'transport'         => 'refresh',
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[featured_link_url_4]', array(
            'label'    => esc_html__( 'Link 4 URL', 'graceful-omni-blog' ),
            'section'  => 'graceful_omni_featured_links',
            'type'     => 'url',
            'priority' => 14
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[featured_link_image_4]', array(
            'default'           => '',
            'type'              => 'option',
            'transport'         => 'refresh',
            'sanitize_callback' => 'absint'
        ) );
        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_omni_blog_options[featured_link_image_4]', array(
                'label'       => esc_html__( 'Link 4 Image', 'graceful-omni-blog' ),
                'section'     => 'graceful_omni_featured_links',
                'flex_width'  => true,
                'flex_height' => true,
                'width'       => 400,
                'height'      => 300,
                'priority'    => 15
            )
        ) );


        /** Omni Post Slider */
        // Enable Post Slider
        $wp_customize->add_section( 'graceful_omni_post_slider' , array(
            'title'      => esc_html__( 'Omni Post Slider', 'graceful-omni-blog' ),
            'priority'   => 26,
            'capability' => 'edit_theme_options'
        ) );

        // Enable Latest Post Section
        $wp_customize->add_setting( 'graceful_omni_blog_options[omni_post_slider_show]', array(
            'default'    => graceful_omni_blog_options( 'omni_post_slider_show' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[omni_post_slider_show]', array(
            'label'     => esc_html__( 'Enable Omni Post Slider', 'graceful-omni-blog' ),
            'section'   => 'graceful_omni_post_slider',
            'type'      => 'checkbox',
            'priority'  => 1
        ) );

        // Omni Slider Layout Width
        $boxed_width_omni_slider = array(
            'full' => esc_html__( 'Full', 'graceful-omni-blog' ),
            'wrapped' => esc_html__( 'Boxed', 'graceful-omni-blog' ),
        );

        $wp_customize->add_setting( 'graceful_omni_blog_options[omni_slider_width]', array(
            'default'    => graceful_omni_blog_options( 'omni_slider_width' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_select'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[omni_slider_width]', array(
            'label'         => esc_html__( 'Slider Width', 'graceful-omni-blog' ),
            'section'       => 'graceful_omni_post_slider',
            'type'          => 'select',
            'choices'       => $boxed_width_omni_slider,
            'priority'      => 2
        ) );




        /*** Hero Banner ***/
        // Hero Banner section
        $wp_customize->add_section( 'graceful_omni_hero_banner' , array(
            'title'      => esc_html__( 'Hero Banner', 'graceful-omni-blog' ),
            'priority'   => 27,
            'capability' => 'edit_theme_options'
        ) );


        // Hero Banner Enable
        $wp_customize->add_setting( 'graceful_omni_blog_options[hero_banner_show]', array(
            'default'    => graceful_omni_blog_options( 'hero_banner_show' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[hero_banner_show]', array(
            'label'     => esc_html__( 'Enable Hero Banner', 'graceful-omni-blog' ),
            'section'   => 'graceful_omni_hero_banner',
            'type'      => 'checkbox',
            'priority'  => 1
        ) );

        // Hero Banner
        $wp_customize->add_setting( 'graceful_omni_blog_options[hero_banner_image_1]', array(
            'default'   => '',
            'type'      => 'option',
            'transport' => 'refresh',
            'sanitize_callback' => 'graceful_sanitize_number_absint'
        ) );
        $wp_customize->add_control(
            new WP_Customize_Cropped_Image_Control( $wp_customize, 'graceful_omni_blog_options[hero_banner_image_1]', array(
                'label'         => esc_html__( 'Image', 'graceful-omni-blog' ),
                'section'       => 'graceful_omni_hero_banner',
                'flex_width'    => false,
                'flex_height'   => false,
                'width'         => 400,
                'height'        => 400,
                'priority'      => 15
            )
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[hero_banner_title_1]', array(
            'default'    => graceful_omni_blog_options( 'hero_banner_title_1' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[hero_banner_title_1]', array(
            'label'     => esc_html__( 'Title', 'graceful-omni-blog' ),
            'section'   => 'graceful_omni_hero_banner',
            'type'      => 'text',
            'priority'  => 17
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[hero_banner_url_1]', array(
            'default'    => graceful_omni_blog_options( 'hero_banner_url_1' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'esc_url_raw'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[hero_banner_url_1]', array(
            'label'     => esc_html__( 'Link URL', 'graceful-omni-blog' ),
            'section'   => 'graceful_omni_hero_banner',
            'type'      => 'text',
            'priority'  => 19
        ) );

        $wp_customize->add_setting( 'graceful_omni_blog_options[hero_banner_button_color]', array(
            'default'    => graceful_omni_blog_options('hero_banner_button_color'),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_omni_blog_options[hero_banner_button_color]', array(
            'label'     => esc_html__( 'Button Color', 'graceful-omni-blog' ),
            'section'   => 'graceful_omni_hero_banner',
            'priority'  => 21
        ) ) );

        // Hero Banner Layout Width
        $boxed_width_hero_banner = array(
            'full' => esc_html__( 'Full', 'graceful-omni-blog' ),
            'wrapped' => esc_html__( 'Boxed', 'graceful-omni-blog' ),
        );

        $wp_customize->add_setting( 'graceful_omni_blog_options[hero_banner_width]', array(
            'default'    => graceful_omni_blog_options( 'hero_banner_width' ),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_select'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[hero_banner_width]', array(
            'label'         => esc_html__( 'Hero Banner Width', 'graceful-omni-blog' ),
            'section'       => 'graceful_basic',
            'type'          => 'select',
            'choices'       => $boxed_width_hero_banner,
            'priority'      => 28
        ) );

        // Sanitize number absint
        function graceful_sanitize_number_absint( $number, $setting ) {

            // ensure $number is an absolute integer
            $number = absint( $number );

            // return default if not integer
            return ( $number ? $number : $setting->default );

        }

        // Enqueue customizer styles
        function graceful_omni_customizer_css() {
            wp_enqueue_style( 'graceful-customize-style', get_theme_file_uri( '/assets/css/customize-ui.css' ) );
        }
        add_action( 'customize_controls_enqueue_scripts', 'graceful_omni_customizer_css' );



        /*** Top Navigation ***/
        // add Top Navigation section
        $wp_customize->add_panel(
            'layout_settings',
            array(
                'priority'   => 20,
                'capability' => 'edit_theme_options',
                'title'      => __( 'Top Navigaion', 'graceful-omni-blog' ),
            )
        );

        $wp_customize->add_section( 'graceful_top_navigation' , array(
            'title'      => esc_html__( 'Top Navigation', 'graceful-omni-blog' ),
            'priority'   => 23,
            'capability' => 'edit_theme_options'
        ) );

        // Top Navigation
        $wp_customize->add_setting( 'graceful_omni_blog_options[top_navigation_show]', array(
            'default'    => graceful_omni_blog_options('top_navigation_show'),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'graceful_sanitize_checkboxes'
        ) );
        $wp_customize->add_control( 'graceful_omni_blog_options[top_navigation_show]', array(
            'label'     => esc_html__( 'Enable Top Navigation', 'graceful-omni-blog' ),
            'section'   => 'graceful_top_navigation',
            'type'      => 'checkbox',
            'priority'  => 1
        ) );

        // Top Navigation Background Color
        $wp_customize->add_setting( 'graceful_omni_blog_options[top_navigation_bg]', array(
            'default'    => graceful_omni_blog_options('top_navigation_bg'),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_omni_blog_options[top_navigation_bg]', array(
            'label'     => esc_html__( 'Top Navigation Background Color', 'graceful-omni-blog' ),
            'section'   => 'graceful_top_navigation',
            'priority'  => 3
        ) ) );

        // Top Navigation Text Color
        $wp_customize->add_setting( 'graceful_omni_blog_options[top_navigation_text_color]', array(
            'default'    => graceful_omni_blog_options('top_navigation_text_color'),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_omni_blog_options[top_navigation_text_color]', array(
            'label'     => esc_html__( 'Top Navigation Text Color', 'graceful-omni-blog' ),
            'section'   => 'graceful_top_navigation',
            'priority'  => 5
        ) ) );

        //Main Navigation Background Color
        $wp_customize->add_setting( 'graceful_omni_blog_options[main_navigation_bg]', array(
            'default'    => graceful_omni_blog_options('main_navigation_bg'),
            'type'       => 'option',
            'transport'  => 'refresh',
            'capability' => 'edit_theme_options',
            'sanitize_callback' => 'sanitize_hex_color'
        ) );
        $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'graceful_omni_blog_options[main_navigation_bg]', array(
            'label'     => esc_html__( 'Main Navigation Background Color', 'graceful-omni-blog' ),
            'section'   => 'graceful_main_navigation',
            'priority'  => 15
        ) ) );

    }
    add_action( 'customize_register', 'graceful_omni_blog_customize_register', 99 );


    register_nav_menus(
        array(
            'top'  => esc_html__( 'Top Menu', 'graceful-omni-blog' ),
        )
    );

    function graceful_top_menu_fallback() {
        if ( current_user_can( 'edit_theme_options' ) ) {
            ?>
            <ul id="top-menu">
                <li>
                    <a href="<?php echo esc_url( home_url( '/wp-admin/nav-menus.php') ) ?>">
                        <?php esc_html_e( 'Set-up Top Menu', 'graceful-omni-blog' ) ?>
                    </a>
                </li>
            </ul>
            <?php
        }
    }

    function graceful_omni_blog_options( $controls ) {

        $graceful_omni_blog_defaults = array(
            'top_navigation_show' => false,
            'top_navigation_bg' => '#ffffff',
            'top_navigation_text_color' => '#333333',
            'main_navigation_bg' => '#f9f4f1',
            'blog_grid_excerpt_length' => '50',
            'latest_posts_show' => false,
            'latest_posts_width' => 'full',
            'latest_posts_show_category' => true,
            'latest_posts_show_author' => true,
            'latest_posts_show_date' => true,
            'featured_links_show' => false,
            'featured_links_width' => 'full',
            'featured_links_bg_color' => '#ffffff',
            'featured_link_title_1' => '',
            'featured_link_url_1' => '',
            'featured_link_image_1' => '',
            'featured_link_title_2' => '',
            'featured_link_url_2' => '',
            'featured_link_image_2' => '',
            'featured_link_title_3' => '',
            'featured_link_url_3' => '',
            'featured_link_image_3' => '',
            'featured_link_title_4' => '',
            'featured_link_url_4' => '',
            'featured_link_image_4' => '',
            'omni_post_slider_show' => true,
            'omni_slider_width' => 'full',
            'hero_banner_show' => false,
            'hero_banner_window' => true,
            'hero_banner_width' => 'full',
            'hero_banner_title_1' => '',
            'hero_banner_url_1' => '',
            'hero_banner_image_1' => '',
            'hero_banner_button_color' => '#000000'
        );

        // merge defaults and options
        $graceful_omni_blog_defaults = wp_parse_args( get_option( 'graceful_omni_blog_options' ), $graceful_omni_blog_defaults );

        // return control
        return $graceful_omni_blog_defaults[ $controls ];

    }
}
add_action( 'after_setup_theme', 'graceful_omni_blog_theme_setup' );

// ----------------------------------------------------------------------------------
//  New Fonts
// ----------------------------------------------------------------------------------
function graceful_omni_blog_enqueue_assets()
{
    // Include the file.
    require_once get_theme_file_path('webfont-loader/wptt-webfont-loader.php');
    // Load the webfont.
    wp_enqueue_style(
        'minimalist-stories-fonts',
        wptt_get_webfont_url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@400;700&display=auto'),
        array(),
        '1.0'
    );
}
add_action( 'wp_enqueue_scripts', 'graceful_omni_blog_enqueue_assets' );

// ----------------------------------------------------------------------------------
//  Custom Excerpt Length
// ----------------------------------------------------------------------------------

/**
 * Modify excerpt length for blog listing
 *
 * @param int $length Excerpt length.
 * @return int Modified excerpt length.
 */
function graceful_omni_blog_excerpt_length( $length ) {
	return 30;
}
add_filter( 'excerpt_length', 'graceful_omni_blog_excerpt_length', 9999 );

/**
 * Override parent theme excerpt length option
 *
 * @param array $defaults Parent theme options.
 * @return array Modified options.
 */
function graceful_omni_blog_override_excerpt_length( $defaults ) {
	if ( isset( $defaults['post_page_excerpt_length'] ) ) {
		$defaults['post_page_excerpt_length'] = '30';
	}
	if ( isset( $defaults['post_page_grid_excerpt_length'] ) ) {
		$defaults['post_page_grid_excerpt_length'] = '30';
	}
	return $defaults;
}
add_filter( 'option_graceful_options', 'graceful_omni_blog_override_excerpt_length', 20 );

// ----------------------------------------------------------------------------------
//  Dynamic Inline Styles
// ----------------------------------------------------------------------------------

/**
 * Add inline styles for customizer options
 */
function graceful_omni_blog_inline_styles() {
	$graceful_omni_links_bg = graceful_omni_blog_options( 'featured_links_bg_color' );

	$graceful_omni_custom_css = '';

	if ( $graceful_omni_links_bg && '#f9f4f1' !== $graceful_omni_links_bg ) {
		$graceful_omni_custom_css .= '.graceful-omni-featured-links { background: ' . esc_attr( $graceful_omni_links_bg ) . '; }';
	}

	if ( ! empty( $graceful_omni_custom_css ) ) {
		wp_add_inline_style( 'graceful-omni-blog-style', $graceful_omni_custom_css );
	}
}
add_action( 'wp_enqueue_scripts', 'graceful_omni_blog_inline_styles', 20 );

// ----------------------------------------------------------------------------------
//  Include Widget Files
// ----------------------------------------------------------------------------------
require get_stylesheet_directory() . '/inc/widgets/social-media-widget.php';