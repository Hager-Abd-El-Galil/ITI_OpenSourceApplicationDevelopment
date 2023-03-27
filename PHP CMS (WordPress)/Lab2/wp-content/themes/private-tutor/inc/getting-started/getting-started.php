<?php
//about theme info
add_action( 'admin_menu', 'private_tutor_gettingstarted' );
function private_tutor_gettingstarted() {    	
	add_theme_page( esc_html__('About Theme', 'private-tutor'), esc_html__('About Theme', 'private-tutor'), 'edit_theme_options', 'private_tutor_guide', 'private_tutor_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function private_tutor_admin_theme_style() {
   wp_enqueue_style('custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/getting-started/getting-started.css');
}
add_action('admin_enqueue_scripts', 'private_tutor_admin_theme_style');

//guidline for about theme
function private_tutor_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'private-tutor' );

?>

<div class="wrapper-info">
	<div class="col-left">
		<div class="intro">
			<h3><?php esc_html_e( 'Welcome to Private Tutor WordPress Theme', 'private-tutor' ); ?> <span>Version: <?php echo esc_html($theme['Version']);?></span></h3>
		</div>
		<div class="started">
			<hr>
			<div class="free-doc">
				<div class="lz-4">
					<h4><?php esc_html_e( 'Start Customizing', 'private-tutor' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Go to', 'private-tutor' ); ?> <a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e( 'Customizer', 'private-tutor' ); ?> </a> <?php esc_html_e( 'and start customizing your website', 'private-tutor' ); ?></span>
					</ul>
				</div>
				<div class="lz-4">
					<h4><?php esc_html_e( 'Support', 'private-tutor' ); ?></h4>
					<ul>
						<span><?php esc_html_e( 'Send your query to our', 'private-tutor' ); ?> <a href="<?php echo esc_url( PRIVATE_TUTOR_SUPPORT ); ?>" target="_blank"> <?php esc_html_e( 'Support', 'private-tutor' ); ?></a></span>
					</ul>
				</div>
			</div>
			<p><?php esc_html_e( 'Private Tutor is an elegantly designed WordPress theme with a sophisticated look that is great for creating websites for private tutors, educational institutions, coaching academies, online coach, e-learning colleges, and schools. This responsive theme is compatible with the latest version of WordPress and has clean and optimized codes that are written as per the latest WordPress standards. Being a professionally crafted theme, it gives a clean and minimalist look to portray just the correct amount of information regarding your teaching center. You will get the benefits of its responsive layout as your website will scale perfectly to different screen sizes and you will never lose the traffic coming from mobile users. The bootstrap based theme includes stunning animations and interactive elements to keep your visitors hooked. Its secure codes provide a secure environment for your website and the retina-ready design makes every element of your website look absolutely perfect and crystal clear. Thanks to the personalization options included, you can easily transform the entire look and add your own flair to your website. The faster page load time of this theme keeps the interest of your visitors alive. It includes Call To Action (CTA) buttons, plenty of shortcodes, SEO friendly design and is translatable to different languages.', 'private-tutor')?></p>
			<hr>			
			<div class="col-left-inner">
				<h3><?php esc_html_e( 'Get started with Free Private Tutor Theme', 'private-tutor' ); ?></h3>
				<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/customizer-image.png" alt="" />
			</div>
		</div>
	</div>
	<div class="col-right">
		<div class="col-left-area">
			<h3><?php esc_html_e('Premium Theme Information', 'private-tutor'); ?></h3>
			<hr>
		</div>
		<div class="centerbold">
			<a href="<?php echo esc_url( PRIVATE_TUTOR_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'private-tutor'); ?></a>
			<a href="<?php echo esc_url( PRIVATE_TUTOR_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'private-tutor'); ?></a>
			<a href="<?php echo esc_url( PRIVATE_TUTOR_PRO_DOCS ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'private-tutor'); ?></a>
			<hr class="secondhr">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/private-tutor.jpg" alt="" />
		</div>
		<h3><?php esc_html_e( 'PREMIUM THEME FEATURES', 'private-tutor'); ?></h3>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon01.png" alt="" />
			<h4><?php esc_html_e( 'Banner Slider', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon02.png" alt="" />
			<h4><?php esc_html_e( 'Theme Options', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon03.png" alt="" />
			<h4><?php esc_html_e( 'Custom Innerpage Banner', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon04.png" alt="" />
			<h4><?php esc_html_e( 'Custom Colors and Images', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon05.png" alt="" />
			<h4><?php esc_html_e( 'Fully Responsive', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon06.png" alt="" />
			<h4><?php esc_html_e( 'Hide/Show Sections', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon07.png" alt="" />
			<h4><?php esc_html_e( 'Woocommerce Support', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon08.png" alt="" />
			<h4><?php esc_html_e( 'Limit to display number of Posts', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon09.png" alt="" />
			<h4><?php esc_html_e( 'Multiple Page Templates', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon10.png" alt="" />
			<h4><?php esc_html_e( 'Custom Read More link', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon11.png" alt="" />
			<h4><?php esc_html_e( 'Code written with WordPress standard', 'private-tutor'); ?></h4>
		</div>
		<div class="lz-6">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/getting-started/images/icon12.png" alt="" />
			<h4><?php esc_html_e( '100% Multi language', 'private-tutor'); ?></h4>
		</div>
	</div>
</div>
<?php } ?>