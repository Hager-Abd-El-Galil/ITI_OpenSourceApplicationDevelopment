<?php
/**
 * Displays header site branding
 *
 * @package bloggerwp
 */

$blog_info    = get_bloginfo( 'name' );
$show_title   = ( true === get_theme_mod( 'display_title_and_tagline', true ) );
$header_class = $show_title ? 'site-title' : 'screen-reader-text';
?>

<?php if ( has_custom_logo() ) : ?>
	<div class="site-logo"><?php the_custom_logo(); ?></div>
<?php else: ?>
	<h2 class="<?php echo esc_attr( $header_class ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php echo esc_html( $blog_info ); ?></a></h2>
<?php endif; ?>
