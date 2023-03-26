<?php
/**
 * Displays the site navigation.
 *
 * @package bloggerwp
 */

$wrapper_classes  = 'site-header';
?>

<nav class="navbar primary-navigation navbar-expand-xl navbar-light col-12 py-1">

    <?php get_template_part( 'template-parts/header/site-branding' ); ?>


    <?php if ( has_nav_menu( 'primary' ) ) : ?>
      <div class="bloggerwp_nav">
		  

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="<?php echo esc_attr__( 'Toggle navigation', 'bloggerwp' ); ?>">
            <span class="navbar-toggler-icon" tabindex="-1"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <?php
            wp_nav_menu(
                array(
                    'theme_location'  => 'primary',
                    'menu_class'      => 'navbar-nav ml-auto',
                    'items_wrap'      => '<ul id="primary-menu-list" class="navbar-nav">%3$s</ul>',
                    'fallback_cb'     => false,
                )
            );
            ?>
        </div><!-- #navbarNav -->
</div>  
    <?php endif; ?>

</nav>