<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bloggerwp
 */
global $bloggerwp_theme_options;
$bloggerwp_copyright= wp_kses_post($bloggerwp_theme_options['bloggerwp-footer-copyright']);
$bloggerwp_back_to_top= wp_kses_post($bloggerwp_theme_options['bloggerwp-back-to-top-option']);
?>

	<footer>
		<div class="container">
			<div class="row col-12 bg-black d-xl-flex justify-content-between align-items-center bloggerwp-footer">

				<?php if ( is_active_sidebar( 'footer-1'  ) ) : ?>
					<div class="footer-1 col-sm-12 col-md-6 col-lg-4 py-5">
						<?php dynamic_sidebar( 'footer-1' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-2'  ) ) : ?>
					<div class="footer-2 col-sm-12 col-md-6 col-lg-4">
						<?php dynamic_sidebar( 'footer-2' ); ?>
					</div>
				<?php endif; ?>

				<?php if ( is_active_sidebar( 'footer-3'  ) ) : ?>
					<div class="footer-3 col-sm-12 col-md-6 col-lg-4">
						<?php dynamic_sidebar( 'footer-3' ); ?>
					</div>
				<?php endif; ?>

			</div>
		</div>
	</footer>
	<?php if($bloggerwp_copyright !='') { ?>
	<div class="bloggerwp_footer_copyright p-3 text-center">
	   <span class="copyright_text text-white"><?php echo $bloggerwp_copyright; ?></span>
	</div>
	<?php } 
	if($bloggerwp_back_to_top==1){ ?>
		 <div class="go-top">
	        <p class="go-top-text">
	            <svg xmlns="http://www.w3.org/2000/svg" class="back-to-top-icon" fill="none" viewBox="0 0 24 24" stroke="#fff">
	            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 11l5-5m0 0l5 5m-5-5v12" />
	            </svg>
	        </p>
	    </div>
	<?php } else { ?>

	<?php } ?>	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>