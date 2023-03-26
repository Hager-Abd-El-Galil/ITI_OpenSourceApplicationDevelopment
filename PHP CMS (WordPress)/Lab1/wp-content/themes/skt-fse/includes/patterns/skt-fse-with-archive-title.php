<?php
/**
 * Cover With Archive title 
 */
return array(
	'title'      => __( 'Cover With Archive title', 'skt-fse' ),
	'categories' => array( 'skt-fse' ),
	'blockTypes' => array( 'core/template-part/skt-fse' ),
	'content'    => '<!-- wp:group {"style":{"spacing":{"padding":{"top":"0px","bottom":"0px"}},"typography":{"fontSize":"40px","fontStyle":"normal","fontWeight":"600"},"color":{"text":"#0a1d2d"}},"className":"skt-fse-inner-banner","layout":{"type":"constrained","contentSize":""},"fontFamily":"poppins"} -->
<div class="wp-block-group skt-fse-inner-banner has-text-color has-poppins-font-family" style="color:#0a1d2d;padding-top:0px;padding-bottom:0px;font-size:40px;font-style:normal;font-weight:600"><!-- wp:cover {"url":"'.esc_url(get_template_directory_uri()).'/assets/images/default-banner.jpg","id":220,"dimRatio":30,"overlayColor":"tertiary","minHeight":350,"minHeightUnit":"px","isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:350px"><span aria-hidden="true" class="wp-block-cover__background has-tertiary-background-color has-background-dim-30 has-background-dim"></span><img class="wp-block-cover__image-background wp-image-220" alt="request-free-img" src="'.esc_url(get_template_directory_uri()).'/assets/images/default-banner.jpg" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:query-title {"type":"archive","textAlign":"center","textColor":"background","className":"skt-fse-inner-banner-title","fontFamily":"poppins"} /--></div></div>
<!-- /wp:cover --></div>
<!-- /wp:group -->',
);