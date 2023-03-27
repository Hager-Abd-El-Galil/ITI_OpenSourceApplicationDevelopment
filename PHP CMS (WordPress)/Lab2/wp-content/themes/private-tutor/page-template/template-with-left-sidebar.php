<?php
/*
*
Template Name: Page left sidebar
*/
get_header(); ?>

<?php do_action( 'private_tutor_above_header_left_page' ); ?>

<div class="container">
	<div class="content-area" >
		<main id="skip-content" class="site-main" role="main">
			<div class="row">
				<div id="sidebar" class="col-lg-4 col-md-4">
					<?php dynamic_sidebar('sidebar-2'); ?>
		            <div class="clearfix"></div>
				</div>
				<div class="col-lg-8 col-md-8 content_area">
					<?php while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/page/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop. ?>
				</div>
				<div class="clearfix"></div> 
			</div>
		</main>
	</div>
</div>

<?php do_action( 'private_tutor_above_footer_left_page' ); ?>

<?php get_footer();