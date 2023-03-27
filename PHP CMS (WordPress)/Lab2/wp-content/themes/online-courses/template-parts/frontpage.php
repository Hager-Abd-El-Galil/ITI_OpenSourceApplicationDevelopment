<?php
/*
* Template Name: Front Page
*/
get_header(); 
if(get_theme_mod('hide_slider_section') == '')
{
?>
<!-- Start Slider -->
<div class="slider">
    <div id="home-slider" class="owl-carousel owl-theme">
        <?php $imag_count=0;for($online_courses=1;$online_courses<=2;$online_courses++){ 
        $image_url = wp_get_attachment_url(get_theme_mod('slider_image_'.$online_courses)); 
        if($image_url != ""){ ;?>
        <div class="item">
            <div class="custom_overlay_wrapper">
                <img src="<?php echo esc_url($image_url); ?>">
                <div class="custom_overlay">
                </div>
            </div>
        </div>
        <?php $imag_count=$online_courses+1; } } ?>
    </div>
    <?php if($imag_count > 0){ ?>
    <div class="online-course-new-text">
        <div class="col-md-12">
            <h2 class="fadeInLeft"><?php echo esc_html(get_theme_mod('slider_section_title')); ?></h2>   
            <h4><?php echo esc_html(get_theme_mod('slider_section_sub_title')); ?></h4>
            <?php get_search_form(); ?>
        </div>
     </div> 
    <?php } ?>
</div>
<!-- End Slider -->
<?php } 
if(get_theme_mod('hide_key_feature_section') == ''){ ?>
<!-- Slider strip -->
<section class="slider_strip layout-set">
    <div class="container">
        <div class="row">
        <?php for($online_courses=1;$online_courses<=3;$online_courses++){ ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="main_strip">
                    <span class="main_strip_icon"><i class="<?php echo esc_attr(get_theme_mod('key_feature_icon'.$online_courses,'fa fa-gear')); ?>" aria-hidden="true"></i></span>
                    <div class="strip_details">
                        <b><?php echo esc_html(get_theme_mod('key_feature_title'.$online_courses, esc_html__('Online courses','online-courses') )); ?></b>
                        <div class="strip_sub-title">
                            <p><?php echo esc_html(get_theme_mod('key_feature_description'.$online_courses)); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
</section>
<!-- End Slider Strip -->
<?php } 
if(get_theme_mod('hide_our_courses_section') == ''){ ?>  
<!--Feature Product  -->
<section class="feature_product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <h2 class="special-title"><?php echo esc_html(get_theme_mod('our_courses_section_title',esc_html__('Our Courses','online-courses') )); ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="our_course_details">
                    <div class="our_course">
                        <div class="our_course_title">
                            <h4><?php echo esc_html(get_theme_mod('our_courses_section_sub_title',esc_html__('The world`s largest selection of courses','online-courses') )); ?></h4>
                        </div>
                        <div class="our_course_subtitle">
                        <p><?php echo wp_kses_post(get_theme_mod('our_courses_section_description')); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        if(count(get_theme_mod('our_courses_section_category', array(0=>1))) > 0 && get_theme_mod('our_courses_section_category',array(0=>1)) != ""):
            if(count(get_theme_mod('our_courses_section_category',array(0=>1))) > 1){ ?>
            <ul class="nav nav-tabs">
                <?php
                $cat_count=1;
                foreach ( get_theme_mod('our_courses_section_category',array(0=>1)) as $key=>$cat_val ){
                    if($cat_count <= 6){
                    $active_class="";
                    if($cat_count == 1){ $active_class="active"; }
                      ?>
                     <li class="<?php echo esc_attr($active_class); ?>" id="tab_menu<?php echo esc_attr($cat_count); ?>"><a data-toggle="tab" href="#menu<?php echo esc_attr($cat_count); ?>" aria-expanded="true"><?php echo esc_html(get_cat_name( $cat_val )); ?></a></li>
                    <?php $cat_count=$cat_count + 1;}
                } ?>
            </ul>
        <?php } ?>
        <div class="tab-content">
            <?php
            $cat_count=1;
            foreach ( get_theme_mod('our_courses_section_category',array(0=>1)) as $key=>$cat_val ){
            if($cat_count <= 6){
            $active_class="";
            if($cat_count == 1){ $active_class="active"; } ?>
            <div id="menu<?php echo esc_attr($cat_count); ?>" class="tab-pane fade <?php echo esc_attr($active_class) ?> in">
                <div class="row">
                    <?php    
                    $args = array('cat' => $cat_val, 'order' => 'DESC', 'posts_per_page' => 4,'post_status' => 'publish');
                    $homepage_our_course = new WP_Query($args);
                    if($homepage_our_course->have_posts()) : 
                    while ($homepage_our_course->have_posts()) : $homepage_our_course->the_post(); ?>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div class="main_vdo">
                            <div class="vdo">
                                <button type="button" class="btn btn-info btn-lg"><?php if ( has_post_format( 'video' )) { ?><i class="fa fa-play-circle-o" aria-hidden="true"></i><?php } ?>
                                <?php
                                if(has_post_thumbnail()) {
                                 the_post_thumbnail('online-courses-our-courses-home',array('class' => 'img-responsive responsive--full')); }
                                 else{ ?>
                                   <div class="no-our-courses-image"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>
                                 <?php } ?>
                                 </button>
                            </div>
                            <div class="product-details">
                                <div class="product-name">
                                    <span><?php 
                                    $post_tags = get_the_tags();
                                    if ( $post_tags ) {
                                        echo esc_html($post_tags[0]->name); 
                                    } ?></span>
                                    <a href="<?php the_permalink(); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), 5, '...' )); ?> </a>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(),16, '...')); ?></p>
                                </div>
                                <?php if(get_theme_mod('hide_our_courses_single_post_button') == ''): ?>
                                <div class="details-bottom">
                                    <div class="product-author"><a href="<?php the_permalink(); ?>" class="read_more"><?php echo esc_html(get_theme_mod('our_courses_single_post_button',esc_html__('Read More','online-courses') )); ?><i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                    </a></div>
                                </div>
                            <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; wp_reset_postdata(); endif ?>
                </div>
                <?php if(get_theme_mod('hide_our_courses_post_category_button') == ''): ?>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <?php if(get_theme_mod('our_courses_section_category') != ""){
                            $url =get_category_link( $cat_val );
                        }else{ $url = ""; }  ?>
                    <a href="<?php echo esc_url($url); ?>" class="view_more"><?php echo esc_html(get_theme_mod('our_courses_post_category_button',esc_html__('View More','online-courses') )); ?></a>
                    </div>
                </div>
            <?php endif; ?>
            </div>
            <?php $cat_count=$cat_count + 1; } } ?>
        </div>
    <?php endif; ?>
    </div>
</section>
<!-- End Feature products -->
<?php }
if(get_theme_mod('hide_upcoming_course_section') == ''){  ?>
<!-- New Courses Start  -->
<section class="new_course layout-set">
<div class="container"> 
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <h2 class="special-title"><?php echo esc_html(get_theme_mod('upcoming_course_section_title', esc_html__('Upcoming Course','online-courses') )); ?></h2>  
                </div>
                <?php    
                $post_per_page=(get_theme_mod('upcoming_course_section_category') == "")?1:2;
                $args = array('cat' => get_theme_mod('upcoming_course_section_category'), 'order' => 'DESC', 'posts_per_page' => $post_per_page,'post_status' => 'publish');
                $homepage_upcomming_course = new WP_Query($args);
                if($homepage_upcomming_course->have_posts()) : 
                while ($homepage_upcomming_course->have_posts()) : $homepage_upcomming_course->the_post(); ?>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">
                    <div class="events-single">
                        <div class="event_set">
                        <?php if(has_post_thumbnail()) { ?>
                            <?php the_post_thumbnail('online-courses-upcoming-course-home',array('class' => 'img-responsive responsive--full')); ?>
                            <b><?php echo get_the_date(); ?></b>
                            <?php }else{ ?>
                            <div class="upcoming-no-image"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>
                            <b><?php echo get_the_date(); ?></b>
                            <?php } ?>
                        </div>
                        <div class="events-single-content">
                            <a href="<?php the_permalink(); ?>"> <?php echo esc_html(wp_trim_words( get_the_title(), 8, '...' )); ?> </a>
                            <p><?php echo esc_html(wp_trim_words(get_the_content(),14, '...')); ?></p>
                            <a href="<?php the_permalink(); ?>" class="view_more"><?php echo esc_html(get_theme_mod('upcoming_course_button_title', esc_html__( 'Know More','online-courses') )); ?></a>
                        </div>
                    </div>
                </div>  
                <?php endwhile; wp_reset_postdata(); endif; ?>      
            </div>
        </div>
</section>
<!-- New Courses End -->
<?php } 
if(get_theme_mod('hide_experts_video_section') == ''){ ?> 
<!-- Video section start -->
<section class="video_sec layout-set">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="video-content">
                    <a href="<?php echo esc_url(get_theme_mod('experts_video_url')); ?>" class="btn-circle video"><i class="<?php echo esc_attr(get_theme_mod('experts_video_icon','fa fa-play')); ?>"></i></a>
                        <h3><?php echo esc_html(get_theme_mod('experts_video_title',esc_html__( 'Watch Our Experts Video','online-courses') )); ?></h3>
                    </div>
                </div>
            </div>
        </div>
</section>
 <!-- Video section End -->
<?php } 
if(get_theme_mod('hide_testimonials_section','true') == ''){ ?>
<!--Start  Testimonial-->
<section class="review_students">
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
         <h2 class="special-title"><?php echo esc_html(get_theme_mod('testimonials_section_title',esc_html__( 'Testimonials','online-courses') )); ?></h2> 
        </div>
        <div id="test-slider" class="owl-carousel owl-theme">
        <?php for($online_courses=1;$online_courses<=2;$online_courses++){ 
            if(get_theme_mod('testimonials_image_'.$online_courses) != ""){
            ?>
            <div class="item">
               <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="test_img">
                            <img src="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('testimonials_image_'.$online_courses))); ?>">
                        </div>
                    </div>       
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="testi_text">
                            <p><?php echo esc_html(get_theme_mod('testimonials_description'.$online_courses)); ?></p>    
                            <span><?php echo esc_html(get_theme_mod('testimonials_title'.$online_courses)); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        <?php } } ?>
        </div>
    </div>
</div>
</section>
<?php } ?>
<!-- End Testimonial -->
<?php get_footer();