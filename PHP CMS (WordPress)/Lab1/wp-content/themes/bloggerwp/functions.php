<?php
/**
 * bloggerwp functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package bloggerwp
 */

if ( ! defined( 'bloggerwp_version' ) ) {
	// Replace the version number of the theme on each release.
	define( 'bloggerwp_version', '1.0.4' );
}

/* Theme Constants */
define( 'bloggerwp_THEME_DIR', get_template_directory_uri() );
define( 'bloggerwp_THEME_ASSETS_DIR', get_template_directory_uri() . '/assets' );
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function bloggerwp_setup() {
	load_theme_textdomain( 'bloggerwp', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'custom-header' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'wp-block-styles' );

	/* Custom Logo Width */
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 290,
		'flex-height' => true,
		'flex-width' => true
	) );

	add_editor_style();

	/* Custom Background*/
	add_theme_support( 'custom-background');
	
 	/* Post Thumbnail*/
	add_theme_support( 'post-thumbnails' );
	add_image_size('bloggerwp-small-thumbnail', 180, 120, true);
	add_image_size('bloggerwp-square-thumbnail', 80, 80, true);
	
	/* Register Menus */
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'bloggerwp' ),
		)
	);
	/* Adde Theme Support */
	add_theme_support('html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		) );
	

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'bloggerwp_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'bloggerwp_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function bloggerwp_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'bloggerwp_content_width', 640 );
}
add_action( 'after_setup_theme', 'bloggerwp_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bloggerwp_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'bloggerwp' ),
			'id'            => 'sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'bloggerwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 1', 'bloggerwp' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'bloggerwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);

	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 2', 'bloggerwp' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'bloggerwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)


     );
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer 3', 'bloggerwp' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'bloggerwp' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'bloggerwp_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function bloggerwp_scripts() {
	wp_enqueue_style( 'bloggerwp-style', get_stylesheet_uri(), array(), bloggerwp_version );
	wp_style_add_data( 'bloggerwp-style', 'rtl', 'replace' );
	wp_enqueue_style( 'bloggerwp-theme-bootstraps', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), bloggerwp_version );
	wp_enqueue_style( 'bloggerwp-theme-style', get_template_directory_uri() . '/assets/css/theme.css', array(), bloggerwp_version );
	wp_enqueue_style( 'bloggerwp-responsive', get_template_directory_uri() . '/assets/css/responsive.css', array(), bloggerwp_version );
    
    /* Scripts*/ 
    wp_enqueue_script('jquery');

	wp_enqueue_script( 'bloggerwp-bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array(), bloggerwp_version, true );
	wp_enqueue_script( 'bloggerwp-popper', get_template_directory_uri() . '/assets/js/popper.min.js', array(), bloggerwp_version, true );
	wp_enqueue_script( 'bloggerwp-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), bloggerwp_version, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'bloggerwp_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}