<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bloggerwp
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php
				bloggerwp_posted_on();
				bloggerwp_posted_by();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-summary">
		<?php the_excerpt(); ?>
		<div class="readmore-meta mb-2">
			<a href="<?php the_permalink(); ?>"><?php echo __( 'Read More', 'bloggerwp' ) ?> ></a>
		</div>
	</div><!-- .entry-summary -->
</article><!-- #post-<?php the_ID(); ?> -->