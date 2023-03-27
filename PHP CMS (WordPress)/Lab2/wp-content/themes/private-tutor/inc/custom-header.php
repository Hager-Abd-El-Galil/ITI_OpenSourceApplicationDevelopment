<?php
/**
 * Custom header implementation
 */

function private_tutor_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'private_tutor_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1200,
		'height'                 => 220,
		'wp-head-callback'       => 'private_tutor_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'private_tutor_custom_header_setup' );

if ( ! function_exists( 'private_tutor_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see private_tutor_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'private_tutor_header_style' );
function private_tutor_header_style() {

	$private_tutor_show_site_title_color = esc_attr(get_theme_mod('private_tutor_show_site_title_color','#452892'));
	?>
	<style type="text/css">

		h1.site-title a, p.site-title a {
			color: <?php echo apply_filters('private_tutor_header', $private_tutor_show_site_title_color); ?>;
		}

	</style>
		
	<?php


	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
        .page-template-custom-home-page #header, #header {
			background-image:url('".esc_url(get_header_image())."');
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'private-tutor-basic-style', $custom_css );
	endif;
}
endif; // private_tutor_header_style