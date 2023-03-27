<?php
/**
 * The template for displaying 404 pages (not found)
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
<section class="main_blog_content">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                <div class="page-404-content">
                    <h1><?php esc_html_e( "Oops! That page can't be found.", 'online-courses' ); ?></h1>
            		<h3><?php esc_html_e('It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'online-courses'); ?></h3>
            		<?php get_search_form(); ?>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>
<?php get_footer();