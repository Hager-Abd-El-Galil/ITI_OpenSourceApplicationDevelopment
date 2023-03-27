<footer>
<?php
if(get_theme_mod('hide_social_icon_section') == ''){
$icon_count=0; 
for($online_courses=0;$online_courses<=7;$online_courses++){ 
    if(get_theme_mod('footer_social_icon_link'.$online_courses) != ""){ $icon_count=1; } 
} 
if($icon_count > 0):
?>
<div class="first_footer layout-set">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 text-center">
                <ul class="social-icons">
                <?php for($online_courses=0;$online_courses<=7;$online_courses++){ 
                    if(get_theme_mod('footer_social_icon_link'.$online_courses) != ""){ ?>
                    <li><a href="<?php echo esc_url(get_theme_mod('footer_social_icon_link'.$online_courses)); ?>" target="_blank"><span class="<?php echo esc_attr(get_theme_mod('footer_social_icon'.$online_courses,'fa fa-facebook')); ?>"></span></a></li>
                <?php } }?>
                </ul>
            </div> 
        </div>
    </div>
</div>
<?php
endif;
}
if(get_theme_mod('hide_footer_widget_section') == '') : 
if(is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) {
$footer_widget_style = get_theme_mod('footer_widget_style',3); 
    $footer_widget_style = $footer_widget_style+1;
    $footer_column_value = floor(12/($footer_widget_style)); ?>
    <div class="second_footer layout-set">
        <div class="container">
            <div class="row"> 
                <?php for( $i=1; $i<=$footer_widget_style; $i++) {
                    if (is_active_sidebar('footer-'.$i)) { ?>
                        <div class="col-md-<?php echo esc_attr($footer_column_value); ?> col-sm-<?php echo esc_attr($footer_column_value); ?> col-xs-12"><?php dynamic_sidebar('footer-'.$i); ?></div>
                    <?php }                            
                 } ?>                                  
            </div>                  
        </div>
    </div>
<?php } 
endif;?>
<div class="site-info">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 col-xs-12 col-md-12 text-center">
                <div class="site-info-text"> 
                    <?php if(get_theme_mod('footer_copyright_text') != ""){ ?>
                    <p><?php echo wp_kses_post(get_theme_mod('footer_copyright_text')); ?></p>
                    <?php } ?>                   
                    <p><?php esc_html_e('Theme : ','online-courses'); ?><a href="<?php echo esc_url('https://wpdigipro.com/wordpress-themes/online-courses/'); ?>"><?php esc_html_e(' Online Courses Website','online-courses'); ?></a></p>
                </div>
            </div>
        </div>
    </div> 
    <div class="scroll_top">
        <span class="fa fa-chevron-up"></span>
    </div>
</div>  
</footer>
<?php wp_footer(); ?>
</body>
</html>