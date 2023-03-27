<?php
/**
 * The header for our theme
 *
 * @subpackage Private Tutor
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open();
} else {
    do_action( 'wp_body_open' );
}?>

<a class="screen-reader-text skip-link" href="#skip-content"><?php esc_html_e( 'Skip to content', 'private-tutor' ); ?></a>

<div id="header">
	<div class="bottom-header">
		<div class="container">
			<div class="row">
				<div class="logo col-lg-3 col-md-5 align-self-center">
					<?php if ( has_custom_logo() ) : ?>
	            		<?php the_custom_logo(); ?>
		            <?php endif; ?>
	             	<?php if (get_theme_mod('private_tutor_show_site_title',true)) {?>
              			<?php $blog_info = get_bloginfo( 'name' ); ?>
		                <?php if ( ! empty( $blog_info ) ) : ?>
		                  	<?php if ( is_front_page() && is_home() ) : ?>
		                    	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		                  	<?php else : ?>
	                      		<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	                  		<?php endif; ?>
		                <?php endif; ?>
		            <?php }?>
		            <?php if (get_theme_mod('private_tutor_show_tagline',true)) {?>
		                <?php
	                  		$description = get_bloginfo( 'description', 'display' );
		                  	if ( $description || is_customize_preview() ) :
		                ?>
	                  	<p class="site-description">
	                    	<?php echo esc_attr($description); ?>
	                  	</p>
	              		<?php endif; ?>
              		<?php }?>
				</div>
				<div class="menu-section col-lg-8 col-md-6 col-6 align-self-center">
					<div class="toggle-menu responsive-menu">
						<?php if(has_nav_menu('primary')){ ?>
			            	<button onclick="private_tutor_open()" role="tab" class="mobile-menu"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','private-tutor'); ?></span></button>
			            <?php }?>
			        </div>
					<div id="sidelong-menu" class="nav sidenav">
		                <nav id="primary-site-navigation" class="nav-menu" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'private-tutor' ); ?>">
		                  	<?php if(has_nav_menu('primary')){
			                    wp_nav_menu( array( 
									'theme_location' => 'primary',
									'container_class' => 'main-menu-navigation clearfix' ,
									'menu_class' => 'clearfix',
									'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
									'fallback_cb' => 'wp_page_menu',
			                    ) ); 
		                  	} ?>
		                  	<a href="javascript:void(0)" class="closebtn responsive-menu" onclick="private_tutor_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','private-tutor'); ?></span></a>
		                </nav>
		            </div>
				</div>
				<div class="col-lg-1 col-md-1 col-6 align-self-center">
					<div class="search-box">
						<button  onclick="private_tutor_search_open()" class="search-toggle"><i class="fas fa-search"></i></button>
					</div>
				</div>
				<div class="search-outer">
					<div class="search-inner">
			        	<?php get_search_form(); ?>
		        	</div>
		        	<button onclick="private_tutor_search_close()" class="search-close"><i class="fas fa-times"></i></button>
		        </div>
			</div>
		</div>
	</div>
</div>

<?php if(is_singular()) {?>
	<div id="inner-pages-header">
		<div class="header-overlay"></div>
	    <div class="header-content-box">
		    <div class="container text-center"> 
		      	<h1><?php single_post_title(); ?></h1>
		      	<div class="theme-breadcrumb py-2">
					<?php utsav_event_planner_breadcrumb();?>
				</div>
		    </div>
		</div>
	</div>
<?php } ?>