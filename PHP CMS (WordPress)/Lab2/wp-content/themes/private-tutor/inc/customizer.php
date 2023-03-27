<?php
/**
 * Private Tutor: Customizer
 *
 * @subpackage Private Tutor
 * @since 1.0
 */

use WPTRT\Customize\Section\Private_Tutor_Button;

add_action( 'customize_register', function( $manager ) {

	$manager->register_section_type( Private_Tutor_Button::class );

	$manager->add_section(
		new Private_Tutor_Button( $manager, 'private_tutor_pro', [
			'title'      => __( 'Private Tutor Pro', 'private-tutor' ),
			'priority'    => 0,
			'button_text' => __( 'Go Pro', 'private-tutor' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/tutor-wordpress-theme/', 'private-tutor')
		] )
	);

} );

// Load the JS and CSS.
add_action( 'customize_controls_enqueue_scripts', function() {

	$version = wp_get_theme()->get( 'Version' );

	wp_enqueue_script(
		'private-tutor-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/js/customize-controls.js' ),
		[ 'customize-controls' ],
		$version,
		true
	);

	wp_enqueue_style(
		'private-tutor-customize-section-button',
		get_theme_file_uri( 'vendor/wptrt/customize-section-button/public/css/customize-controls.css' ),
		[ 'customize-controls' ],
 		$version
	);

} );

function private_tutor_customize_register( $wp_customize ) {

	$wp_customize->add_setting('private_tutor_logo_padding',array(
		'sanitize_callback'	=> 'esc_html'
	));
	$wp_customize->add_control('private_tutor_logo_padding',array(
		'label' => __('Logo Padding','private-tutor'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('private_tutor_logo_top_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_logo_top_padding',array(
		'type' => 'number',
		'description' => __('Top','private-tutor'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('private_tutor_logo_bottom_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_logo_bottom_padding',array(
		'type' => 'number',
		'description' => __('Bottom','private-tutor'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('private_tutor_logo_left_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_logo_left_padding',array(
		'type' => 'number',
		'description' => __('Left','private-tutor'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('private_tutor_logo_right_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_logo_right_padding',array(
		'type' => 'number',
		'description' => __('Right','private-tutor'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_setting('private_tutor_show_site_title',array(
		'default' => true,
		'sanitize_callback'	=> 'private_tutor_sanitize_checkbox'
	));
	$wp_customize->add_control('private_tutor_show_site_title',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Title','private-tutor'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('private_tutor_show_site_title_color',array(
		'default' => '#452892',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('private_tutor_show_site_title_color',array(
		'type' => 'color',
		'label' => __('Site Title Color','private-tutor'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('private_tutor_site_title_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_site_title_font_size',array(
		'type' => 'number',
		'label' => __('Site Title Font Size','private-tutor'),
		'section' => 'title_tagline',
	));

 	$wp_customize->add_setting('private_tutor_show_tagline',array(
		'default' => true,
		'sanitize_callback'	=> 'private_tutor_sanitize_checkbox'
	));
	$wp_customize->add_control('private_tutor_show_tagline',array(
		'type' => 'checkbox',
		'label' => __('Show / Hide Site Tagline','private-tutor'),
		'section' => 'title_tagline'
	));

	$wp_customize->add_setting('private_tutor_site_tagline_font_size',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_site_tagline_font_size',array(
		'type' => 'number',
		'label' => __('Site Tagline Font Size','private-tutor'),
		'section' => 'title_tagline',
	));

	$wp_customize->add_panel( 'private_tutor_panel_id', array(
		'priority' => 10,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Settings', 'private-tutor' ),
		'description' => __( 'Description of what this panel does.', 'private-tutor' ),
	) );

	$wp_customize->add_section( 'private_tutor_theme_options_section', array(
    	'title'      => __( 'General Settings', 'private-tutor' ),
		'priority'   => 30,
		'panel' => 'private_tutor_panel_id'
	) );

	$wp_customize->add_setting('private_tutor_theme_options',array(
		'default' => 'Right Sidebar',
		'sanitize_callback' => 'private_tutor_sanitize_choices'
	));
	$wp_customize->add_control('private_tutor_theme_options',array(
		'type' => 'radio',
		'label' => __('Do you want this section','private-tutor'),
		'section' => 'private_tutor_theme_options_section',
		'choices' => array(
		   	'Left Sidebar' => __('Left Sidebar','private-tutor'),
		   	'Right Sidebar' => __('Right Sidebar','private-tutor'),
		   	'One Column' => __('One Column','private-tutor'),
		   	'Three Columns' => __('Three Columns','private-tutor'),
		   	'Four Columns' => __('Four Columns','private-tutor'),
		   	'Grid Layout' => __('Grid Layout','private-tutor')
		),
	));

	//home page slider
	$wp_customize->add_section( 'private_tutor_slider_section' , array(
    	'title'    => __( 'Slider Settings', 'private-tutor' ),
		'priority' => null,
		'panel' => 'private_tutor_panel_id'
	) );

	$wp_customize->add_setting('private_tutor_slider_hide_show',array(
    	'default' => false,
    	'sanitize_callback'	=> 'private_tutor_sanitize_checkbox'
	));
	$wp_customize->add_control('private_tutor_slider_hide_show',array(
	   	'type' => 'checkbox',
	   	'label' => __('Show / Hide Slider','private-tutor'),
	   	'section' => 'private_tutor_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'private_tutor_slider' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'private_tutor_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'private_tutor_slider' . $count, array(
			'label' => __('Select Slider Image Page', 'private-tutor' ),
   		'description' => __('Image Size (625px x 450px)','private-tutor'),
			'section' => 'private_tutor_slider_section',
			'type' => 'dropdown-pages'
		));
	}

	$wp_customize->add_setting('private_tutor_slider_excerpt_length',array(
		'default' => '20',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_slider_excerpt_length',array(
		'type' => 'number',
		'label' => __('Slider Excerpt Length','private-tutor'),
		'section' => 'private_tutor_slider_section',
	));

	//Our Courses Section
	$wp_customize->add_section('private_tutor_our_subjects',array(
		'title'	=> __('Subjects Section','private-tutor'),
		'description'=> __('<b>Note :</b> This section will appear below the slider.','private-tutor'),
		'panel' => 'private_tutor_panel_id',
	));

	$wp_customize->add_setting('private_tutor_subject_section_small_heading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('private_tutor_subject_section_small_heading',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Small Heading','private-tutor'),
	   	'section' => 'private_tutor_our_subjects',
	));

	$wp_customize->add_setting('private_tutor_subject_section_heading',array(
    	'default' => '',
    	'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('private_tutor_subject_section_heading',array(
	   	'type' => 'text',
	   	'label' => __('Add Section Heading','private-tutor'),
	   	'section' => 'private_tutor_our_subjects',
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('private_tutor_category_setting',array(
		'default' => 'select',
		'sanitize_callback' => 'private_tutor_sanitize_choices',
	));
	$wp_customize->add_control('private_tutor_category_setting',array(
		'type' => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category To Display Post','private-tutor'),
		'section' => 'private_tutor_our_subjects',
	));

	$wp_customize->add_setting('private_tutor_subject_section_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
	));
	$wp_customize->add_control('private_tutor_subject_section_padding',array(
		'type' => 'number',
		'label' => __('Section Top Bottom Padding','private-tutor'),
		'section' => 'private_tutor_our_subjects',
	));

	//Footer
   	$wp_customize->add_section( 'private_tutor_footer', array(
    	'title'  => __( 'Footer Text', 'private-tutor' ),
		'priority' => null,
		'panel' => 'private_tutor_panel_id'
	) );

   	$wp_customize->add_setting('private_tutor_show_back_totop',array(
    	'default' => true,
      	'sanitize_callback'	=> 'private_tutor_sanitize_checkbox'
   	));
   	$wp_customize->add_control('private_tutor_show_back_totop',array(
      	'type' => 'checkbox',
      	'label' => __('Show / Hide Back to Top','private-tutor'),
      	'section' => 'private_tutor_footer'
   	));

   	$wp_customize->add_setting('private_tutor_footer_copy',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('private_tutor_footer_copy',array(
		'label'	=> __('Footer Text','private-tutor'),
		'section' => 'private_tutor_footer',
		'setting' => 'private_tutor_footer_copy',
		'type' => 'text'
	));

	$wp_customize->add_setting('private_tutor_copyright_padding',array(
		'default' => '',
		'sanitize_callback'	=> 'private_tutor_sanitize_float'
 	));
 	$wp_customize->add_control('private_tutor_copyright_padding',array(
		'type' => 'number',
		'label' => __('Copyright Top Bottom Padding','private-tutor'),
		'section' => 'private_tutor_footer',
	));

	$wp_customize->register_section_type( Private_Tutor_Button::class );

	$wp_customize->add_section(
		new Private_Tutor_Button( $wp_customize, 'private_tutor_pro_under_panel', [
			'title'      => __( 'Private Tutor Pro', 'private-tutor' ),
			'priority'    => null,
			'button_text' => __( 'Go Pro', 'private-tutor' ),
			'button_url'  => esc_url( 'https://www.luzuk.com/products/tutor-wordpress-theme/', 'private-tutor'),
			'panel' => 'private_tutor_panel_id'
		] )
	);

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'private_tutor_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'private_tutor_customize_partial_blogdescription',
	) );
}
add_action( 'customize_register', 'private_tutor_customize_register' );

function private_tutor_customize_partial_blogname() {
	bloginfo( 'name' );
}

function private_tutor_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

function private_tutor_is_static_front_page() {
	return ( is_front_page() && ! is_home() );
}

function private_tutor_is_view_with_layout_option() {
	// This option is available on all pages. It's also available on archives when there isn't a sidebar.
	return ( is_page() || ( is_archive() && ! is_active_sidebar( 'sidebar-1' ) ) );
}