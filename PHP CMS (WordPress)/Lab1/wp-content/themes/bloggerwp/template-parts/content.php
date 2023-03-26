<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bloggerwp
 */
if ( ! is_singular() ) :
?>

 <div class="col-lg-6 col-md-6 mb-5 col-sm-12">
	<div id="post-<?php the_ID(); ?>" class="p-4 bloggerwp_listing wobble-vertical-on-hover">
			<header class="entry-header mb-3">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title bloggerwp_post_title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title bloggerwp_post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						bloggerwp_posted_on();
						bloggerwp_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php bloggerwp_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				if ( is_single() ) :
					the_content();
					
					wp_link_pages(
						array(
							'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'bloggerwp' ) . '">',
							'after'    => '</nav>',
							/* translators: %: Page number. */
							'pagelink' => esc_html__( 'Page %', 'bloggerwp' ),
						)
					);

				else : ?>
					<div class="bloggerwp_short_info"><?php the_excerpt(); ?></div>
			
					<div class="readmore-meta mb-2">
						<a href="<?php the_permalink(); ?>"><?php echo __( 'Read More', 'bloggerwp' ) ?> ></a>
					</div>
				<?php
				endif;
				?>
			</div><!-- .entry-content -->
   </div>
</div>	
<?php else: ?>
	<div id="post-<?php the_ID(); ?>" class="bloggerwp_post_list">
			<header class="entry-header mb-3">
				<?php
				if ( is_singular() ) :
					the_title( '<h1 class="entry-title bloggerwp_post_title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title bloggerwp_post_title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif;

				if ( 'post' === get_post_type() ) :
					?>
					<div class="entry-meta">
						<?php
						bloggerwp_posted_on();
						bloggerwp_posted_by();
						?>
					</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->

			<?php bloggerwp_post_thumbnail(); ?>

			<div class="entry-content">
				<?php
				if ( is_single() ) :
					the_content();
					
					wp_link_pages(
						array(
							'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'bloggerwp' ) . '">',
							'after'    => '</nav>',
							/* translators: %: Page number. */
							'pagelink' => esc_html__( 'Page %', 'bloggerwp' ),
						)
					);

				else :
					the_excerpt();
				?>
					<div class="readmore-meta mb-2">
						<a href="<?php the_permalink(); ?>"><?php echo __( 'Read More', 'bloggerwp' ) ?> ></a>
					</div>
				<?php
				endif;
				?>
			</div><!-- .entry-content -->
   </div>
<?php endif; ?>