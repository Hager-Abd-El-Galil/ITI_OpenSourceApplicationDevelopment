<?php 
/*
* TGM plugin activation register hook 
*/
add_action( 'tgmpa_register', 'online_courses_register_required_plugins' );
function online_courses_register_required_plugins() {
    if(class_exists('TGM_Plugin_Activation')){
      $plugins = array(
        array(
           'name'      => esc_html__('Page Builder by SiteOrigin','online-courses'),
           'slug'      => 'siteorigin-panels',
           'required'  => false,
        ),
        array(
           'name'      => esc_html__('SiteOrigin Widgets Bundle','online-courses'),
           'slug'      => 'so-widgets-bundle',
           'required'  => false,
        ),
        array(
           'name'      => esc_html__('Contact Form 7','online-courses'),
           'slug'      => 'contact-form-7',
           'required'  => false,
        ),
      );
      $config = array(
        'id'           => 'online-courses',
        'default_path' => '',
        'menu'         => 'online-courses-install-plugins',
        'has_notices'  => true,
        'dismissable'  => true,
        'dismiss_msg'  => '',
        'is_automatic' => false,
        'message'      => '',
        'strings'      => array(
           'page_title'                      => esc_html__( 'Install Recommended Plugins', 'online-courses' ),
           'menu_title'                      => esc_html__( 'Install Plugins', 'online-courses' ),
           'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'online-courses' ),          
           'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins','online-courses' ),
           'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins','online-courses' ),
           'return'                          => esc_html__( 'Return to Required Plugins Installer', 'online-courses' ),
           'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'online-courses' ),
           
           'nag_type'                        => 'updated'
        )
      );
      tgmpa( $plugins, $config );
    }
}

function online_courses_default_menu() {
    $html = '<ul class="first_menu" >';
        $html .= '<li class="menu-item menu-item-type-post_type menu-item-object-page">';
        $html .= '<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">';        
            $html .= '<a href="' . esc_url( home_url() ) . '" title="' . esc_attr__( 'Home', 'online-courses' ) . '">';
                $html .= esc_html__( 'Home', 'online-courses' );
            $html .= '</a>';
        $html .= '</li>';
    $html .= '</ul>';
    echo wp_kses_post($html);
}