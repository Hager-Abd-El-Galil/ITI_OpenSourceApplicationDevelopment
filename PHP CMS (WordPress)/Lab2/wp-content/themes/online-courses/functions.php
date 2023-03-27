<?php
function online_courses_setup() {
	load_theme_textdomain( 'online-courses',get_template_directory() . '/languages' );
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'online-courses-blog-image', $width = 423, $height = 340, true );
	add_image_size( 'online-courses-upcoming-course-home', $width = 555,$height = 226, true );
	add_image_size( 'online-courses-our-courses-home', $width = 246,$height = 140, true );
	
	register_nav_menus( array(
		'primary'    => esc_html__( 'Top Menu', 'online-courses' ),
	) );
	add_theme_support( 'html5', array(
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );
	// Add theme support for Custom hEADER.
    $online_courses_defaults = array(
      'default-image'          => get_template_directory_uri().'/images/blog1.jpg',
      'width'=> 0,'height'=> 0,'flex-height'=> 1299,'flex-width'=> 345,
      'uploads'=> true,'random-default'=> false,'header-text'=> true,'default-text-color' => '000000',
      'wp-head-callback'       => '','admin-head-callback'    => '', 'admin-preview-callback' => ''
    );
    register_default_headers( array(
        'default-image' => array(
            'url'           => get_template_directory_uri().'/images/blog1.jpg',
            'thumbnail_url' => get_template_directory_uri().'/images/blog1.jpg',
            'description'   => esc_html__( 'Default Header Image', 'online-courses' ) ),
    ) );
    add_theme_support('custom-header',$online_courses_defaults);
	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );

	add_theme_support( 'post-formats', array( 'video' ) );
}
add_action( 'after_setup_theme', 'online_courses_setup' );
function online_courses_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'online_courses_content_width', 640 );
}
add_action( 'after_setup_theme', 'online_courses_content_width', 0 );
add_filter('get_custom_logo','online_courses_change_logo_class');
function online_courses_change_logo_class($html)
{
    $html = str_replace('class="custom-logo"', 'class="img-responsive logo-fixed"', $html);
    $html = str_replace('width=', 'original-width=', $html);
    $html = str_replace('height=', 'original-height=', $html);
    return $html;
}
/**/

add_action( 'admin_menu', 'online_courses_admin_menu');
function online_courses_admin_menu( ) {
    add_theme_page( __('WPDigiPro Suite','online-courses'), __('WPDigiPro Suite','online-courses'), 'manage_options', 'online-courses-pro-buynow', 'online_courses_pro_buy_now', 300 ); 
  
}
function online_courses_pro_buy_now(){ ?>  
  <div class="online_courses_pro_version">
  <a href="<?php echo esc_url('https://wpdigipro.com/?utm_source=wpdotorg&utm_medium=onlinecourseswptheme'); ?>" target="_blank">
    <img src ="<?php echo esc_url('http://d3itwt1jzx3aw2.cloudfront.net/wpdigipro-infographic.jpg') ?>" width="100%" height="auto" />
  </a>
</div>

<?php }

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function online_courses_widgets_init() {
	register_sidebar( array(
		'name'          		=> esc_html__( 'Sidebar', 'online-courses' ),
		'id'            		=> 'sidebar-1',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your sidebar.', 'online-courses' ),
		'before_widget' 		=> '<aside id="%1$s" class="widget %2$s" data-aos="fade-up">',
		'after_widget'  		=> '</aside>',
		'before_title'  		=> '<h3 class="widget-title">',
		'after_title'   		=> '</h3>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 1', 'online-courses' ),
		'id'            		=> 'footer-1',
		'romana_description'	=> esc_html__( 'Add widgets here to appear in your footer.', 'online-courses' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="widget-title">',
		'after_title'   		=> '</h5>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 2', 'online-courses' ),
		'id'            		=> 'footer-2',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'online-courses' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="widget-title">',
		'after_title'   		=> '</h5>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 3', 'online-courses' ),
		'id'            		=> 'footer-3',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'online-courses' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="widget-title">',
		'after_title'   		=> '</h5>',
	) );
	register_sidebar( array(
		'name'          		=> esc_html__( 'Footer 4', 'online-courses' ),
		'id'            		=> 'footer-4',
		'romana_description'   	=> esc_html__( 'Add widgets here to appear in your footer.', 'online-courses' ),
		'before_widget' 		=> '<div id="%1$s" class="%2$s footer-list">',
		'after_widget'  		=> '</div>',
		'before_title'  		=> '<h5 class="widget-title">',
		'after_title'   		=> '</h5>',
	) );
}
add_action( 'widgets_init', 'online_courses_widgets_init' );

/** Replaces "[...]" (appended to automatically generated excerpts) with ... and
* a 'Continue reading' link.
*/
function online_courses_excerpt_more( $link ) {
	if ( is_admin() ) {
		return $link;
	}
    if ( get_theme_mod( 'hide_post_readmore_button' ) == "" ) { 
	$link = sprintf( '<div><a href="%1$s" class="btn-bordered">%2$s</a></div>',
        esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		esc_html(get_theme_mod( 'post_button_text', 'Read More' ))
	); }
	return $link;
}
add_filter( 'excerpt_more', 'online_courses_excerpt_more' );
// Post Excerpt length
function online_courses_excerpt_length( $length ) {
    if ( is_admin() ) {   return $length;    }
    return absint(get_theme_mod('post_content_limit', 32));
}
add_filter( 'excerpt_length', 'online_courses_excerpt_length', 999 );
// Post Meta Tag
if ( ! function_exists( 'online_courses_entry_meta' ) ) :

function online_courses_entry_meta() {

    $online_courses_tag_list = get_the_tag_list('', ', ');     
    $post_comment_count = sprintf( '<span class="comments"><a href="%1$s"" ><i class="fa fa-comments-o"></i> %2$s</a></span>',esc_url( get_the_permalink() ),get_comments_number());
    $online_courses_date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" ><i class="fa fa-calendar"></i> <time class="date-time-cls" datetime="%3$s">%4$s</time></a></span>',
        esc_url( get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))),
        esc_attr( get_the_time() ),
        esc_attr( get_the_date() ),
        esc_html( get_the_date() )
    );
    if ( get_the_tag_list('', ', ') ) {
        /*  1: tag name, 2: date time, 3: post author */
        $online_courses_utility_text = ' %2$s %3$s ';
    } else {
        /*  2: date time, 3: author name */
        $online_courses_utility_text = ' %2$s %3$s ';
    }       
    printf(
        esc_html($online_courses_utility_text),
        wp_kses_post($online_courses_tag_list),
        wp_kses_post($online_courses_date),
        wp_kses_post($post_comment_count)
    );  
   }
endif;
/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function online_courses_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url(get_bloginfo( 'pingback_url' )) );
	}
}
add_action( 'wp_head', 'online_courses_pingback_header' );

// Header background image
if ( ! function_exists( 'online_courses_header_image' ) ) :
function online_courses_header_image()
{ 
    if(get_header_image() != ''){
    ?>
	<img src="<?php header_image(); ?>" width="<?php echo esc_attr(get_custom_header()->width); ?>" height="<?php echo esc_attr(get_custom_header()->height); ?>">
<?php 
    }else
    { ?>
    <div class="banner-blank-img"></div>
    <?php }
}
endif;
if ( ! function_exists( 'online_courses_breadcrumbs' ) ) :
function online_courses_breadcrumbs() {
    $online_courses_showonhome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $online_courses_showcurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    global $post;
    if (is_home() || is_front_page()) {

        if ($online_courses_showonhome == 1)
            echo '<ul id="breadcrumbs" class="breadcrumb-menubar"><li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'online-courses') . '</a></li></ul>';
    } else {

        echo '<ul id="breadcrumbs" class="breadcrumb-menubar"><li><a href="' . esc_url(home_url('/')). '">' . esc_html__('Home', 'online-courses') . '</a> ';
        if (is_category()) {
            $online_courses_thisCat = get_category(get_query_var('cat'), false);
            if ($online_courses_thisCat->parent != 0)
                echo esc_html(get_category_parents($online_courses_thisCat->parent, TRUE, ' '));            
            printf(/* translators: %s is single category */ esc_html__('/ Archive by category %s','online-courses'), single_cat_title('', false) );
        } elseif (is_search()) {
            printf(/* translators: %s is search query */  esc_html__('/ Search Results For %s','online-courses'), esc_html(get_search_query()) );
        } elseif (is_day()) {
            echo '/ '.'<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
            echo '/ '.'<a href="' . esc_url(get_month_link(get_the_time('Y'), get_the_time('m'))) . '">' . esc_html(get_the_time('F') ). '</a> ';
            echo  '/ <span>'.esc_html(get_the_time('d')).'</span>';
        } elseif (is_month()) {
            echo '/ '.'<a href="' . esc_url(get_year_link(get_the_time('Y'))) . '">' . esc_html(get_the_time('Y')) . '</a> ';
            echo  '/ <span>'.esc_html(get_the_time('F')).'</span>' ;
        } elseif (is_year()) {
            echo '/ <span>'.esc_html(get_the_time('Y')).'</span>' ;            
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $online_courses_post_type = get_post_type_object(get_post_type());
                $online_courses_slug = $online_courses_post_type->rewrite;
                echo '<a href="' . esc_url(home_url('/'. $online_courses_slug['slug'] . '/')) .'">' . esc_html($online_courses_post_type->labels->singular_name) . '</a>';
                if ($online_courses_showcurrent == 1)
                    echo  esc_html(get_the_title()) ;
            } else {
                $online_courses_cat = get_the_category();
                $online_courses_cat = $online_courses_cat[0];
                $online_courses_cats = get_category_parents($online_courses_cat, TRUE, ' ');
                if ($online_courses_showcurrent == 0)
                    $online_courses_cats = preg_replace("#^(.+)\s\s$#", "$1", $online_courses_cats);
                echo '/ '.wp_kses_post($online_courses_cats);
                if ($online_courses_showcurrent == 1)
                    echo  '/ <span>'.esc_html(get_the_title()).'</span>';
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $online_courses_post_type = get_post_type_object(get_post_type());
            echo esc_html($online_courses_post_type->labels->singular_name );
        } elseif (is_attachment()) {
            $online_courses_parent = get_post($post->post_parent);
            $online_courses_cat = get_the_category($online_courses_parent->ID);
            $online_courses_cat = $online_courses_cat[0];
            echo esc_html(get_category_parents($online_courses_cat, TRUE, '  '));
            echo '<a href="' . esc_url(get_permalink($online_courses_parent)) . '">' . esc_html($online_courses_parent->post_title) . '</a>';
            if ($online_courses_showcurrent == 1)
                echo   esc_html(get_the_title());
        } elseif (is_page() && !$post->post_parent) {
            if ($online_courses_showcurrent == 1)
                echo '/ <span>'.esc_html(get_the_title()).'</span>';
        } elseif (is_page() && $post->post_parent) {
            $online_courses_parent_id = $post->post_parent;
            $online_courses_breadcrumbs = array();
            while ($online_courses_parent_id) {
                $online_courses_page = get_page($online_courses_parent_id);
                $online_courses_breadcrumbs[] = '<a href="' . esc_url(get_permalink($online_courses_page->ID)) . '">' . esc_html(get_the_title($online_courses_page->ID)) . '</a>';
                $online_courses_parent_id = $online_courses_page->post_parent;
            }
            $online_courses_breadcrumbs = array_reverse($online_courses_breadcrumbs);
            for ($online_courses_i = 0; $online_courses_i < count($online_courses_breadcrumbs); $online_courses_i++) {
                echo esc_html($online_courses_breadcrumbs[$online_courses_i]);
                if ($online_courses_i != count($online_courses_breadcrumbs) - 1)
                    echo ' ';
            }
            if ($online_courses_showcurrent == 1)
                echo '/ <span>'.esc_html(get_the_title()).'</span>';
        } elseif (is_tag()) { 
            printf(/* translators: %s is single tag */  esc_html__('Posts tagged %s','online-courses'), single_tag_title('', false) );
        } elseif (is_author()) {
            global $author;
            $online_courses_userdata = get_userdata($author);       
            printf(/* translators: %s is author name */  esc_html__('Articles Published by %s','online-courses'), esc_html($online_courses_userdata->display_name ) );
        } elseif (is_404()) {
            esc_html_e('Error 404', 'online-courses') ;
        }

        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
               printf(/* translators: %s is search query. */  esc_html__('( Page %s )','online-courses'), esc_html(get_query_var('paged')) );
        }
        echo '</li></ul>';
    }
}
endif;
// Remove Comment Website Field
add_filter('comment_form_default_fields', 'online_courses_remove_url');
function online_courses_remove_url($val) {
    $val['url'] = '';
    return $val;    
}
// Comment Form Fields Placeholder
function online_courses_comment_form_fields( $fields ) {
    foreach( $fields as &$field ) {
        $field = str_replace( 'id="author"', 'id="author" placeholder="'.esc_attr__('Name *','online-courses').'"', $field );
        $field = str_replace( 'id="email"', 'id="email" placeholder="'.esc_attr__('Email *','online-courses').'"', $field );
    }
    return $fields;
}
add_filter( 'comment_form_default_fields', 'online_courses_comment_form_fields' );
// Change comment form textarea to use placeholder
function online_courses_comment_textarea_placeholder( $args ) {
    $args['comment_field']        = str_replace( 'textarea', 'textarea placeholder="'.esc_attr__('Write your comment','online-courses').'"', $args['comment_field'] );
    return $args;
}
add_filter( 'comment_form_defaults', 'online_courses_comment_textarea_placeholder' );
if ( ! function_exists( 'online_courses_comment' ) ) :
function online_courses_comment( $comment, $args, $depth ) {
    switch ( $comment->comment_type ) :
    case 'pingback' :
    case 'trackback' :
// Display trackbacks differently than normal comments.?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
  <p><?php esc_html_e( 'Pingback:', 'online-courses' ); ?>
    <?php comment_author_link(); ?>
    <?php edit_comment_link( esc_html__( 'Edit', 'online-courses' ), '<span class="edit-link">', '</span>' ); ?>
  </p>
</li>
<?php
break;
default :
// Proceed with normal comments.
if($comment->comment_approved == 1)
{
global $post; ?>
<div class="comments-list">
    <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
      <article id="comment-<?php comment_ID(); ?>" class="comment ">
        <div class="right-img">
            <figure class="avtar"> <a href="#"><?php echo get_avatar( get_the_author_meta(), '80'); ?></a> </figure>
        </div>
        <div class="con txt-holder">
            <?php
            printf( '<h4 class="comment-title-date">%1$s',
            get_comment_author_link(),
            ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author ', 'online-courses' ) . '</span>' : ''
            );
            echo ' '.get_comment_date().' at '.esc_html(get_the_time()).'</h4>'; ?>
            <div class="comment-content comment">
                <?php comment_text();
                echo '<a href="#" class="reply pull-right">'.comment_reply_link( array_merge( $args, array( 'reply_text' => __( '<i class="fa fa-reply-all" aria-hidden="true"></i> Reply', 'online-courses' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ).'</a>'; ?>
            </div> 
            <!-- .comment-content --> 
        </div>
            <!-- .txt-holder --> 
    </article>
    </div>
</div>
 <!-- #comment-## -->
<?php }
break; endswitch; // end comment_type check
}
endif;
add_filter('get_search_form', 'online_courses_search_form');
function online_courses_search_form($html) {
    if(is_front_page()) :
        $html = '<form action="'.esc_url(home_url()).'" method="get">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="'.esc_attr(get_theme_mod('slider_serach_form_text')).'" value="" name="s">
              <input type="hidden" value="" name="lp_course" id="lp_course">
              <span class="input-group-btn">
                <button class="btn btn-search" type="submit"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>';
    endif; 
 return $html;
 }

 if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}
include get_template_directory().'/inc/enqueues.php';
include get_template_directory().'/inc/fontawasome.php';
include get_template_directory().'/inc/theme-customization.php';
include get_template_directory().'/inc/fonts.php';
include get_template_directory().'/inc/class-tgm-plugin-activation.php';
include get_template_directory().'/inc/theme-default-setup.php';