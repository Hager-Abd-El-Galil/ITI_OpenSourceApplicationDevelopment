<?php
/**
 * The template for displaying single posts
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
<!-- All Content start -->
    <section class="main_blog_content">
        <div class="container">
            <div class="row">
                <?php
                $custom_class = (get_theme_mod('single_post_sidebar_layout', 'right') == 'left') ? "9" : ((get_theme_mod('single_post_sidebar_layout', 'right') == 'right') ? "9" : "12");  
                if ( get_theme_mod( 'single_post_sidebar_layout','right'  ) == "left" ) { ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
                    <?php get_sidebar(); ?>
                </div><?php } ?>
                <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-12 col-xs-12">
                <?php if ( have_posts() ) :
                    while ( have_posts() ) : the_post(); ?>
                    <div class="course-description" id="learn-press-course-description">
                        <?php
                        if ( get_theme_mod( 'hide_single_post_image' ) == "" ) { 
                        if(has_post_thumbnail()): ?>
                        <div class="blog_image">                        
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                        <?php endif; 
                        } ?>
                        <?php if ( get_theme_mod( 'hide_single_post_meta_tag' ) == "" ) {  ?>
                        <div class="post-meta">
                            <p><?php online_courses_entry_meta(); ?></p>
                        </div>
                        <?php } ?>
                        <div class="post-description">
                        
                        <?php the_content(); ?>
                        </div>
                        <div class="bootom_pagination">
                        <?php
                         /* Pagignation Start */
                            the_post_navigation( array(
                            'type'  => 'list','prev_text' => '<i class="fa fa-arrow-left" aria-hidden="true"></i>'.esc_html__( ' Previous', 'online-courses' ),
                            'next_text' => esc_html__( 'Next ', 'online-courses' ).'<i class="fa fa-arrow-right" aria-hidden="true"></i>',
                            'screen_reader_text' => ' ',                         
                            ) ); 
                            wp_link_pages();
                        /* Pagignation End*/ ?>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                    <?php if ( get_theme_mod( 'hide_single_post_comment_form' ) == "" ){ ?>
                    <div class="box">
                    <div class="col-lg-12">
                    <div id="respond" class="comment-respond">
                       <?php comment_form(); ?>
                    </div></div>
                    </div>.
                    <?php } ?>
                    <?php if (comments_open() || get_comments_number()) : if ( get_theme_mod( 'hide_single_post_comment_form' ) == "" ) :  ?>
                    <div class="box">
                        <div class="comments">
                             <?php if (comments_open() || get_comments_number()) : if ( get_theme_mod( 'hide_single_post_comment_form' ) == "" ) :  ?>
                            <div class="comments">
                            <?php if(get_comments_number() > 0){ ?>
                                <div class="comment_title">
                                    <h3 class="title_line"><i class="fa fa-comments"></i> <?php esc_html_e('Comments','online-courses'); ?></h3>
                                </div>
                            <?php } comments_template(); ?>
                            </div>
                            <?php endif; endif; ?>
                        </div>
                    </div>
                    <?php endif; endif;?>
                </div>
                <?php if ( get_theme_mod( 'single_post_sidebar_layout','right'  ) == "right" ) { ?>
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">                
                    <?php get_sidebar(); ?>
                </div><?php } ?>
            </div>
        </div>

    </section>

    <!-- All content End -->
<?php get_footer();