<?php
/**
 * The template for displaying single page
 * @package Online Courses
 */
get_header(); ?>
<!-- Start Slider -->
<div class="banner">
    <?php  online_courses_header_image(); ?>
    <div class="custom_overlay">
    </div>
    <div class="banner_text">
        <h1><?php the_title();?></h1>
        <?php online_courses_breadcrumbs(); ?>
    </div>
</div>
<!-- End Slider -->
<section class="main_page_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
             <?php if ( have_posts() ) :
                while ( have_posts() ) : the_post(); ?>
                <div id="post-<?php the_ID(); ?>" <?php post_class('page-cls'); ?> >  
                  <?php the_content(); 
                    wp_link_pages(array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'online-courses'),
                    'after' => '</div>',
                ));?>
                </div>
            <?php endwhile; endif; ?>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();