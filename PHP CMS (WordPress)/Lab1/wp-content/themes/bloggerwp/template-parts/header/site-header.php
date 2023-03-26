<?php
/**
 * Displays the site header.
 *
 * @package bloggerwp
 */

$wrapper_classes  = 'site-header';
?>

<header id="masthead" class="bloggerwp_header <?php echo esc_attr( $wrapper_classes ); ?>">
    <div class="menu relative zindex-1">

        <?php get_template_part( 'template-parts/header/site-nav' ); ?>
		
	</div>
</header><!-- #masthead -->