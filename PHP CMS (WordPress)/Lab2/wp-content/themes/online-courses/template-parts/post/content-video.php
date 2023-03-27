<?php
/**
 * Template part for displaying posts
 * @package Online Courses
 */
?>
<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<div class="row">
    <div class="media">
        <?php if ( get_theme_mod( 'hide_post_image' ) == "" ) {
        $custom_class='6'; ?>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 pad_left">
            <div class="media-left-image">
                <div class="hvrbox">
                    <a href="<?php the_permalink(); ?>">
                    <?php if(has_post_thumbnail()) 
                        {
                            the_post_thumbnail( 'online-courses-blog-image', array('class' => '') );
                        }else {
                            echo '<div class="no-blog-post-image"><i class="fa fa-file-image-o" aria-hidden="true"></i></div>';
                         } ?> 
                    </a>
                    <div class="hvrbox-layer_top hvrbox-text">                                          
                        <div class="hvrbox-text">
                            <a href="<?php the_permalink(); ?>" class="btn-circle video"><i class="fa fa-play"></i></a><br><a href="#"> </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php }else{ $custom_class='12'; } ?>
        <div class="col-lg-<?php echo esc_attr($custom_class); ?> col-md-<?php echo esc_attr($custom_class); ?> col-sm-<?php echo esc_attr($custom_class); ?> col-xs-12">
            <div class="media-blog-body">
                <h2><a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words( get_the_title(), 7, '...' )); ?></a></h2>
                <?php if ( get_theme_mod( 'hide_post_meta_tag' ) == "" ) {  ?>
                <div class="post-meta">
                    <?php online_courses_entry_meta(); ?>
                </div>
                <?php } ?>
                <h5 class="author-nm"><a href="<?php echo esc_url( get_permalink( get_the_ID() ) ) ?>"><?php echo esc_html(get_the_author()); ?></a></h5>
                <?php the_excerpt(); ?>
            </div>
        </div>
    </div>
</div>
</div>