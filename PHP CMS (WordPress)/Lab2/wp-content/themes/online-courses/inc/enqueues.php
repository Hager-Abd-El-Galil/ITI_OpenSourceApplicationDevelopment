<?php function online_courses_enqueues(){
	    wp_enqueue_style( 'online-courses-google-fonts-api', '//fonts.googleapis.com/css?family='.get_theme_mod( 'text_font_type' ,'Signika').'', array());
	/* CSS Files */
	wp_enqueue_style('font-awesome', get_template_directory_uri() .'/css/font-awesome.css', array());
	wp_enqueue_style('bootstrap', get_template_directory_uri() .'/css/bootstrap.css', array());
	wp_enqueue_style('owl-carousel',get_template_directory_uri().'/css/owl.carousel.css',array());
	wp_enqueue_style('online-courses-default',get_template_directory_uri().'/css/default.css', array(),null,false);

	/* JS Files */	
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() .'/js/bootstrap.js', array( 'jquery' ));
	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() .'/js/owl.carousel.js', array( 'jquery' ));
	wp_enqueue_script( 'online-courses-default', get_template_directory_uri() .'/js/default.js', array( 'jquery'),false,null);	
	if ( is_singular() ) wp_enqueue_script( "comment-reply" );
	wp_enqueue_style( 'online-courses-style', get_stylesheet_uri());

	online_courses_custom_css();
}
add_action('wp_enqueue_scripts','online_courses_enqueues');


/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function online_courses_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}

add_action( 'wp_print_footer_scripts', 'online_courses_skip_link_focus_fix' );