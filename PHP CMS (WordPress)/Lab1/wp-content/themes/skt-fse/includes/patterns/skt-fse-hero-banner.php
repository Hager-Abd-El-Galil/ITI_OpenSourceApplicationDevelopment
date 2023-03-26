<?php
/**
 * Hero Banner
 */
return array(
	'title'      => __( 'Hero Banner', 'skt-fse' ),
	'categories' => array( 'skt-fse' ),
	'blockTypes' => array( 'core/template-part/skt-fse' ),
	'content'    => '<!-- wp:group {"tagName":"section","style":{"color":{"background":"#84a7c7"},"spacing":{"padding":{"top":"0px","bottom":"0px"}}},"className":"skt-fse-sec skt-fse-section1","layout":{"type":"constrained","contentSize":"1200px"}} -->
<section class="wp-block-group skt-fse-sec skt-fse-section1 has-background" style="background-color:#84a7c7;padding-top:0px;padding-bottom:0px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column {"width":"35%","style":{"spacing":{"padding":{"top":"100px"}}},"className":"skt-fse-section1-left"} -->
<div class="wp-block-column skt-fse-section1-left" style="padding-top:100px;flex-basis:35%"><!-- wp:heading {"level":5,"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"500","textTransform":"capitalize"},"spacing":{"padding":{"bottom":"0px","top":"0px"}}},"textColor":"background","fontFamily":"poppins"} -->
<h5 class="has-background-color has-text-color has-poppins-font-family" style="padding-top:0px;padding-bottom:0px;font-size:18px;font-style:normal;font-weight:500;text-transform:capitalize">Full Site Editing</h5>
<!-- /wp:heading -->

<!-- wp:heading {"level":1,"style":{"typography":{"fontSize":"48px","fontStyle":"normal","fontWeight":"700"},"spacing":{"padding":{"top":"10px","bottom":"20px"}}},"textColor":"background","fontFamily":"poppins"} -->
<h1 class="has-background-color has-text-color has-poppins-font-family" style="padding-top:10px;padding-bottom:20px;font-size:48px;font-style:normal;font-weight:700">The Freedom To Create &amp; Explore</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"right":"0px","bottom":"55px"}}},"textColor":"background","fontFamily":"poppins"} -->
<p class="has-background-color has-text-color has-poppins-font-family" style="padding-right:0px;padding-bottom:55px;font-size:18px;font-style:normal;font-weight:400">Sedltricie ornare lacus, vitae auctorting<br>egestasat orci volutpat</p>
<!-- /wp:paragraph -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"background","style":{"color":{"text":"#04070a"},"typography":{"fontSize":"18px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"18px","bottom":"18px","left":"45px","right":"45px"}},"border":{"radius":"100px"}},"fontFamily":"poppins"} -->
<div class="wp-block-button has-custom-font-size has-poppins-font-family" style="font-size:18px;font-style:normal;font-weight:600"><a href="#" class="wp-block-button__link has-background-background-color has-text-color has-background wp-element-button" style="border-radius:100px;color:#04070a;padding-top:18px;padding-right:45px;padding-bottom:18px;padding-left:45px">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column -->

<!-- wp:column {"className":"skt-fse-section1-right"} -->
<div class="wp-block-column skt-fse-section1-right"><!-- wp:image {"align":"right","id":13,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image alignright size-full"><img src="'.esc_url(get_template_directory_uri()).'/assets/images/banner-img.png" alt="" class="wp-image-13"/></figure>
<!-- /wp:image --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></section>
<!-- /wp:group -->',
);