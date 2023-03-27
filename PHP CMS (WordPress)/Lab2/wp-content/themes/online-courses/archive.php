<?php
/**
 * The template for displaying archive pages like categories, tags, authors, months
 * @package Online Courses
 */
 get_header(); ?>
<!-- Start Slider -->
<div class="banner">
    <?php  online_courses_header_image(); ?>
    <div class="custom_overlay">
    </div>
    <div class="banner_text">
        <h1> <?php the_archive_title(); ?> </h1>
        <?php online_courses_breadcrumbs(); ?>
    </div>
</div>
<!-- End Slider -->
<!-- All Content start -->
<section class="main_blog_content">
    <div class="container">
        <div class="row">
            <?php 
            $custom_class = (get_theme_mod('post_sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('post_sidebar_layout', 'right') == 'right') ? "9" : "12");  
            if ( get_theme_mod( 'post_sidebar_layout','right'  ) == "left" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div><?php } ?>
            <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12">
            <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); 
                        get_template_part( 'template-parts/post/content', get_post_format() );
                    endwhile; ?>
                    <div class="row">
                        <div class="col-md-12">
                          <div class="text-center post-pagination-content">
                            <?php
                             the_posts_pagination( array(
                            'type'  => 'list',
                            'screen_reader_text' => ' ',
                            'prev_text'          => esc_html__( '<< Previous', 'online-courses' ),
                            'next_text'          => esc_html__('Next >>','online-courses'),
                        ) ); ?>
                          </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            <?php if ( get_theme_mod( 'post_sidebar_layout','right' ) == "right" ) { ?>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- All content End -->
<?php get_footer(); ?>