<?php
/**
 * All settings in customizer go here
 *
 * @package Wordpress
 * @param object $wp_customize
 * @since   1.0
 */
function pencidesign_register_theme_customizer( $wp_customize ) {

	// Add Sections
	$wp_customize->add_section( 'pencidesign_new_section_custom_css', array(
		'title'       => 'Custom CSS',
		'description' => 'Add your custom CSS which will overwrite the theme CSS',
		'priority'    => 80,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_portfolio', array(
		'title'       => 'Colors for Portfolio',
		'description' => __( 'To use this options you need to install & active "Penci Portfolio" plugin in Appearance -> Install Plugins', 'pencidesign' ),
		'priority'    => 76,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_posts', array(
		'title'       => 'Colors for Single',
		'description' => '',
		'priority'    => 75,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_footer', array(
		'title'       => 'Colors for Footer',
		'description' => '',
		'priority'    => 70,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_sidebar', array(
		'title'       => 'Colors for Sidebar',
		'description' => '',
		'priority'    => 65,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_grid_masonry_layout', array(
		'title'       => 'Colors for Other Post Layout',
		'description' => __( 'All options here for Grid Layout, Grid Masonry Layout, List Layout and List Boxed Layout', 'pencidesign' ),
		'priority'    => 62,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_standard_layout', array(
		'title'       => 'Colors for Standard & Classic Post Layout',
		'description' => __( 'All options here for Standard Layout, Standard Masonry Layout, Classic Layout and Classic Masonry Layout', 'pencidesign' ),
		'priority'    => 61,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_featured_slider', array(
		'title'       => 'Colors for Featured Slider',
		'description' => '',
		'priority'    => 60,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_vertical_nav', array(
		'title'       => 'Color for Vertical & Mobile Nav',
		'description' => 'Choose Header 3 or Header 4 style and click show nav to see all changes',
		'priority'    => 56,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_topbar', array(
		'title'       => 'Colors for Header',
		'description' => '',
		'priority'    => 55,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_color_general', array(
		'title'       => 'Colors & Patterns General',
		'description' => '',
		'priority'    => 50,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_portfolio', array(
		'title'       => 'Portfolio Options',
		'description' => __( 'To use this options you need to install & active "Penci Portfolio" plugin in Appearance -> Install Plugins', 'pencidesign' ),
		'priority'    => 47,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_not_found', array(
		'title'       => '404 Page Options',
		'description' => '',
		'priority'    => 46,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_footer', array(
		'title'       => 'Footer Options',
		'description' => '',
		'priority'    => 45,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_social', array(
		'title'       => 'Social Media Options',
		'description' => 'Enter your social media usernames. With only Linkedin, you need fill full your Linkedin URL, Icons will not show if left blank.',
		'priority'    => 40,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_page', array(
		'title'       => 'Page Options',
		'description' => '',
		'priority'    => 35,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_post', array(
		'title'       => 'Single Options',
		'description' => '',
		'priority'    => 30,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_grid', array(
		'title'       => 'Other Layout Options',
		'description' => __( 'All options here for Grid Layout, Masonry Layout, List Layout and List Boxed Layout', 'pencidesign' ),
		'priority'    => 25,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_standard', array(
		'title'       => 'Standard & Classic Layout Options',
		'description' => '',
		'priority'    => 20,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_featured', array(
		'title'       => 'Featured Slider Options',
		'description' => '',
		'priority'    => 15,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_featured_video', array(
		'title'       => 'Header Video Background Options',
		'description' => '',
		'priority'    => 10,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_logo_header', array(
		'title'       => 'Logo and Header Options',
		'description' => '',
		'priority'    => 5,
	) );
	$wp_customize->add_section( 'pencidesign_new_section_general', array(
		'title'       => 'General Options',
		'description' => '',
		'priority'    => 1,
	) );


	/**
	 * Add settings
	 *
	 * @package Wordpress
	 */

	// General
	$wp_customize->add_setting( 'penci_favicon', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_home_layout', array(
		'default'           => 'standard',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_home_title', array(
		'default'           => 'Latest Posts',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_archive_layout', array(
		'default'           => 'standard',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_sticky', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_home', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	$wp_customize->add_setting( 'penci_sidebar_posts', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_archive', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_font_for_title', array(
		'default'           => 'Oswald',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_font_for_body', array(
		'default'           => 'Merriweather',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_name_home', array(
		'default'           => 'main-sidebar',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_name_single', array(
		'default'           => 'main-sidebar',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_name_pages', array(
		'default'           => 'main-sidebar',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );

	// Header and logo
	$wp_customize->add_setting( 'penci_logo', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_logo_retina', array(
		'sanitize_callback' => 'esc_url_raw'
	) );

	$wp_customize->add_setting( 'penci_mobile_nav_logo', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_mobile_nav_logo_retina', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_header_padding', array(
		'default'           => '40',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_header_layout', array(
		'default'           => 'header-1',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_header_social_check', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_topbar_search_check', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_header_logo_vertical', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_header_social_vertical', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_topbar_mega_date', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	// Header Video Background
	$wp_customize->add_setting( 'penci_enable_featured_video_bg', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_video_img_mobile', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_featured_video_url', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_featured_video_start', array(
		'default'           => '0',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_featured_video_audio', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	// Featured slider
	$wp_customize->add_setting( 'penci_featured_slider', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_style', array(
		'default'           => 'style-1',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_autoplay', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_auto_time', array(
		'default'           => '3000',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_auto_speed', array(
		'default'           => '500',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_featured_penci_slider_height', array(
		'default'           => '',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_color_overlay_opacity', array(
		'default'           => '0',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_color_overlay', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_partent_overlay_opacity', array(
		'default'           => '0.05',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_cat', array(
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_cat_hide', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_center_box', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_meta_author', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_meta_date', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_slides', array(
		'default'           => '6',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );

	// Standard Settings
	$wp_customize->add_setting( 'penci_standard_icon_format', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_standard_thumbnail', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_standard_share_box', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_standard_cat', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_standard_author', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_standard_date', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_standard_comment', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	// Grid Settings
	$wp_customize->add_setting( 'penci_grid_icon_format', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_grid_share_box', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_grid_cat', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_grid_date', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_grid_comment', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_excerpt_length', array(
		'default'           => 30,
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );


	// Single Settings
	$wp_customize->add_setting( 'penci_post_tags', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_author', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_related', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_related_text', array(
		'default'           => 'You may also like',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_post_related_autoplay', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_numbers_related_post', array(
		'default'           => '10',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_post_share', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_thumb', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_nav', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_post_cat', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_single_meta_author', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_single_meta_date', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_single_meta_comment', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	// Page Settings
	$wp_customize->add_setting( 'penci_page_comments', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_page_share', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_page_under_construction_time', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Social Media

	$wp_customize->add_setting( 'penci_facebook', array(
		'default'           => 'pencidesign',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_twitter', array(
		'default'           => 'pencidesign',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_instagram', array(
		'default'           => 'pencidesign',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_pinterest', array(
		'default'           => 'pencidesign',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_tumblr', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_tumblr', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_google', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_linkedin', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_flickr', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_behance', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_youtube', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );
	$wp_customize->add_setting( 'penci_rss', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field'
	) );

	// Footer Options
	$wp_customize->add_setting( 'penci_footer_widget_area', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_footer_widget_padding', array(
		'default'           => '60',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_go_to_top', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_footer_copyright', array(
		'default'           => 'Copyright @ 2015 PenciDesign. All Rights Reserved.',
		'sanitize_callback' => 'penci_sanitize_textarea_field'
	) );

	// 404 Page Options
	$wp_customize->add_setting( 'penci_not_found_image', array(
		'sanitize_callback' => 'esc_url_raw'
	) );
	$wp_customize->add_setting( 'penci_not_found_heading', array(
		'default'           => "Apologies, unfortunately we couldn't find that page",
		'sanitize_callback' => 'penci_sanitize_textarea_field'
	) );
	$wp_customize->add_setting( 'penci_not_found_sub_heading', array(
		'default'           => 'Try using our search to find what you are looking for:',
		'sanitize_callback' => 'penci_sanitize_textarea_field'
	) );
	$wp_customize->add_setting( 'penci_not_found_hide_search', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_not_found_hide_backhome', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );

	// Portfolio Options
	$wp_customize->add_setting( 'penci_portfolio_text_grid_cat', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_portfolio_cat_layout', array(
		'default'           => 'gallery-grid',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_portfolio_cat_enable_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_name_portfolio_cat', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_portfolio_cat_showposts', array(
		'default'           => '12',
		'sanitize_callback' => 'penci_sanitize_number_field'
	) );
	$wp_customize->add_setting( 'penci_portfolio_single_enable_sidebar', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_checkbox_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_name_portfolio_single', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_portfolio_share_box', array(
		'default'           => false,
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_portfolio_description_text', array(
		'default'           => 'Description',
		'sanitize_callback' => 'sanitize_text_field'
	) );


	// Color Options

	// Color general
	$wp_customize->add_setting( 'penci_color_accent', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_pattern_bg_color', array(
		'default'           => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_pattern_background_image_opacity', array(
		'default'           => '0.25',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );

	// Color Header
	$wp_customize->add_setting( 'penci_main_bar_bg', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_main_bar_nav_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_main_bar_diagonal_color', array(
		'default'           => '#D4D4D4',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_main_bar_color_active', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_bg_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_items_border', array(
		'default'           => '#E0E0E0',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_text_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_text_hover_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_mega_active_item_bg', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_mega_active_item_border', array(
		'default'           => '#ECECEC',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_drop_mega_meta_date_color', array(
		'default'           => '#9e9e9e',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_main_bar_search_bg', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_main_bar_search_magnify', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_main_bar_close_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_header_social_color', array(
		'default'           => '#777777',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_header_social_color_hover', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_header_diagonal_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Vertical Menu & Mobile Menu Color
	$wp_customize->add_setting( 'penci_ver_nav_social_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_social_color_hover', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_bg', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_color_active', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_items_border', array(
		'default'           => '#4A4A4A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_drop_text_color', array(
		'default'           => '#9e9e9e',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_ver_nav_drop_text_hover_color', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );


	// Featured Slider
	$wp_customize->add_setting( 'penci_featured_slider_overlay_bg', array(
		'default'           => '#000000',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_overlay_bg_opacity', array(
		'default'           => '0.2',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_overlay_pattern_opacity', array(
		'default'           => '0.05',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_box_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_box_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_box_opacity', array(
		'default'           => '0.5',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_title_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_title_hover_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_meta_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_featured_slider_icon_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Standard Layout Color
	$wp_customize->add_setting( 'penci_standard_icon_format_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_standard_icon_format_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_standard_box_left_bg', array(
		'default'           => '#E2DED1',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_standard_box_left_icon', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_standard_box_left_icon_hover', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_standard_title_post_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_standard_accent_color', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Grid & Masonry Layout Color
	$wp_customize->add_setting( 'penci_masonry_icon_format_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_masonry_title_post_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_masonry_accent_color', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_masonry_box_icon', array(
		'default'           => '#9e9e9e',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_masonry_box_icon_hover', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Footer
	$wp_customize->add_setting( 'penci_footer_widget_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_footer_copyright_bg_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_footer_copyright_text_color', array(
		'default'           => '#777777',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_footer_copyright_accent_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_footer_copyright_accent_hover_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Sidebar color
	$wp_customize->add_setting( 'penci_sidebar_heading_bg', array(
		'default'           => '#fafafa',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_heading_pattern_opacity', array(
		'default'           => '0.25',
		'sanitize_callback' => 'penci_sanitize_choices_field'
	) );
	$wp_customize->add_setting( 'penci_sidebar_heading_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_diagonal_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_social_bg', array(
		'default'           => '#E2DED1',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_social_hover_bg', array(
		'default'           => '#E2DED1',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_social_icon', array(
		'default'           => '#777777',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_social_icon_hover', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_accent_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_sidebar_accent_hover_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Single color
	$wp_customize->add_setting( 'penci_single_cat_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_single_title_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_single_title_diagonal_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_single_share_icon_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_single_share_icon_hover_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_single_accent_color', array(
		'default'           => '#bf9f5a',
		'sanitize_callback' => 'sanitize_hex_color'
	) );

	// Color for Portfolio
	$wp_customize->add_setting( 'penci_portfolio_layout_title_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_layout_title_hover', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_buttons_icon_color', array(
		'default'           => '#313131',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_buttons_icon_hover', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_layout_overlay_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_layout_overlay_border_color', array(
		'default'           => '#8B8B8B',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_grid_categories_color', array(
		'default'           => '#9e9e9e',
		'sanitize_callback' => 'sanitize_hex_color'
	) );
	$wp_customize->add_setting( 'penci_portfolio_grid_categories_hover', array(
		'default'           => '#BF9F5A',
		'sanitize_callback' => 'sanitize_hex_color'
	) );


	// Custom CSS
	$wp_customize->add_setting( 'penci_custom_css', array(
		'sanitize_callback' => 'penci_sanitize_textarea_field'
	) );


	/*= Add Control
	--------------------------------------------------------------------*/
	// General
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_favicon', array(
		'label'    => 'Upload Favicon',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_favicon',
		'priority' => 5
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'home_layout', array(
		'label'    => 'Homepage Layout',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_home_layout',
		'type'     => 'radio',
		'priority' => 10,
		'choices'  => array(
			'standard'            => 'Standard Posts',
			'classic'             => 'Classic Posts',
			'grid'                => 'Grid Posts',
			'masonry'             => 'Grid Masonry Posts',
			'list'                => 'List Posts',
			'list-boxed'          => 'List Boxed Posts',
			'standard-masonry'    => 'Standard Masonry Post',
			'classic-masonry'     => 'Classic Masonry Post',
			'standard-grid'       => '1st Standard Then Grid',
			'standard-list'       => '1st Standard Then List',
			'standard-list-boxed' => '1st Standard Then List Boxed',
			'classic-grid'        => '1st Classic Then Grid',
			'classic-list'        => '1st Classic Then List',
			'classic-list-boxed'  => '1st Classic Then List Boxed',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_title', array(
		'label'       => 'Heading for Homepage',
		'section'     => 'pencidesign_new_section_general',
		'settings'    => 'penci_home_title',
		'description' => __( 'If you want hide heading, let empty this', 'pencidesign' ),
		'type'        => 'text',
		'priority'    => 15
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'archive_layout', array(
		'label'    => 'Archive Layout',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_archive_layout',
		'type'     => 'radio',
		'priority' => 25,
		'choices'  => array(
			'standard'            => 'Standard Posts',
			'classic'             => 'Classic Posts',
			'grid'                => 'Grid Posts',
			'masonry'             => 'Grid Masonry Posts',
			'list'                => 'List Posts',
			'list-boxed'          => 'List Boxed Posts',
			'standard-masonry'    => 'Standard Masonry Post',
			'classic-masonry'     => 'Classic Masonry Post',
			'standard-grid'       => '1st Standard Then Grid',
			'standard-list'       => '1st Standard Then List',
			'standard-list-boxed' => '1st Standard Then List Boxed',
			'classic-grid'        => '1st Classic Then Grid',
			'classic-list'        => '1st Classic Then List',
			'classic-list-boxed'  => '1st Classic Then List Boxed',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_sticky', array(
		'label'    => 'Enable Sticky Sidebar',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_sidebar_sticky',
		'type'     => 'checkbox',
		'priority' => 26
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_home', array(
		'label'    => 'Enable Sidebar On Homepage',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_sidebar_home',
		'type'     => 'checkbox',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_posts', array(
		'label'    => 'Enable Sidebar On Single',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_sidebar_posts',
		'type'     => 'checkbox',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_archive', array(
		'label'    => 'Enable Sidebar On Archives',
		'section'  => 'pencidesign_new_section_general',
		'settings' => 'penci_sidebar_archive',
		'type'     => 'checkbox',
		'priority' => 40
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_for_title', array(
		'label'       => 'Font For Title',
		'section'     => 'pencidesign_new_section_general',
		'settings'    => 'penci_font_for_title',
		'description' => __( 'Default font is "Oswald"', 'pencidesign' ),
		'type'        => 'select',
		'priority'    => 41,
		'choices'     => penci_all_fonts()
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_for_body', array(
		'label'       => 'Font For Body Text',
		'section'     => 'pencidesign_new_section_general',
		'settings'    => 'penci_font_for_body',
		'description' => __( 'Default font is "Merriweather"', 'pencidesign' ),
		'type'        => 'select',
		'priority'    => 42,
		'choices'     => penci_all_fonts()
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_single', array(
		'label'       => 'Sidebar for Single',
		'section'     => 'pencidesign_new_section_general',
		'settings'    => 'penci_sidebar_name_single',
		'description' => __( 'If sidebar your choice is empty, will display Main Sidebar', 'pencidesign' ),
		'type'        => 'select',
		'priority'    => 50,
		'choices'     => array(
			'main-sidebar'     => __( 'Main Sidebar', 'pencidesign' ),
			'custom-sidebar-1' => __( 'Custom Sidebar 1', 'pencidesign' ),
			'custom-sidebar-2' => __( 'Custom Sidebar 2', 'pencidesign' ),
			'custom-sidebar-3' => __( 'Custom Sidebar 3', 'pencidesign' ),
			'custom-sidebar-4' => __( 'Custom Sidebar 4', 'pencidesign' ),
			'custom-sidebar-5' => __( 'Custom Sidebar 5', 'pencidesign' ),
			'custom-sidebar-6' => __( 'Custom Sidebar 6', 'pencidesign' )
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_pages', array(
		'label'       => 'Sidebar for Pages',
		'section'     => 'pencidesign_new_section_general',
		'settings'    => 'penci_sidebar_name_pages',
		'description' => __( 'If sidebar your choice is empty, will display Main Sidebar', 'pencidesign' ),
		'type'        => 'select',
		'priority'    => 55,
		'choices'     => array(
			'main-sidebar'     => __( 'Main Sidebar', 'pencidesign' ),
			'custom-sidebar-1' => __( 'Custom Sidebar 1', 'pencidesign' ),
			'custom-sidebar-2' => __( 'Custom Sidebar 2', 'pencidesign' ),
			'custom-sidebar-3' => __( 'Custom Sidebar 3', 'pencidesign' ),
			'custom-sidebar-4' => __( 'Custom Sidebar 4', 'pencidesign' ),
			'custom-sidebar-5' => __( 'Custom Sidebar 5', 'pencidesign' ),
			'custom-sidebar-6' => __( 'Custom Sidebar 6', 'pencidesign' )
		)
	) ) );


	// Header and Logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_logo', array(
		'label'    => 'Upload Logo',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_logo',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_logo_retina', array(
		'label'    => 'Upload Logo (Retina Version)',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_logo_retina',
		'priority' => 10
	) ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_mobile_nav_logo', array(
		'label'    => 'Logo for Vertical & Mobile Nav',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_mobile_nav_logo',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'upload_mobile_nav_logo_retina', array(
		'label'    => 'Logo for Vertical & Mobile Nav (Retina Version)',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_mobile_nav_logo_retina',
		'priority' => 20
	) ) );

	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'header_padding', array(
		'label'    => 'Logo Header Padding Top & Bottom',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_header_padding',
		'type'     => 'number',
		'priority' => 25
	) ) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_layout', array(
		'label'    => 'Header Layout',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_header_layout',
		'type'     => 'radio',
		'priority' => 30,
		'choices'  => array(
			'header-1' => 'Header 1',
			'header-2' => 'Header 2',
			'header-3' => 'Header 3',
			'header-4' => 'Header 4',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_social_check', array(
		'label'    => 'Disable Header Social Icons',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_header_social_check',
		'type'     => 'checkbox',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_search_check', array(
		'label'    => 'Disable Header Search',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_topbar_search_check',
		'type'     => 'checkbox',
		'priority' => 40
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_logo_vertical', array(
		'label'    => 'Disable Logo on Vertical & Mobile Nav',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_header_logo_vertical',
		'type'     => 'checkbox',
		'priority' => 45
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_social_vertical', array(
		'label'    => 'Disable Social Icons on Vertical & Mobile Nav',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_header_social_vertical',
		'type'     => 'checkbox',
		'priority' => 50
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'topbar_mega_date', array(
		'label'    => 'Disable Post Date in Category Mega Menu',
		'section'  => 'pencidesign_new_section_logo_header',
		'settings' => 'penci_topbar_mega_date',
		'type'     => 'checkbox',
		'priority' => 50
	) ) );

	// Header Video background
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'enable_featured_video_bg', array(
		'label'    => 'Enable Featured Video Background',
		'section'  => 'pencidesign_new_section_featured_video',
		'settings' => 'penci_enable_featured_video_bg',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'featured_video_img_mobile', array(
		'label'       => 'Background Image Display Replace Video On Tablet & Mobile',
		'section'     => 'pencidesign_new_section_featured_video',
		'settings'    => 'penci_featured_video_img_mobile',
		'description' => 'Video background not support play on tablet & mobile. So, you should choose an image to display replace video background when your site is on tablet & mobile',
		'priority'    => 2
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_video_url', array(
		'label'    => 'Video Youtube URL',
		'section'  => 'pencidesign_new_section_featured_video',
		'settings' => 'penci_featured_video_url',
		'type'     => 'text',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'featured_video_start', array(
		'label'    => 'Start Video At (Unit is second)',
		'section'  => 'pencidesign_new_section_featured_video',
		'settings' => 'penci_featured_video_start',
		'type'     => 'number',
		'priority' => 8
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_video_audio', array(
		'label'    => 'Enable Audio of Video',
		'section'  => 'pencidesign_new_section_featured_video',
		'settings' => 'penci_featured_video_audio',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );

	// Featured slider
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider', array(
		'label'    => 'Enable Featured Slider',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_slider',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_style', array(
		'label'       => 'Featured Slider Style',
		'section'     => 'pencidesign_new_section_featured',
		'settings'    => 'penci_featured_slider_style',
		'description' => __( 'If you choose Penci Slider, you need have posts in "Penci Slider" post type', 'pencidesign' ),
		'type'        => 'radio',
		'priority'    => 5,
		'choices'     => array(
			'style-1' => 'Posts Featured Slider Style 1',
			'style-2' => 'Posts Featured Slider Style 2',
			'style-3' => 'Penci Slider Style 1',
			'style-4' => 'Penci Slider Style 2'
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_autoplay', array(
		'label'    => 'Enable Auto Play Slider',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_autoplay',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'featured_slider_auto_time', array(
		'label'    => 'Featured Slider Auto Time',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_slider_auto_time',
		'description' => __( 'Numeric value only, 1000 = 1 second', 'pencidesign' ),
		'type'     => 'number',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'featured_slider_auto_speed', array(
		'label'    => 'Featured Slider Auto Speed',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_slider_auto_speed',
		'description' => __( 'Numeric value only, 1000 = 1 second', 'pencidesign' ),
		'type'     => 'number',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'featured_penci_slider_height', array(
		'label'    => 'Featured Penci Slider Height',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_penci_slider_height',
		'description' => __( 'Numeric value only, unit is pixel, if you not want fixed height, let empty or fill "0" for it', 'pencidesign' ),
		'type'     => 'number',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Category_Control( $wp_customize, 'featured_cat', array(
		'label'    => 'Select Featured Category',
		'settings' => 'penci_featured_cat',
		'section'  => 'pencidesign_new_section_featured',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_cat_hide', array(
		'label'    => 'Hide Featured Category',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_cat_hide',
		'description' => __( 'Check this if you want the featured category to be hide on all pages.', 'pencidesign' ),
		'type'     => 'checkbox',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_center_box', array(
		'label'    => 'Hide Center Box on Featured Slider',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_center_box',
		'type'     => 'checkbox',
		'priority' => 40
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_meta_author', array(
		'label'    => 'Hide Post Author',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_meta_author',
		'type'     => 'checkbox',
		'priority' => 45
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_meta_date', array(
		'label'    => 'Hide Post Date',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_meta_date',
		'type'     => 'checkbox',
		'priority' => 50
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'featured_slider_slides', array(
		'label'    => 'Amount of Slides',
		'section'  => 'pencidesign_new_section_featured',
		'settings' => 'penci_featured_slider_slides',
		'type'     => 'number',
		'priority' => 55
	) ) );

	// Standard Post Layout Settings
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_icon_format', array(
		'label'    => 'Hide Icon Post Format on Standard Layout',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_icon_format',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_thumbnail', array(
		'label'    => 'Hide Post Thumbnail',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_thumbnail',
		'type'     => 'checkbox',
		'priority' => 2
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_share_box', array(
		'label'    => 'Hide Share Box',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_share_box',
		'type'     => 'checkbox',
		'priority' => 3
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_cat', array(
		'label'    => 'Hide Category',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_cat',
		'type'     => 'checkbox',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_author', array(
		'label'    => 'Hide Post Author',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_author',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_date', array(
		'label'    => 'Hide Post Date',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_date',
		'type'     => 'checkbox',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'standard_comment', array(
		'label'    => 'Hide Comment Count',
		'section'  => 'pencidesign_new_section_standard',
		'settings' => 'penci_standard_comment',
		'type'     => 'checkbox',
		'priority' => 20
	) ) );

	// Grid & Masonry Post Layout Settings
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_icon_format', array(
		'label'    => 'Hide Icon Post Format',
		'section'  => 'pencidesign_new_section_grid',
		'settings' => 'penci_grid_icon_format',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_share_box', array(
		'label'    => 'Hide Share Box',
		'section'  => 'pencidesign_new_section_grid',
		'settings' => 'penci_grid_share_box',
		'type'     => 'checkbox',
		'priority' => 2
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_cat', array(
		'label'    => 'Hide Category',
		'section'  => 'pencidesign_new_section_grid',
		'settings' => 'penci_grid_cat',
		'type'     => 'checkbox',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_date', array(
		'label'    => 'Hide Post Date',
		'section'  => 'pencidesign_new_section_grid',
		'settings' => 'penci_grid_date',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'grid_comment', array(
		'label'    => 'Hide Comment Count',
		'section'  => 'pencidesign_new_section_grid',
		'settings' => 'penci_grid_comment',
		'type'     => 'checkbox',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'post_excerpt_length', array(
		'label'    => 'Custom Excerpt Length',
		'section'  => 'pencidesign_new_section_grid',
		'settings' => 'penci_post_excerpt_length',
		'type'     => 'number',
		'priority' => 55
	) ) );


	// Post Settings
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_cat', array(
		'label'    => 'Hide Category',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_cat',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_meta_author', array(
		'label'    => 'Hide Post Author',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_single_meta_author',
		'type'     => 'checkbox',
		'priority' => 3
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_meta_date', array(
		'label'    => 'Hide Post Date',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_single_meta_date',
		'type'     => 'checkbox',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'single_meta_comment', array(
		'label'    => 'Hide Comment Count',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_single_meta_comment',
		'type'     => 'checkbox',
		'priority' => 7
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_thumb', array(
		'label'    => 'Hide Featured Image on Top',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_thumb',
		'description' => __( 'This option not apply for Video format, Audio format, Gallery format', 'pencidesign' ),
		'type'     => 'checkbox',
		'priority' => 8
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_tags', array(
		'label'    => 'Hide Tags',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_tags',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_share', array(
		'label'    => 'Hide Share Buttons',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_share',
		'type'     => 'checkbox',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_author', array(
		'label'    => 'Hide Author Box',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_author',
		'type'     => 'checkbox',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_nav', array(
		'label'    => 'Hide Next/Prev Post Navigation',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_nav',
		'type'     => 'checkbox',
		'priority' => 26
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related', array(
		'label'    => 'Hide Related Posts Box',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_related',
		'type'     => 'checkbox',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_text', array(
		'label'    => 'Related Posts Custom Text',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_related_text',
		'type'     => 'text',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'post_related_autoplay', array(
		'label'    => 'Related Posts Auto Play Carousel',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_post_related_autoplay',
		'type'     => 'checkbox',
		'priority' => 36
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'numbers_related_post', array(
		'label'    => 'Amount of Related Posts',
		'section'  => 'pencidesign_new_section_post',
		'settings' => 'penci_numbers_related_post',
		'type'     => 'number',
		'priority' => 40
	) ) );

	// Page settings
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_share', array(
		'label'    => 'Hide Share Buttons',
		'section'  => 'pencidesign_new_section_page',
		'settings' => 'penci_page_share',
		'type'     => 'checkbox',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_comments', array(
		'label'    => 'Hide Comments',
		'section'  => 'pencidesign_new_section_page',
		'settings' => 'penci_page_comments',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'page_under_construction_time', array(
		'label'       => 'Given Time To Count Down on Page Under Construction',
		'section'     => 'pencidesign_new_section_page',
		'settings'    => 'penci_page_under_construction_time',
		'description' => __( 'Fill the countdown below with your given time. For example, you want to countdown to: "31th October 2016" then full the text input with "2016/10/31"', 'pencidesign' ),
		'type'        => 'text',
		'priority'    => 15
	) ) );

	// Social Media
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'facebook', array(
		'label'    => 'Facebook',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_facebook',
		'type'     => 'text',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'twitter', array(
		'label'    => 'Twitter',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_twitter',
		'type'     => 'text',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'instagram', array(
		'label'    => 'Instagram',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_instagram',
		'type'     => 'text',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pinterest', array(
		'label'    => 'Pinterest',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_pinterest',
		'type'     => 'text',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'google', array(
		'label'    => 'Google Plus',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_google',
		'type'     => 'text',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'linkedin', array(
		'label'    => 'LinkedIn',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_linkedin',
		'type'     => 'text',
		'priority' => 26
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'flickr', array(
		'label'    => 'Flickr',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_flickr',
		'type'     => 'text',
		'priority' => 27
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'behance', array(
		'label'    => 'Behance',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_behance',
		'type'     => 'text',
		'priority' => 28
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'tumblr', array(
		'label'    => 'Tumblr',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_tumblr',
		'type'     => 'text',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'youtube', array(
		'label'    => 'Youtube',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_youtube',
		'type'     => 'text',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'rss', array(
		'label'    => 'RSS Link',
		'section'  => 'pencidesign_new_section_social',
		'settings' => 'penci_rss',
		'type'     => 'text',
		'priority' => 40
	) ) );

	// Footer Settings
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_widget_area', array(
		'label'    => 'Disable Footer Widget Area',
		'section'  => 'pencidesign_new_section_footer',
		'settings' => 'penci_footer_widget_area',
		'type'     => 'checkbox',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'footer_widget_padding', array(
		'label'    => 'Footer Widget Area Padding Top & Bottom',
		'section'  => 'pencidesign_new_section_footer',
		'settings' => 'penci_footer_widget_padding',
		'type'     => 'number',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_go_to_top', array(
		'label'    => 'Disable Go to top button',
		'section'  => 'pencidesign_new_section_footer',
		'settings' => 'penci_go_to_top',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copyright', array(
		'label'    => 'Footer Copyright Text',
		'section'  => 'pencidesign_new_section_footer',
		'settings' => 'penci_footer_copyright',
		'type'     => 'textarea',
		'priority' => 15
	) ) );

	// 404 Page Settings
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'not_found_image', array(
		'label'    => '404 Custom Main Image',
		'section'  => 'pencidesign_new_section_not_found',
		'settings' => 'penci_not_found_image',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_heading', array(
		'label'    => '404 Heading Text',
		'section'  => 'pencidesign_new_section_not_found',
		'settings' => 'penci_not_found_heading',
		'type'     => 'textarea',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_sub_heading', array(
		'label'    => '404 Sub Heading Text',
		'section'  => 'pencidesign_new_section_not_found',
		'settings' => 'penci_not_found_sub_heading',
		'type'     => 'textarea',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_hide_search', array(
		'label'    => 'Hide Search Form',
		'section'  => 'pencidesign_new_section_not_found',
		'settings' => 'penci_not_found_hide_search',
		'type'     => 'checkbox',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'not_found_hide_backhome', array(
		'label'    => 'Hide "BACK TO HOME PAGE"',
		'section'  => 'pencidesign_new_section_not_found',
		'settings' => 'penci_not_found_hide_backhome',
		'type'     => 'checkbox',
		'priority' => 25
	) ) );


	// Portfolio Options
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_text_grid_cat', array(
		'label'    => 'Hide Portfolio Categories on Text Grid Style',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_text_grid_cat',
		'type'     => 'checkbox',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_cat_layout', array(
		'label'    => 'Portfolio Categories Layout',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_cat_layout',
		'type'     => 'radio',
		'priority' => 5,
		'choices'  => array(
			'gallery-grid' => 'Gallery Grid',
			'text-grid'    => 'Text Grid'
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_cat_enable_sidebar', array(
		'label'    => 'Enable Sidebar on Portfolio Categories',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_cat_enable_sidebar',
		'type'     => 'checkbox',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_portfolio_cat', array(
		'label'       => 'Sidebar for Portfolio Categories',
		'section'     => 'pencidesign_new_section_portfolio',
		'settings'    => 'penci_sidebar_name_portfolio_cat',
		'description' => __( 'If sidebar your choice is empty, will display Main Sidebar', 'pencidesign' ),
		'type'        => 'select',
		'priority'    => 15,
		'choices'     => array(
			'main-sidebar'     => __( 'Main Sidebar', 'pencidesign' ),
			'custom-sidebar-1' => __( 'Custom Sidebar 1', 'pencidesign' ),
			'custom-sidebar-2' => __( 'Custom Sidebar 2', 'pencidesign' ),
			'custom-sidebar-3' => __( 'Custom Sidebar 3', 'pencidesign' ),
			'custom-sidebar-4' => __( 'Custom Sidebar 4', 'pencidesign' ),
			'custom-sidebar-5' => __( 'Custom Sidebar 5', 'pencidesign' ),
			'custom-sidebar-6' => __( 'Custom Sidebar 6', 'pencidesign' )
		)
	) ) );
	$wp_customize->add_control( new Customize_Number_Control( $wp_customize, 'portfolio_cat_showposts', array(
		'label'    => 'Numbers Posts Per Page on Portfolio Categories',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_cat_showposts',
		'type'     => 'number',
		'priority' => 16
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_single_enable_sidebar', array(
		'label'    => 'Enable Sidebar on Single Portfolio',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_single_enable_sidebar',
		'type'     => 'checkbox',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_name_portfolio_single', array(
		'label'       => 'Sidebar for Single Portfolio',
		'section'     => 'pencidesign_new_section_portfolio',
		'settings'    => 'penci_sidebar_name_portfolio_single',
		'description' => __( 'If sidebar your choice is empty, will display Main Sidebar', 'pencidesign' ),
		'type'        => 'select',
		'priority'    => 25,
		'choices'     => array(
			'main-sidebar'     => __( 'Main Sidebar', 'pencidesign' ),
			'custom-sidebar-1' => __( 'Custom Sidebar 1', 'pencidesign' ),
			'custom-sidebar-2' => __( 'Custom Sidebar 2', 'pencidesign' ),
			'custom-sidebar-3' => __( 'Custom Sidebar 3', 'pencidesign' ),
			'custom-sidebar-4' => __( 'Custom Sidebar 4', 'pencidesign' ),
			'custom-sidebar-5' => __( 'Custom Sidebar 5', 'pencidesign' ),
			'custom-sidebar-6' => __( 'Custom Sidebar 6', 'pencidesign' )
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_description_text', array(
		'label'    => 'Description Text on Single Portfolio',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_description_text',
		'type'     => 'text',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'portfolio_share_box', array(
		'label'    => 'Disable Share Box on Single Portfolio',
		'section'  => 'pencidesign_new_section_portfolio',
		'settings' => 'penci_portfolio_share_box',
		'type'     => 'checkbox',
		'priority' => 35
	) ) );

	/* = Color Settings
	-------------------------------------------------------------- */
	// Colors general
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_accent', array(
		'label'    => 'Accent Colors',
		'section'  => 'pencidesign_new_section_color_general',
		'settings' => 'penci_color_accent',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pattern_bg_color', array(
		'label'       => 'Patterns Background Color',
		'section'     => 'pencidesign_new_section_color_general',
		'settings'    => 'penci_pattern_bg_color',
		'description' => 'This option apply to patterns on header, footer widgets area, sidebar heading, title bar archives page...',
		'priority'    => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'pattern_background_image_opacity', array(
		'label'       => 'Patterns Background Image Opacity',
		'section'     => 'pencidesign_new_section_color_general',
		'settings'    => 'penci_pattern_background_image_opacity',
		'description' => 'This option apply to patterns on header, footer widgets area, sidebar heading, title bar archives page...',
		'type'        => 'select',
		'priority'    => 15,
		'choices'     => array(
			'0'    => '0',
			'0.05' => '0.05',
			'0.1'  => '0.1',
			'0.15' => '0.15',
			'0.2'  => '0.2',
			'0.25' => '0.25',
			'0.3'  => '0.3',
			'0.35' => '0.35',
			'0.4'  => '0.4',
			'0.45' => '0.45',
			'0.5'  => '0.5',
			'0.55' => '0.55',
			'0.6'  => '0.6',
			'0.65' => '0.65',
			'0.7'  => '0.7',
			'0.75' => '0.75',
			'0.8'  => '0.8',
			'0.85' => '0.85',
			'0.9'  => '0.9',
			'0.95' => '0.95',
			'1'    => '1',
		)
	) ) );

	// Header Color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_bg', array(
		'label'    => 'Main Bar Background',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_bg',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_nav_color', array(
		'label'    => 'Main Bar Menu Text Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_nav_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_diagonal_color', array(
		'label'    => 'Main Bar Top Level Menu Diagonal Lines Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_diagonal_color',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_color_active', array(
		'label'    => 'Main Bar Menu Text Hover & Active Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_color_active',
		'priority' => 20
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_bg_color', array(
		'label'    => 'Dropdown Background Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_bg_color',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_items_border', array(
		'label'    => 'Dropdown Menu Items Border Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_items_border',
		'priority' => 30
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_text_color', array(
		'label'    => 'Dropdown Text Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_text_color',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_text_hover_color', array(
		'label'    => 'Dropdown Text Hover Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_text_hover_color',
		'priority' => 45
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_mega_active_item_bg', array(
		'label'    => 'Mega Menu Child Category Active Item Background Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_mega_active_item_bg',
		'priority' => 46
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_mega_active_item_border', array(
		'label'    => 'Mega Menu Category Active Item Border Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_mega_active_item_border',
		'priority' => 47
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'drop_mega_meta_date_color', array(
		'label'    => 'Mega Menu Post Date Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_drop_mega_meta_date_color',
		'priority' => 48
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_search_bg', array(
		'label'    => 'Main Bar Search Background Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_search_bg',
		'priority' => 50
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_search_magnify', array(
		'label'    => 'Main Bar Search Icon Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_search_magnify',
		'priority' => 55
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'main_bar_close_color', array(
		'label'    => 'Main Bar Icon Close Search Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_main_bar_close_color',
		'priority' => 60
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_social_color', array(
		'label'    => 'Header Social Icons Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_header_social_color',
		'priority' => 70
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_social_color_hover', array(
		'label'    => 'Header Social Icons Color Hover',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_header_social_color_hover',
		'priority' => 75
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'header_diagonal_color', array(
		'label'    => 'Header Social Diagonal Lines Color',
		'section'  => 'pencidesign_new_section_color_topbar',
		'settings' => 'penci_header_diagonal_color',
		'priority' => 80
	) ) );

	// Vertical Nav & Mobile Main Nav Color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_social_color', array(
		'label'    => 'Vertical Nav Social Icons Color',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_social_color',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_social_color_hover', array(
		'label'    => 'Vertical Nav Social Icons Color Hover',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_social_color_hover',
		'priority' => 2
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_bg', array(
		'label'    => 'Vertical Nav Background',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_bg',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'penci_ver_nav_color', array(
		'label'    => 'Vertical Nav Top Level Menu Text Color',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_color_active', array(
		'label'    => 'Vertical Nav Top Level Menu Text Hover Color',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_color_active',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_items_border', array(
		'label'    => 'Vertical Nav Menu Items Border Color',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_items_border',
		'priority' => 30
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_drop_text_color', array(
		'label'    => 'Dropdown Text Color',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_drop_text_color',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'ver_nav_drop_text_hover_color', array(
		'label'    => 'Dropdown Text Hover Color',
		'section'  => 'pencidesign_new_section_vertical_nav',
		'settings' => 'penci_ver_nav_drop_text_hover_color',
		'priority' => 45
	) ) );


	// Featured colors
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_overlay_bg', array(
		'label'    => 'Featured Slider Overlay Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_overlay_bg',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_overlay_bg_opacity', array(
		'label'    => 'Featured Slider Overlay Color Opacity',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_overlay_bg_opacity',
		'type'     => 'select',
		'priority' => 2,
		'choices'  => array(
			'0'    => '0',
			'0.05' => '0.05',
			'0.1'  => '0.1',
			'0.15' => '0.15',
			'0.2'  => '0.2',
			'0.25' => '0.25',
			'0.3'  => '0.3',
			'0.35' => '0.35',
			'0.4'  => '0.4',
			'0.45' => '0.45',
			'0.5'  => '0.5',
			'0.55' => '0.55',
			'0.6'  => '0.6',
			'0.65' => '0.65',
			'0.7'  => '0.7',
			'0.75' => '0.75',
			'0.8'  => '0.8',
			'0.85' => '0.85',
			'0.9'  => '0.9',
			'0.95' => '0.95',
			'1'    => '1',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_overlay_pattern_opacity', array(
		'label'    => 'Featured Slider Overlay Pattern Opacity',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_overlay_pattern_opacity',
		'type'     => 'select',
		'priority' => 3,
		'choices'  => array(
			'0'    => '0',
			'0.05' => '0.05',
			'0.1'  => '0.1',
			'0.15' => '0.15',
			'0.2'  => '0.2',
			'0.25' => '0.25',
			'0.3'  => '0.3',
			'0.35' => '0.35',
			'0.4'  => '0.4',
			'0.45' => '0.45',
			'0.5'  => '0.5',
			'0.55' => '0.55',
			'0.6'  => '0.6',
			'0.65' => '0.65',
			'0.7'  => '0.7',
			'0.75' => '0.75',
			'0.8'  => '0.8',
			'0.85' => '0.85',
			'0.9'  => '0.9',
			'0.95' => '0.95',
			'1'    => '1',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_box_border_color', array(
		'label'    => 'Center Box Border Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_box_border_color',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_box_bg_color', array(
		'label'    => 'Center Box Background Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_box_bg_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'featured_slider_box_opacity', array(
		'label'    => 'Center Box Background Opacity',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_box_opacity',
		'type'     => 'select',
		'priority' => 15,
		'choices'  => array(
			'0'    => '0',
			'0.05' => '0.05',
			'0.1'  => '0.1',
			'0.15' => '0.15',
			'0.2'  => '0.2',
			'0.25' => '0.25',
			'0.3'  => '0.3',
			'0.35' => '0.35',
			'0.4'  => '0.4',
			'0.45' => '0.45',
			'0.5'  => '0.5',
			'0.55' => '0.55',
			'0.6'  => '0.6',
			'0.65' => '0.65',
			'0.7'  => '0.7',
			'0.75' => '0.75',
			'0.8'  => '0.8',
			'0.85' => '0.85',
			'0.9'  => '0.9',
			'0.95' => '0.95',
			'1'    => '1',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_title_color', array(
		'label'    => 'Title Post Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_title_color',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_title_hover_color', array(
		'label'    => 'Title Post Hover Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_title_hover_color',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_meta_color', array(
		'label'    => 'Post Author & Date Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_meta_color',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'featured_slider_icon_color', array(
		'label'    => 'Center Box Icon Color',
		'section'  => 'pencidesign_new_section_color_featured_slider',
		'settings' => 'penci_featured_slider_icon_color',
		'priority' => 35
	) ) );

	// Standard layout colors
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_icon_format_border_color', array(
		'label'    => 'Icon Post Format Border Color',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_icon_format_border_color',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_icon_format_color', array(
		'label'    => 'Icon Post Format Color',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_icon_format_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_share_box_left_bg', array(
		'label'    => 'Share Box Left Background',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_box_left_bg',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_box_left_icon', array(
		'label'    => 'Share Box Left Icon Color',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_box_left_icon',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_box_left_icon_hover', array(
		'label'    => 'Share Box Left Icon Color Hover',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_box_left_icon_hover',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_title_post_color', array(
		'label'    => 'Title Post Color',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_title_post_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'standard_accent_color', array(
		'label'    => 'Accent Color',
		'section'  => 'pencidesign_new_section_standard_layout',
		'settings' => 'penci_standard_accent_color',
		'priority' => 30
	) ) );

	// Color for Grid & Masonry Post Layout
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_icon_format_color', array(
		'label'    => 'Icon Post Format Color',
		'section'  => 'pencidesign_new_section_grid_masonry_layout',
		'settings' => 'penci_masonry_icon_format_color',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_title_post_color', array(
		'label'    => 'Title Post Color',
		'section'  => 'pencidesign_new_section_grid_masonry_layout',
		'settings' => 'penci_masonry_title_post_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_accent_color', array(
		'label'    => 'Accent Color',
		'section'  => 'pencidesign_new_section_grid_masonry_layout',
		'settings' => 'penci_masonry_accent_color',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_box_icon', array(
		'label'    => 'Share Box Icon Color',
		'section'  => 'pencidesign_new_section_grid_masonry_layout',
		'settings' => 'penci_masonry_box_icon',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'masonry_box_icon_hover', array(
		'label'    => 'Share Box Icon Color Hover',
		'section'  => 'pencidesign_new_section_grid_masonry_layout',
		'settings' => 'penci_masonry_box_icon_hover',
		'priority' => 25
	) ) );

	// Footer colors
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_widget_color', array(
		'label'    => 'Footer Widget Title Text Color',
		'section'  => 'pencidesign_new_section_color_footer',
		'settings' => 'penci_footer_widget_color',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_bg_color', array(
		'label'    => 'Footer Copyright Background Color',
		'section'  => 'pencidesign_new_section_color_footer',
		'settings' => 'penci_footer_copyright_bg_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_text_color', array(
		'label'    => 'Footer Copyright Text Color',
		'section'  => 'pencidesign_new_section_color_footer',
		'settings' => 'penci_footer_copyright_text_color',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_accent_color', array(
		'label'    => 'Footer Copyright Accent Color',
		'section'  => 'pencidesign_new_section_color_footer',
		'settings' => 'penci_footer_copyright_accent_color',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_copyright_accent_hover_color', array(
		'label'    => 'Footer Copyright Accent Hover Color',
		'section'  => 'pencidesign_new_section_color_footer',
		'settings' => 'penci_footer_copyright_accent_hover_color',
		'priority' => 25
	) ) );

	// Sidebar Color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_bg', array(
		'label'    => 'Sidebar Widget Heading Background Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_heading_bg',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'sidebar_heading_pattern_opacity', array(
		'label'    => 'Sidebar Widget Heading Pattern Opacity',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_heading_pattern_opacity',
		'type'     => 'select',
		'priority' => 8,
		'choices'  => array(
			'0'    => '0',
			'0.05' => '0.05',
			'0.1'  => '0.1',
			'0.15' => '0.15',
			'0.2'  => '0.2',
			'0.25' => '0.25',
			'0.3'  => '0.3',
			'0.35' => '0.35',
			'0.4'  => '0.4',
			'0.45' => '0.45',
			'0.5'  => '0.5',
			'0.55' => '0.55',
			'0.6'  => '0.6',
			'0.65' => '0.65',
			'0.7'  => '0.7',
			'0.75' => '0.75',
			'0.8'  => '0.8',
			'0.85' => '0.85',
			'0.9'  => '0.9',
			'0.95' => '0.95',
			'1'    => '1',
		)
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_heading_color', array(
		'label'    => 'Sidebar Widget Heading Text Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_heading_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_diagonal_color', array(
		'label'    => 'Sidebar Widget Heading Diagonal Lines Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_diagonal_color',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_social_bg', array(
		'label'    => 'Sidebar Widget Social Background',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_social_bg',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_social_hover_bg', array(
		'label'    => 'Sidebar Widget Social Hover Background',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_social_hover_bg',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_social_icon', array(
		'label'    => 'Sidebar Widget Social Icons Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_social_icon',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_social_icon_hover', array(
		'label'    => 'Sidebar Widget Social Icons Hover Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_social_icon_hover',
		'priority' => 35
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_accent_color', array(
		'label'    => 'Accent Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_accent_color',
		'priority' => 40
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'sidebar_accent_hover_color', array(
		'label'    => 'Accent Hover Color',
		'section'  => 'pencidesign_new_section_color_sidebar',
		'settings' => 'penci_sidebar_accent_hover_color',
		'priority' => 45
	) ) );

	// Single Color
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_cat_color', array(
		'label'    => 'Single Categories Color',
		'section'  => 'pencidesign_new_section_color_posts',
		'settings' => 'penci_single_cat_color',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_title_color', array(
		'label'    => 'Single Title Color',
		'section'  => 'pencidesign_new_section_color_posts',
		'settings' => 'penci_single_title_color',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'posts_single_diagonal_color', array(
		'label'    => 'Posts Title Diagonal Lines Color',
		'section'  => 'pencidesign_new_section_color_posts',
		'settings' => 'penci_single_title_diagonal_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_share_icon_color', array(
		'label'    => 'Share Box Icon Color',
		'section'  => 'pencidesign_new_section_color_posts',
		'settings' => 'penci_single_share_icon_color',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_share_icon_hover_color', array(
		'label'    => 'Share Box Icon Hover Color',
		'section'  => 'pencidesign_new_section_color_posts',
		'settings' => 'penci_single_share_icon_hover_color',
		'priority' => 20
	) ) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'single_accent_color', array(
		'label'    => 'Accent Color',
		'section'  => 'pencidesign_new_section_color_posts',
		'settings' => 'penci_single_accent_color',
		'priority' => 25
	) ) );

	// Color for Portfolio
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_layout_title_color', array(
		'label'    => 'Layout Title Post Color',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_layout_title_color',
		'priority' => 1
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_layout_title_hover', array(
		'label'    => 'Layout Title Post Color Hover',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_layout_title_hover',
		'priority' => 5
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_buttons_icon_color', array(
		'label'    => 'Layout Buttons Icon Color',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_buttons_icon_color',
		'priority' => 10
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_buttons_icon_hover', array(
		'label'    => 'Layout Buttons Icon Color Hover',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_buttons_icon_hover',
		'priority' => 15
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_layout_overlay_color', array(
		'label'    => 'Layout Overlay Background Color',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_layout_overlay_color',
		'priority' => 20
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_layout_overlay_border_color', array(
		'label'    => 'Layout Overlay Border Color',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_layout_overlay_border_color',
		'priority' => 25
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_grid_categories_color', array(
		'label'    => 'Text Grid Categories Color',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_grid_categories_color',
		'priority' => 30
	) ) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'portfolio_grid_categories_hover', array(
		'label'    => 'Text Grid Categories Color Hover',
		'section'  => 'pencidesign_new_section_color_portfolio',
		'settings' => 'penci_portfolio_grid_categories_hover',
		'priority' => 35
	) ) );


	// Custom CSS
	$wp_customize->add_control( new Customize_CustomCss_Control( $wp_customize, 'custom_css', array(
		'label'    => 'Custom CSS',
		'section'  => 'pencidesign_new_section_custom_css',
		'settings' => 'penci_custom_css',
		'type'     => 'custom_css',
		'priority' => 5
	) ) );


	// Remove Sections
	$wp_customize->remove_section( 'title_tagline' );
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );

}

/**
 * Callback function for sanitizing radio settings.
 * Use for PenciDesign
 *
 * @param $input , $setting
 * @return $input
 */
function penci_sanitize_choices_field( $input ) {
	return $input;
}

/**
 * Callback function for sanitizing textarea settings
 * Use for PenciDesign
 *
 * @param $input , $setting
 * @return $input
 */
function penci_sanitize_textarea_field( $input ) {
	return $input;
}

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 * @return string default value if type is not exists
 */
function penci_sanitize_checkbox_field( $input ) {
	if ( $input == 1 ) {
		return true;
	}
	else {
		return false;
	}
}

/**
 * Callback function for sanitizing checkbox settings.
 * Use for PenciDesign
 *
 * @param $input
 * @return a number
 */
function penci_sanitize_number_field( $input ) {
	return absint( $input );
}

add_action( 'customize_register', 'pencidesign_register_theme_customizer' );
?>