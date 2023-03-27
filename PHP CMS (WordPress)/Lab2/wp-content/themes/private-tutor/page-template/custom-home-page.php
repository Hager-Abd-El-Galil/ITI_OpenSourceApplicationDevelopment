<?php
/**
 * Template Name: Custom Home
 */

get_header(); ?>

<main id="skip-content" role="main">

	<?php do_action( 'private_tutor_above_slider' ); ?>

	<?php if( get_theme_mod('private_tutor_slider_hide_show') != ''){ ?>
		<section id="slider">
			<div id="carouselExampleIndicators" class="carousel carousel-fade" data-ride="carousel"> 
			    <?php $private_tutor_slider_pages = array();
			    for ( $count = 1; $count <= 4; $count++ ) {
			        $mod = intval( get_theme_mod( 'private_tutor_slider'. $count ));
			        if ( 'page-none-selected' != $mod ) {
			          $private_tutor_slider_pages[] = $mod;
			        }
			    }
		      	if( !empty($private_tutor_slider_pages) ) :
			        $args = array(
			          	'post_type' => 'page',
			          	'post__in' => $private_tutor_slider_pages,
			          	'orderby' => 'post__in'
			        );
		        	$query = new WP_Query( $args );
		        if ( $query->have_posts() ) :
		          	$i = 1;
		    	?>     
				    <div class="carousel-inner" role="listbox">
				      	<?php  while ( $query->have_posts() ) : $query->the_post(); ?>
				        <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
				        	<div class="slider-img">
				          		<?php if(has_post_thumbnail()) {?>
	            					<img src="<?php esc_url(the_post_thumbnail_url('full')); ?>" alt="<?php the_title_attribute(); ?> "/>
	            				<?php } else {?>
	            					<img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/slider.png" alt="<?php the_title_attribute(); ?> "/>
	            				<?php }?>
				          	</div>
				          	<div class="carousel-caption">
					            <div class="inner_carousel">
					              	<h2><?php the_title(); ?></h2>
					              	<p><?php $private_tutor_excerpt = get_the_excerpt(); echo esc_html( private_tutor_string_limit_words( $private_tutor_excerpt, esc_attr(get_theme_mod('private_tutor_slider_excerpt_length','20') ) )); ?></p>
					            </div>
			            		<a href="<?php the_permalink(); ?>" class="read-btn"><?php esc_html_e('READ MORE','private-tutor'); ?><span class="screen-reader-text"><?php esc_html_e('READ MORE','private-tutor'); ?></span></a>
				          	</div>
				        </div>
				      	<?php $i++; endwhile; 
				      	wp_reset_postdata();?>
				    </div>
				    <?php else : ?>
				    <div class="no-postfound"></div>
			      		<?php endif;
				    endif;?>
			  	<div class="clearfix"></div>
		  	</div>
		</section>
	<?php }?>

	<?php do_action('private_tutor_below_slider'); ?>

	<section id="subjects-section">
		<div class="container">
			<?php if (get_theme_mod('private_tutor_subject_section_small_heading','') || get_theme_mod('private_tutor_subject_section_heading','')){ ?>
				<div class="subjects-title">
					<?php if (get_theme_mod('private_tutor_subject_section_small_heading','')) { ?>
						<small><?php echo esc_html(get_theme_mod('private_tutor_subject_section_small_heading','')); ?></small>
					<?php }?>
					<?php if (get_theme_mod('private_tutor_subject_section_heading','')) { ?>
						<h2><?php echo esc_html(get_theme_mod('private_tutor_subject_section_heading','')); ?></h2>
					<?php } ?>
				</div>
			<?php }?>
            <div class="row">
	      		<?php $private_tutor_catData1 =  get_theme_mod('private_tutor_category_setting');
  				if($private_tutor_catData1){ 
      				$page_query = new WP_Query(array( 'category_name' => esc_html($private_tutor_catData1 ,'private-tutor')));?>
	        		<?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>	
	          			<div class="col-lg-4 col-md-6">
	          				<div class="subjects-box">
	      						<div class="subjects-img">
						      		<?php the_post_thumbnail(); ?>
						  		</div>
						  		<div class="subject-box-border">
	          						<div class="subjects-content">
					            		<h3><?php the_title(); ?></h3>
					            		<p><?php $private_tutor_excerpt = get_the_excerpt(); echo esc_html( private_tutor_string_limit_words( $private_tutor_excerpt,12 ) ); ?></p>
					            		<div class="read-btn">
					            			<a href="<?php the_permalink(); ?>"><i class="fas fa-chevron-right"></i></a>
					            		</div>
		            				</div>
	            				</div>	
	          				</div>
					    </div>
	          		<?php endwhile; 
	          	wp_reset_postdata();
	      		}?>
      		</div>
			<div class="clearfix"></div>
		</div>
	</section>

	<?php do_action('private_tutor_below_service_section'); ?>

	<div class="container">
	  	<?php while ( have_posts() ) : the_post(); ?>
	  		<div class="lz-content">
	        	<?php the_content(); ?>
	        </div>
	    <?php endwhile; // end of the loop. ?>
	</div>
</main>

<?php get_footer(); ?>