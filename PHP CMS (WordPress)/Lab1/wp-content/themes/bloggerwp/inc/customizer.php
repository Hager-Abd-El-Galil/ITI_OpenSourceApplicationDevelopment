<?php
/**
 * bloggerwp Theme Customizer
 *
 * @package bloggerwp
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
if ( !function_exists('bloggerwp_default_theme_options') ) :
    function bloggerwp_default_theme_options() {

        $default_theme_options = array(
            /*feature section options*/
            'bloggerwp-footer-copyright'=>esc_html__('Copyright Text 2023','bloggerwp'),
             'bloggerwp-back-to-top-option' =>0,   
        );

        return apply_filters( 'bloggerwp_default_theme_options', $default_theme_options );
    }
endif;
if ( !function_exists('bloggerwp_get_theme_options') ) :
    function bloggerwp_get_theme_options() {

        $bloggerwp_default_theme_options = bloggerwp_default_theme_options();
        $bloggerwp_get_theme_options = get_theme_mod( 'bloggerwp_theme_options');
        if( is_array( $bloggerwp_get_theme_options )){
            return array_merge( $bloggerwp_default_theme_options, $bloggerwp_get_theme_options );
        }
        else{
            return $bloggerwp_default_theme_options;
        }

    }
endif;
function bloggerwp_sanitize_checkbox( $checked ) {
    // Boolean check.
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
function bloggerwp_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    $default = bloggerwp_default_theme_options();


	/* Footer Copyright */
	$wp_customize->add_section( 'bloggerwp-footer-option', array(
		'priority'       => 110,
		'capability'     => 'edit_theme_options',
		'theme_supports' => '',
		'title'          => __( 'Footer Options', 'bloggerwp' )
	) );
    $wp_customize->add_setting( 'bloggerwp_theme_options[bloggerwp-footer-copyright]', array(
            'capability'        => 'edit_theme_options',
            'default' => $default['bloggerwp-footer-copyright'],
            'sanitize_callback' => 'wp_kses_post'
        ) );
    $wp_customize->add_control( 'bloggerwp-footer-copyright', array(
            'label'     => __( 'Copyright Text', 'bloggerwp' ),
            'description' => __('Your Own Copyright Text', 'bloggerwp'),
            'section'   => 'bloggerwp-footer-option',
            'settings'  => 'bloggerwp_theme_options[bloggerwp-footer-copyright]',
            'type'      => 'text',
            'priority'  => 10
        ) ); 

     /*Back To Top */    
    $wp_customize->add_section( 'bloggerwp-back-to-top', array(
        'priority'       => 110,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Back To Top', 'bloggerwp' )
    ) );
    $wp_customize->add_setting( 'bloggerwp_theme_options[bloggerwp-back-to-top-option]', array(
        'capability'        => 'edit_theme_options',
    
        'sanitize_callback' => 'bloggerwp_sanitize_checkbox'
    ) );
    $wp_customize->add_control( 'bloggerwp-back-to-top-option', array(
        'label'     => __( 'Enable Back to Top', 'bloggerwp' ),
        'section'   => 'bloggerwp-back-to-top',
        'settings'  => 'bloggerwp_theme_options[bloggerwp-back-to-top-option]',
        'type'      => 'checkbox',
        'priority'  => 10
    ) );  
	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'bloggerwp_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'bloggerwp_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'bloggerwp_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function bloggerwp_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function bloggerwp_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function bloggerwp_customize_preview_js() {
	wp_enqueue_script( 'bloggerwp-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array( 'customize-preview' ), bloggerwp_version, true );
}
add_action( 'customize_preview_init', 'bloggerwp_customize_preview_js' );
