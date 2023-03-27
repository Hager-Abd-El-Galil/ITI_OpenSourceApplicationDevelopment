<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<body <?php body_class();?>>
<?php wp_body_open(); ?>
<div class="preloader-block"><span class="preloader-gif"></span> </div>
<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'online-courses' ); ?></a>
<header>
    <div id="main_header_bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 pull-right text-right">
                        <nav id='cssmenu'>
                            <div class="logo brand">
                            <?php if(has_custom_logo()){ the_custom_logo(); } 
                              if(display_header_text()){ ?><a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="brand_text"><span class="site-title"><h4><?php echo esc_html( get_bloginfo( 'name' ) ); ?></h4><small class="site-description"><?php echo esc_html( get_bloginfo( 'description' ) ); ?></small></span></a> <?php } ?>
                            </div>
                            <div id="head-mobile"></div>
                            <div class="button"></div>                            
                            <?php if (has_nav_menu('primary')) :                                 
                                wp_nav_menu(array(
                                    'theme_location' => 'primary',
                                    'container' => false,
                                    'items_wrap' => '<ul class="first_menu">%3$s</ul>',
                                ));
                                else :
                                    wp_nav_menu(
                                        array(
                                          'theme_location' => 'primary',
                                          'fallback_cb'    => 'online_courses_default_menu'
                                    )); 
                                endif;?>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
</header>