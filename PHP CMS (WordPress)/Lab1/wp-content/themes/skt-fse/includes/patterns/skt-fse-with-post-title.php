<?php
/**
 * Cover With Post title 
 */
return array(
	'title'      => __( 'Cover With Post title', 'skt-fse' ),
	'categories' => array( 'skt-fse' ),
	'blockTypes' => array( 'core/template-part/skt-fse' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px","right":"0px","left":"0px"}}},"className":"skt-fse-inner-banner","layout":{"type":"constrained"}} -->
<div class="wp-block-group skt-fse-inner-banner" style="padding-top:0px;padding-right:0px;padding-bottom:0px;padding-left:0px"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()).'/assets/images/default-banner.jpg","id":220,"dimRatio":30,"overlayColor":"foreground","minHeight":350,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-foreground-background-color has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-220" alt="request-free-img" src="'.esc_url(get_template_directory_uri()).'/assets/images/default-banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:post-title {"textAlign":"center","textColor":"background","className":"skt-fse-inner-banner-title","fontFamily":"poppins"} /--></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);