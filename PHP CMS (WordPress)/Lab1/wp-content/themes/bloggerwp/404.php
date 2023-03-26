<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package bloggerwp
 */

get_header();
?>
	<main id="primary" class="site-main bloggerwp-page">
		<div class="container">
			<section class="error-404 not-found">
				<header class="page-header">
					<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'bloggerwp' ); ?></h1>
				</header><!-- .page-header -->

				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try with Menu links?', 'bloggerwp' ); ?></p>
				</div><!-- .page-content -->
			</section><!-- .error-404 -->
		</div>
	</main><!-- #main -->

<?php
get_footer();