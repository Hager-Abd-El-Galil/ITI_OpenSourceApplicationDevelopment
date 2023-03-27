<?php
/**
* Customization options
**/
if (class_exists('WP_Customize_Control'))
{
 /* Class to create a custom multiselect dropdown control */
class online_courses_Multiselect_Box_control extends WP_Customize_Control
{
  /* Render the content on the theme customizer page */
  public $type = 'multiple-select';
  public function render_content() {
    if ( empty( $this->choices ) )
      return; ?>
      <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <select <?php $this->link(); ?> multiple="multiple">
          <?php
           foreach ( $this->choices as $value => $label ) {
             $selected = ( in_array( $value, $this->value() ) ) ? selected( 1, 1, false ) : '';
              echo '<option value="' . esc_attr( $value ) . '"' . esc_attr($selected) . '>' . esc_html($label) . '</option>';
            } ?>
        </select>
      </label>
    <?php 
  }
}
}
if( class_exists( 'WP_Customize_Control' ) ):
/* Class for icon selector */
class online_courses_Fontawesome_Icon_Chooser extends WP_Customize_Control{
    public $type = 'icon';
    public function render_content(){
        ?>
            <label>
                <span class="customize-control-title">
                <?php echo esc_html( $this->label ); ?>
                </span>

                <?php if($this->description){ ?>
                <span class="description customize-control-description">
                    <?php echo wp_kses_post($this->description); ?>
                </span>
                <?php } ?>

                <div class="online-courses-selected-icon">
                    <i class="fa <?php echo esc_attr($this->value()); ?>"></i>
                    <span><i class="fa fa-angle-down"></i></span>
                </div>

                <ul class="online-courses-icon-list clearfix">
                    <?php
                    $online_courses_font_awesome_icon_array = online_courses_font_awesome_icon_array();
                    foreach ($online_courses_font_awesome_icon_array as $online_courses_font_awesome_icon) {
                            $icon_class = $this->value() == $online_courses_font_awesome_icon ? 'icon-active' : '';
                            echo '<li class='.esc_attr( $icon_class ).'><i class="'.esc_attr( $online_courses_font_awesome_icon ).'"></i></li>';
                        }
                    ?>
                </ul>
                <input type="hidden" value="<?php echo esc_attr($this->value()); ?>" <?php echo esc_url($this->link()); ?> />
            </label>
        <?php
    }
}
endif;
//URL
function online_courses_sanitize_url( $url ) {
  return esc_url_raw( $url );
}
//checkbox sanitize function
function online_courses_sanitize_checkbox( $checked ) {
  return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
//select sanitization function
function online_courses_sanitize_select( $input, $setting ){         
//input must be a slug: lowercase alphanumeric characters, dashes and underscores are allowed only
$input = sanitize_key($input); 
//get the list of possible select options 
$choices = $setting->manager->get_control( $setting->id )->choices;                            
return ( array_key_exists( $input, $choices ) ? $input : $setting->default );                
}
// Multi select sanitization function
function online_courses_sanitize_multi_select( $input ) {
$valid = online_courses_post_multiple_category();
  foreach ( $input as $value ) {
    if ( ! array_key_exists( $value, $valid ) ) {
      return array();
    }
  }
  return $input;
}
function online_courses_post_category(){
  $cats = array();
  $cats['']=esc_html__( 'Select Category', 'online-courses' );
  foreach ( get_categories() as $categories => $category ){
      $cats[$category->term_id] = $category->name;
  }
  return $cats;
}
function online_courses_post_multiple_category(){
  $cats = array();
  foreach ( get_categories() as $categories => $category ){
      $cats[$category->term_id] = $category->name;
  }
  return $cats;
}
function online_courses_opacity(){
  $opacity = array();
  $opacity['']=esc_html__( 'Select Opacity', 'online-courses' );
  for($i=1;$i<=9;$i++){
    $opacity[$i] = '0.'.$i;
  }
  return $opacity;
}
function online_courses_customize_register( $wp_customize ) {
  $wp_customize->add_setting(
    'online_courses_theme_color',
    array(
      'default'           => '#30bced',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control(
    new WP_Customize_Color_Control( $wp_customize,
      'online_courses_theme_color',
      array(
        'label'   => esc_html__( 'Theme Color', 'online-courses' ),
        'section' => 'colors',
      )
  ) ); 
  $wp_customize->add_panel(
  'general',
    array(
      'title'       => esc_html__( 'General Settings', 'online-courses' ),
      'description' => esc_html__('General Settings','online-courses'),
      'priority'    => 20, 
  ));
  $wp_customize->get_section('title_tagline')->panel = 'general';
  $wp_customize->get_section('header_image')->panel = 'general';
  $wp_customize->get_section('static_front_page')->panel = 'general';   
  $wp_customize->get_section('title_tagline')->title = esc_html__( 'Header & Logo', 'online-courses'); 
  $wp_customize->get_section('colors')->panel = 'styling';
  /* --------------------------- Start General Setting Panel -------------------- */
  // Log Size
  $wp_customize->add_setting('logo_height',array(
    'default'             => '200',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control('logo_height',array(
    'section'             => 'title_tagline',
    'label'               => esc_html__('Enter Logo Size', 'online-courses'),
    'description'         => esc_html__("Use if you want to increase or decrease logo size (optional) Don't add 'px' in the string. e.g. 20 (default: 10px)",'online-courses'),
    'type'                => 'text',
    'priority'            => 50,
  ) );
  $wp_customize->add_setting('fixed_header',array(
    'default'             => false,
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ));
  $wp_customize->add_control('fixed_header',array(
    'section'             => 'title_tagline',
    'label'               => esc_html__('Fixed Header', 'online-courses'),
    'type'                => 'checkbox',
    'priority'            => 55,
  ));
  $wp_customize->add_section( 'preloaderSection' , array(
  'title'                 => esc_html__( 'Preloader', 'online-courses' ),
  'priority'              => 32,
  'capability'            => 'edit_theme_options',
  'panel'                 => 'general',
) );
$wp_customize->add_setting('preloader',array(
  'default'               => '1',
  'capability'            => 'edit_theme_options',
  'sanitize_callback'     => 'online_courses_sanitize_select',
  'priority'              => 20, 
) );
$wp_customize->add_control('preloader',array(
  'section'               => 'preloaderSection',                
  'label'                 => esc_html__('Preloader','online-courses'),
  'type'                  => 'radio',
  'choices'               => array(
      "1"                 => esc_html__( "On ", 'online-courses' ),
      "2"                 => esc_html__( "Off", 'online-courses' ),
  ),
) );
$wp_customize->add_setting( 'customPreloader', array(
  'sanitize_callback'     => 'esc_attr',
  'capability'            => 'edit_theme_options',
  'priority'              => 40,
));

$wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'customPreloader', array(
  'label'                 => esc_html__( 'Upload Custom Preloader', 'online-courses' ),
  'section'               => 'preloaderSection',
  'settings'              => 'customPreloader',
  'description'           => esc_html__('Upload Image Size : 38 x 38', 'online-courses'),
      'height'            => 38,
      'width'             => 38,
      'flex_width'        => false,
      'flex_height'       => false,
) ) );
  // Start Blog Listing Section 
  $wp_customize->add_section( 'blog_page_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Blog(Archive) Page', 'online-courses'),
    'panel'               => 'general'
  ) );
  // Meta Tag Checkbox
  $wp_customize->add_setting( 'hide_post_meta_tag', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_meta_tag', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post meta tag', 'online-courses' ),
  ) );
  // Blog Image Checkbox
  $wp_customize->add_setting( 'hide_post_image', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_image', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post image', 'online-courses' ),
  ) );
  // Read More Link
  $wp_customize->add_setting( 'hide_post_readmore_button', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_post_readmore_button', array(
    'type'                => 'checkbox',
    'section'             => 'blog_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide read more link', 'online-courses' ),
  ) );
  // Post Content Limit
  $wp_customize->add_setting( 'post_content_limit', array(
    'default'             => '16',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'post_content_limit', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Post Content Limit', 'online-courses' ),
  ) );
  // Post Button text
  $wp_customize->add_setting( 'post_button_text', array(
    'default'             => esc_html__( 'Read More', 'online-courses' ),
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'post_button_text', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Post Button Text', 'online-courses' ),
  ) );
  // Blog sidebar setting 
  $wp_customize->add_setting( 'post_sidebar_layout', array(
    'default'             => 'right',
    'sanitize_callback'   => 'online_courses_sanitize_select',
  ) );
  $wp_customize->add_control( 'post_sidebar_layout', array(
    'type'                => 'select',
    'section'             => 'blog_page_section',
    'label'               => esc_html__( 'Display Sidebar', 'online-courses' ),
    'choices'             => array(
      'right'             => esc_html__( 'Right', 'online-courses' ),
      'left'              => esc_html__( 'Left', 'online-courses' ),
      'full'              => esc_html__( 'No Siderbar', 'online-courses' ),
      )
  ) );
  // End Blog Listing Section
  // Start Single Post Page Section
  $wp_customize->add_section( 'single_post_page_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Single Post Page', 'online-courses'),
    'panel'               => 'general'
  ) );
  // Single Post Meta Tag Checkbox 
  $wp_customize->add_setting( 'hide_single_post_meta_tag', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_meta_tag', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post meta tag', 'online-courses' ),      
  ) );
  // Comment Form 
  $wp_customize->add_setting( 'hide_single_post_comment_form', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_comment_form', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide comment form', 'online-courses' ),
  ) );
  // Single Post Image Checkbox 
  $wp_customize->add_setting( 'hide_single_post_image', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_single_post_image', array(
    'type'                => 'checkbox',
    'section'             => 'single_post_page_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post image', 'online-courses' ),
  ) );
  // Single Post Page Sidebar
  $wp_customize->add_setting( 'single_post_sidebar_layout', array(
    'default'             => 'right',
    'sanitize_callback'   => 'online_courses_sanitize_select',
  ) );
  $wp_customize->add_control( 'single_post_sidebar_layout', array(
    'type'                => 'select',
    'section'             => 'single_post_page_section',
    'label'               => esc_html__( 'Display Sidebar', 'online-courses' ),
    'choices'             => array(
      'right'             => esc_html__( 'Right', 'online-courses' ),
      'left'              => esc_html__( 'Left', 'online-courses' ),
      'full'              => esc_html__( 'No Siderbar', 'online-courses' ),
    )
  ) );
  // End Blog Page Section
  /* --------------------------- End General Setting Panel ----------------- */
  /* --------------------------- Start Front Page Panel -------------------- */
  $wp_customize->add_panel(
    'homepage_setting',
    array(
    'title'               => esc_html__( 'Front Page Settings', 'online-courses' ),
    'description'         => esc_html__('Front Page Settings','online-courses'),
    'priority'            => 20, 
    )  
  );
  // Start Home Slider Section 
  $wp_customize->add_section( 'slider_setting', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Slider Section', 'online-courses'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_slider_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_slider_section', array(
    'type'                => 'checkbox',
    'section'             => 'slider_setting', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  // Slide Section Title
  $wp_customize->add_setting( 'slider_section_title', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'slider_section_title', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'slider_setting',
    'label'               => esc_html__( 'Title', 'online-courses' ),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Title', 'online-courses' ),
    )
  ) );
  // Slider Section Sub Title
  $wp_customize->add_setting( 'slider_section_sub_title', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'slider_section_sub_title', array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'slider_setting',
      'label'             => esc_html__( 'Sub Title', 'online-courses' ),
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Sub Title', 'online-courses' ),
      )
  ) );
  // Slider Section Serach Form Text
  $wp_customize->add_setting( 'slider_serach_form_text', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'slider_serach_form_text', array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'slider_setting',
      'label'             => esc_html__( 'Serach Form Text', 'online-courses' ),
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Search Form Placeholder Text', 'online-courses' ),
      )
  ) );
  // Slider Image
  for($i=1;$i<=2;$i++)
  {
    $wp_customize->add_setting( 'slider_image_'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'slider_image_'.$i,
      array(
      'label'             => esc_html( 'Slide '.$i ),
      'section'           => 'slider_setting',
      'settings'          => 'slider_image_'.$i,
      'description'       => esc_html__('Upload Image Size : 1350 x 550', 'online-courses'),
      'height'            => 550,
      'width'             => 1350,
      'flex_width'        => false,
      'flex_height'       => false,
      )
    ) ); 
  }
  // End Home Slider Section 
  // Start Key Feature Section
  $wp_customize->add_section( 'key_feature_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Key Feature Section', 'online-courses'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_key_feature_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_key_feature_section', array(
    'type'                => 'checkbox',
    'section'             => 'key_feature_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  for($i=1;$i<=3;$i++)  
  { 
   // Title
   $wp_customize->add_setting( 'key_feature_title'.$i, array(
      'default'             => 'Online courses',
      'type'                => 'theme_mod',
      'capability'          => 'edit_theme_options',
      'sanitize_callback'   => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'key_feature_title'.$i, array(
      'type'                => 'text',
      'section'             => 'key_feature_section',
      'label'               => esc_html__('Key Feature Title & description ','online-courses'). $i,
      'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Title', 'online-courses' ),
      )
    ) );
    // Description
    $wp_customize->add_setting( 'key_feature_description'.$i, array(
      'type'                => 'theme_mod',
      'capability'          => 'edit_theme_options',
      'sanitize_callback'   => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'key_feature_description'.$i, array(
      'type'                => 'text',
      'section'             => 'key_feature_section',
      'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter description', 'online-courses' ),
      )      
    ) );
    // Icon
    $wp_customize->add_setting(
      'key_feature_icon'.$i,
      array(
          'default'           => 'fa fa-clock-o',
          'sanitize_callback' => 'sanitize_text_field',
          'transport'         => 'postMessage'
      )
    );
    $wp_customize->add_control(
      new online_courses_Fontawesome_Icon_Chooser(
      $wp_customize,
      'key_feature_icon'.$i,
        array(
            'settings'        => 'key_feature_icon'.$i,
            'section'         => 'key_feature_section',
            'label'           => esc_html__( 'Key Feature Icon ', 'online-courses' ). $i,
        )
      )
    );
  }
  // End Key Feature Section
  // Start Our Courses Section
  $wp_customize->add_section( 'our_courses', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Our Courses Section', 'online-courses'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox Field 
  $wp_customize->add_setting( 'hide_our_courses_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_our_courses_section', array(
    'type'                => 'checkbox',
    'section'             => 'our_courses', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  // Section Title
  $wp_customize->add_setting( 'our_courses_section_title', array(
    'default'             => 'Our Courses',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'our_courses_section_title', array(
    'type'                => 'text',
    'section'             => 'our_courses',
    'label'               => esc_html__('Title','online-courses'),
  ) );
  // Section Sub Title
  $wp_customize->add_setting( 'our_courses_section_sub_title', array(
    'default'             => 'The world`s largest selection of courses',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'our_courses_section_sub_title', array(
    'type'                => 'text',
    'section'             => 'our_courses',
    'label'               => esc_html__('Sub Title','online-courses'),
  ) );
  // Section Description
  $wp_customize->add_setting( 'our_courses_section_description', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'our_courses_section_description', array(
    'type'                => 'textarea',
    'section'             => 'our_courses',
    'label'               => esc_html__('Description','online-courses'),
  ) );
  // Post Category select box
  $wp_customize->add_setting('our_courses_section_category', array(
    'default'             => array(1),
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_multi_select',
  ));
  $wp_customize->add_control(
    new online_courses_Multiselect_Box_control(
      $wp_customize, 'our_courses_section_category', array(
        'label'           => esc_html__( 'Select Category', 'online-courses' ),
        'section'         => 'our_courses',
        'settings'        => 'our_courses_section_category',
        'type'            => 'multiple-select',
        'choices'         => online_courses_post_multiple_category()
    ))
  );
  // Single Post Button Text
  $wp_customize->add_setting( 'our_courses_single_post_button', array(
    'default'             => 'Read More',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'our_courses_single_post_button', array(
    'type'                => 'text',
    'section'             => 'our_courses',
    'label'               => esc_html__('Single Post Button Text','online-courses'),
  ) );
  // Single Post Button Checkbox Field 
  $wp_customize->add_setting( 'hide_our_courses_single_post_button', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_our_courses_single_post_button', array(
    'type'                => 'checkbox',
    'section'             => 'our_courses', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide single post button', 'online-courses' ),
  ) );
  // View More Button Text
  $wp_customize->add_setting( 'our_courses_post_category_button', array(
    'default'             => 'View More',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'our_courses_post_category_button', array(
    'type'                => 'text',
    'section'             => 'our_courses',
    'label'               => esc_html__('Post Category Button Text','online-courses'),
  ) );
  // Post Category Button Checkbox Field 
  $wp_customize->add_setting( 'hide_our_courses_post_category_button', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_our_courses_post_category_button', array(
    'type'                => 'checkbox',
    'section'             => 'our_courses', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide post category button', 'online-courses' ),
  ) );
  // End Our Courses Section
  // Start Upcoming Course Section
  $wp_customize->add_section( 'upcoming_course', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Upcoming Course Section', 'online-courses'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox Field 
  $wp_customize->add_setting( 'hide_upcoming_course_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_upcoming_course_section', array(
    'type'                => 'checkbox',
    'section'             => 'upcoming_course', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  // Section Title
  $wp_customize->add_setting( 'upcoming_course_section_title', array(
    'default'             => 'Upcoming Course',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'upcoming_course_section_title', array(
    'type'                => 'text',
    'section'             => 'upcoming_course',
    'label'               => esc_html__('Title','online-courses'),
  ) );
  // Post Category select box
  $wp_customize->add_setting( 'upcoming_course_section_category', array(
    'sanitize_callback'   => 'online_courses_sanitize_select',
  ) );
  $wp_customize->add_control( 'upcoming_course_section_category', array(
    'type'                => 'select',
    'choices'             => online_courses_post_category(),
    'section'             => 'upcoming_course',
    'label'               => esc_html__( 'Category', 'online-courses' ),
  ) );
  // Button Title
  $wp_customize->add_setting( 'upcoming_course_button_title', array(
    'default'             => 'Know More',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'upcoming_course_button_title', array(
    'type'                => 'text',
    'section'             => 'upcoming_course',
    'label'               => esc_html__('Button Title','online-courses'),
  ) );
  // End Upcoming Course Section
  // Start Our Experts Video Section
  $wp_customize->add_section( 'experts_video', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Watch Our Experts Video Section', 'online-courses'),
    'panel'               => 'homepage_setting'
  ) );
  // Checkbox Field 
  $wp_customize->add_setting( 'hide_experts_video_section', array(
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_experts_video_section', array(
    'type'                => 'checkbox',
    'section'             => 'experts_video', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  // Section Title
  $wp_customize->add_setting( 'experts_video_title', array(
    'default'             => 'Watch Our Experts Video',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'experts_video_title', array(
    'type'                => 'text',
    'section'             => 'experts_video',
    'label'               => esc_html__('Title','online-courses'),
  ) );
  // Video URL
  $wp_customize->add_setting( 'experts_video_url', array(
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_url',
  ) );
  $wp_customize->add_control( 'experts_video_url', array(
    'type'                => 'url',
    'section'             => 'experts_video',
    'label'               => esc_html__('Video URL','online-courses'),
    'input_attrs'         => array(
            'placeholder' => esc_html__( 'www.google.com', 'online-courses' ),
      )
  ) );
  // Video Icon
  $wp_customize->add_setting( 'experts_video_icon', array(
    'default'             => 'fa fa-play',
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control(
    new online_courses_Fontawesome_Icon_Chooser(
    $wp_customize,
    'experts_video_icon',
      array(
          'settings'      => 'experts_video_icon',
          'section'       => 'experts_video',
          'label'         => esc_html__( 'Video Icon ', 'online-courses' ),
    ))
  );
  // Background Image
  $wp_customize->add_setting( 'video_section_background_image', array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'esc_attr',
  ) );
  $wp_customize->add_control(
      new WP_Customize_Image_Control(
      $wp_customize,
      'video_section_background_image',
      array(
      'label'             => esc_html( 'Backgorund Image' ),
      'section'           => 'experts_video',
      'settings'          => 'video_section_background_image',
      )
    ) ); 
  // Background Image Opacity 
  $wp_customize->add_setting( 'video_section_image_opacity', array(
    'sanitize_callback'   => 'online_courses_sanitize_select',
  ) );
  $wp_customize->add_control( 'video_section_image_opacity', array(
    'type'                => 'select',
    'choices'             => online_courses_opacity(),
    'section'             => 'experts_video',
    'label'               => esc_html__( 'Opacity', 'online-courses' ),
  ) );
  // End Our Expert Video Section
  // Start Testimonials Section 
  $wp_customize->add_section( 'testimonials_section', array(
    'capability'          => 'edit_theme_options',
    'title'               => esc_html__('Testimonials Section', 'online-courses'),
    'panel'               => 'homepage_setting'
  ) );
  // Hide Testimonials Section Checkbox
  $wp_customize->add_setting( 'hide_testimonials_section', array(
    'default'             => true,
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_testimonials_section', array(
    'type'                => 'checkbox',
    'section'             => 'testimonials_section', // Add a default or your own section
    'label'               => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  // Testimonials Section Title
  $wp_customize->add_setting( 'testimonials_section_title', array(
    'default'             => 'Testimonials', 
    'type'                => 'theme_mod',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_text_field',
  ) );
  $wp_customize->add_control( 'testimonials_section_title', array(
    'type'                => 'text',
    'priority'            => 10,
    'section'             => 'testimonials_section',
    'label'               => esc_html__( 'Section Title', 'online-courses' ),
    'input_attrs'         => array(
          'placeholder'   => esc_html__( 'Enter Section Title', 'online-courses' ),
    )
  ) );
  // Slider Image
  for($i=1;$i<=2;$i++)
  {
    // Testimonials Title
    $wp_customize->add_setting( 'testimonials_title'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'testimonials_title'.$i, array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'testimonials_section',
      'label'             => esc_html__( 'Testimonial ', 'online-courses' ).$i,
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Title', 'online-courses' ),
      )
    ) );
    // Testimonials Description
    $wp_customize->add_setting( 'testimonials_description'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'testimonials_description'.$i, array(
      'type'              => 'text',
      'priority'          => 10,
      'section'           => 'testimonials_section',
      'input_attrs'       => array(
            'placeholder' => esc_html__( 'Enter Description', 'online-courses' ),
      )
    ) );
    $wp_customize->add_setting( 'testimonials_image_'.$i, array(
      'type'              => 'theme_mod',
      'capability'        => 'edit_theme_options',
      'sanitize_callback' => 'absint',
    ) );
    $wp_customize->add_control(
      new WP_Customize_Cropped_Image_Control(
      $wp_customize,
      'testimonials_image_'.$i,
      array(
      'section'           => 'testimonials_section',
      'settings'          => 'testimonials_image_'.$i,
      'description'       => esc_html__('Upload Image Size : 400 x 400', 'online-courses'),
      'height'            => 400,
      'width'             => 400,
      'flex_width'        => false,
      'flex_height'       => false,
      )
    ) ); 
  }
  // End Testimonials Section 
  /* --------------------------- End Front Page Panel -------------------- */
  /*-------------------- Start Styling Panel ----------------------------- */
  // Start Color Section
  $wp_customize->add_panel('styling', array(
    'title'               => esc_html__( 'Styling', 'online-courses' ),
    'description'         => esc_html__('styling options','online-courses'),
    'priority'            => 31, 
  ));
  $wp_customize->add_setting('online_courses_theme_color',array(
    'default'             => '#0ad2ad',
    'capability'          => 'edit_theme_options',
    'sanitize_callback'   => 'sanitize_hex_color',
  ) );
  $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize,
    'online_courses_theme_color',array(
      'label'             => esc_html__( 'Theme Color', 'online-courses' ),
      'section'           => 'colors',
    )
  ) );
  // Typography 
  // Text Panel Starts Here 
  $wp_customize->add_section( 'typography_text' , array(
    'title'                => esc_html__( 'Typography', 'online-courses' ),
    'priority'             => 135,
    'capability'           => 'edit_theme_options',
    'panel'                => 'styling'
  ) );
  // Text Font Type
  $wp_customize->add_setting('text_font_type',array(
    'default'              => esc_html__('Signika', 'online-courses'),
    'capability'           => 'edit_theme_options',
    'sanitize_callback'    => 'sanitize_text_field',
  ) );
  $text_font_choices = online_courses_get_font_choices();
  $wp_customize->add_control('text_font_type',array(
    'section'              => 'typography_text',
    'label'                => esc_html__('Select Body Font Family', 'online-courses'),
    'type'                 => 'select',
    'choices'              => $text_font_choices,
  ) );  
  $wp_customize->add_setting( 'h1_font_size', array(
    'default'              => 42,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'h1_font_size', array(
    'label'                => esc_html__('H1 Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) );
  $wp_customize->add_setting( 'h2_font_size', array(
    'default'              => 36,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'h2_font_size', array(
    'label'                => esc_html__('H2 Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) ); 
  $wp_customize->add_setting( 'h3_font_size', array(
    'default'              => 30,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'h3_font_size', array(
    'label'                => esc_html__('H3 Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) ); 
  $wp_customize->add_setting( 'h4_font_size', array(
    'default'              => 24,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'h4_font_size', array(
    'label'                => esc_html__('H4 Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) ); 
  $wp_customize->add_setting( 'h5_font_size', array(
    'default'              => 20,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'h5_font_size', array(
    'label'                => esc_html__('H5 Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) );
  $wp_customize->add_setting( 'h6_font_size', array(
    'default'              => 16,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'h6_font_size', array(
    'label'                => esc_html__('H6 Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) );
  $wp_customize->add_setting( 'normal_font_size', array(
    'default'              => 14,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'normal_font_size', array(
    'label'                => esc_html__('Normal Text Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) );
  $wp_customize->add_setting( 'menu_font_size', array(
    'default'              => 14,
    'sanitize_callback'    => 'sanitize_text_field',
    'capability'           => 'edit_theme_options',
  ) );
  $wp_customize->add_control( 'menu_font_size', array(
    'label'                => esc_html__('Menu Text Font Size','online-courses'),
    'section'              => 'typography_text',
    'type'                 => 'text',
  ) ); 
  /*-------------------- End Styling Panel ----------------------------- */
  /* ------------------- Start Footer Settings Panel ------------- */
  $wp_customize->add_panel(
  'footer',
  array(
    'title'                => esc_html__( 'Footer Settings', 'online-courses' ),
    'description'          => esc_html__('Footer options','online-courses'),
    'priority'             => 35, 
  ) );
  // Start Footer Copyright Area
  $wp_customize->add_section( 'footer_copyright', array(
    'capability'           => 'edit_theme_options',
    'title'                => esc_html__('Footer Copyright Area', 'online-courses'),
    'panel'                => 'footer'
  ) );
  $wp_customize->add_setting( 'footer_copyright_text', array(
    'type'                 => 'theme_mod',
    'capability'           => 'edit_theme_options',
    'sanitize_callback'    => 'wp_kses_post',
  ) );
  $wp_customize->add_control( 'footer_copyright_text', array(
    'type'                 => 'textarea',
    'section'              => 'footer_copyright',
    'label'                => esc_html__('Copyright Text','online-courses'),
    'description'          => esc_html__('Some text regarding copyright of your site, you would like to display in the footer.', 'online-courses'),
  ) );
  // End Footer Copyright Area
  // Start Footer Social Icons Area
  $wp_customize->add_section( 'footer_social_icon_area', array(
    'capability'           => 'edit_theme_options',
    'title'                => esc_html__('Social Icon Area', 'online-courses'),
    'panel'                => 'footer'
  ) );
  // Checkbox
  $wp_customize->add_setting( 'hide_social_icon_section', array(
    'capability'           => 'edit_theme_options',
    'sanitize_callback'    => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_social_icon_section', array(
    'type'                 => 'checkbox',
    'section'              => 'footer_social_icon_area', // Add a default or your own section
    'label'                => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  for($i=1;$i<=7;$i++)  
  { 
   $wp_customize->add_setting(
      'footer_social_icon'.$i,
      array(
          'default'           => 'fa fa-facebook',
          'sanitize_callback' => 'sanitize_text_field',
          'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control(
      new online_courses_Fontawesome_Icon_Chooser(
      $wp_customize,
      'footer_social_icon'.$i,
        array(
            'settings'        => 'footer_social_icon'.$i,
            'section'         => 'footer_social_icon_area',
            'label'           => esc_html__( 'Social Icon ', 'online-courses' ). $i,
        )
    ) );
    $wp_customize->add_setting( 'footer_social_icon_link'.$i, array(
      'type'                  => 'theme_mod',
      'capability'            => 'edit_theme_options',
      'sanitize_callback'     => 'online_courses_sanitize_url',
    ) );
    $wp_customize->add_control( 'footer_social_icon_link'.$i, array(
    'type'                    => 'url',
    'section'                 => 'footer_social_icon_area',
    'label'                   => esc_html__('Social Icon Link ','online-courses'). $i,
    'input_attrs'             => array(
            'placeholder'     => esc_html__( 'www.facebook.com', 'online-courses' ),
      )
    ) );
  }
  // End Footer Social Icons Area
  // Start footer Widget area
  $wp_customize->add_section( 'footer_widget_section' , array(
  'title'                  => esc_html__( 'Footer Widget Area', 'online-courses' ),
  'capability'             => 'edit_theme_options',
  'panel'                  => 'footer'
  ) );
  // Hide Footer Widget Checkbox
  $wp_customize->add_setting( 'hide_footer_widget_section', array(
    'capability'           => 'edit_theme_options',
    'sanitize_callback'    => 'online_courses_sanitize_checkbox',
  ) );
  $wp_customize->add_control( 'hide_footer_widget_section', array(
    'type'                 => 'checkbox',
    'section'              => 'footer_widget_section', // Add a default or your own section
    'label'                => esc_html__( 'Please check this box, if you want to hide this section.', 'online-courses' ),
  ) );
  $wp_customize->add_setting('footer_widget_style',array(
    'default'              => '3',
    'capability'           => 'edit_theme_options',
    'sanitize_callback'    => 'online_courses_sanitize_select',
  ) );
  $wp_customize->add_control('footer_widget_style',array(
    'section'              => 'footer_widget_section',                
    'label'                => esc_html__('Select Widget Area','online-courses'),
    'type'                 => 'select',
    'choices'              => array(
      "1"                  => esc_html__( "2 column", 'online-courses' ),
      "2"                  => esc_html__( "3 column", 'online-courses' ),
      "3"                  => esc_html__( "4 column", 'online-courses' )
      ),
  ) );
  // End footer Widget area
  /* --------------------------- End Footer Settings Panel ------------------ */
}
add_action( 'customize_register', 'online_courses_customize_register' );
function online_courses_custom_css(){
$logo_height = (get_theme_mod('logo_height'))?(get_theme_mod('logo_height')):55;
if(get_theme_mod('customPreloader') == ""){
  $loader_image=get_template_directory_uri().'/images/preloader/loader.svg';
}else{
  $loader_image = wp_get_attachment_url(get_theme_mod('customPreloader')); 
} 
$theme_color=get_theme_mod('online_courses_theme_color','#0ad2ad');

$custom_css= '';

$custom_css .= "
  body{
    font-family: '".esc_attr(get_theme_mod('text_font_type','Signika'))."', sans-serif;
  }
  p, .site-info label, .site-info-text, ul.footer-list li>a, h2.special-title {
    font-family: '".esc_attr(get_theme_mod('text_font_type','Signika'))."', sans-serif;
  }
  section.video_sec {
    background: linear-gradient(rgba(0, 33, 71, 0.".esc_attr(get_theme_mod('video_section_image_opacity',9))."), rgba(0, 33, 71, 0.".esc_attr(get_theme_mod('video_section_image_opacity',9)).")), url(".esc_url(get_theme_mod('video_section_background_image')).");
    background-attachment: fixed;
  }
  .logo img{
   max-height: ".esc_attr($logo_height)."px;
  }
  h1, .h1{
    font-size: ".esc_attr(get_theme_mod('h1_font_size','42'))."px;
  }
  h2, .h2{
    font-size: ".esc_attr(get_theme_mod('h2_font_size','32'))."px;
  }
  h3, .h3{
    font-size: ".esc_attr(get_theme_mod('h3_font_size','30'))."px;
  }
  h4, .h4{
    font-size: ".esc_attr(get_theme_mod('h4_font_size','18'))."px;
  }
  h5, .h5{
    font-size: ".esc_attr(get_theme_mod('h5_font_size','20'))."px;
  }
  h6, .h6{
    font-size: ".esc_attr(get_theme_mod('h6_font_size','16'))."px;
  }
  p, span, li, a,.package-header h4 span,.main-sidebar ul li a{
    font-size: ".esc_attr(get_theme_mod('normal_font_size','14'))."px; 
  }
  #cssmenu ul li a{
    font-size: ".esc_attr(get_theme_mod('menu_font_size','14'))."px;     
  }
  .brand_text .site-title h4, small{
   color: #".esc_attr(get_header_textcolor())." ;
  }
   .vdo:hover i, .no-blog-post-image:hover, .no-our-courses-image:hover, .media-blog-body h5 > a, .post-meta span.date a, .post-meta span.comments a, .first_footer a:hover, .post-info h3 > a, .sidebar .widget ul li a::before, .sidebar .widget ul li:hover a, .page-numbers li,.testi_text span,.comments-list a,.sidebar h3.widget-title, .sidebar .widget ul li:hover>a, .sidebar .widget ul li:hover,.product-name span, a.read_more, .nav-links .page-numbers a, .post-info h3.post-title-cls, h3.title_line, h3.comment-reply-title, p.form-submit input{color: ".esc_attr($theme_color).";}
  }
  #cssmenu li:hover > ul, .page-numbers li, .detail_page .post-info h3.post-title-cls::after, h3.title_line::after, h3.comment-reply-title::after,div#main_header_bg, p.form-submit input,.tagcloud a,.button:after {border-color: ".esc_attr($theme_color).";}
  #cssmenu ul ul li.has-sub:hover > a::after {border-left-color: ".esc_attr($theme_color).";} 
  section.slider_strip, .media-blog-body a.btn-bordered:hover, .page-numbers li span.page-numbers.current, .page-numbers li span.page-numbers.dots, .nav-links .page-numbers a:hover, p.form-submit input:hover,.tagcloud a:hover,#cssmenu ul ul li:hover{background: ".esc_attr($theme_color)."; background-color: ".esc_attr($theme_color).";}
  .sidebar h3.widget-title::after {border-top: 3px solid ".esc_attr($theme_color).";}
  .media-blog-body a.btn-bordered, .blog-wrapper a.read_more{ border: 1px solid ".esc_attr($theme_color)."; }
  a.view_more{ background-color:  ".esc_attr($theme_color)."; }
  a.btn-circle.video, .events-single b, .scroll_top{ background: ".esc_attr($theme_color)."; border: 1px solid ".esc_attr($theme_color).";}
  nav.pagination ul li span.current, .blog-wrapper a.read_more{  border: 1px solid ".esc_attr($theme_color)."; }
  #home-slider .owl-dots .owl-dot.active span, #home-slider .owl-dots .owl-dot:hover span{ background: ".esc_attr($theme_color)."!important  }
  .owl-prev i, .owl-next i, .site-info a, a.read-more,.second_footer ul li a:hover, .edufair-footer-address a:hover,a.btn-bordered,.media-blog-body h2>a:hover,.nav-previous a, .nav-next a,ul#breadcrumbs li a:hover { color: ".esc_attr($theme_color)."  }
  #cssmenu ul li a:hover, #cssmenu ul li.current_page_item a, #cssmenu ul li.current-menu-parent a, #cssmenu ul li.current_page_ancestor a{ border-bottom: 3px solid ".esc_attr($theme_color)."; } 
  .sidebar h3.widget-title::after{border-top: 3px solid ".esc_attr($theme_color).";}
  .sidebar .tagcloud a{ border: 1px solid ".esc_attr($theme_color)."; }
  nav.pagination ul.page-numbers li a:hover, span.input-group-btn button, span.input-group-btn, .sidebar .widget h3.widget-title, .sidebar .tagcloud a:hover,form#commentform input[type='submit'],#cssmenu .submenu-button.submenu-opened, #cssmenu ul li:hover, .button.menu-opened::before, .button.menu-opened::after, .button:before { background-color: ".esc_attr($theme_color)."; }
  ul.footer-list li > a:hover{color: ".esc_attr($theme_color).";}
  footer p.widget-title::before, footer h4::before{background: ".esc_attr($theme_color).";}
  footer .widget_nav_menu.footer-list ul li > a:before, footer .widget_tag_cloud.footer-list ul li > a:before, footer .widget_search.footer-list ul li > a:before, footer .widget_rss.footer-list ul li > a:before, footer .widget_recent_entries.footer-list ul li > a:before, footer .widget_recent_comments.footer-list ul li > span:before, footer .widget_meta.footer-list ul li > a:before, footer .widget_pages.footer-list ul li > a:before, footer .widget_categories.footer-list ul li > a:before, footer .widget_archive.footer-list ul li > a:before, footer .widget_calendar.footer-list ul li > a:before, ul.footer-list li a:before{color:".esc_attr($theme_color).";}
  .product-name span{ border-bottom: 2px solid ".esc_attr($theme_color)."; }
";

$custom_css .= "@media only screen and ( max-width: 767px) {
   .button:after {
    border-top: 2px solid ".esc_attr($theme_color).";
    border-bottom: 2px solid ".esc_attr($theme_color).";
  }
   #cssmenu .submenu-button.submenu-opened, #cssmenu ul li:hover, .button.menu-opened::before, .button.menu-opened::after, .button:before{ background: ".esc_attr($theme_color)." }
  #cssmenu ul ul li:hover{background: ".esc_attr($theme_color)." !important}";

  if(get_theme_mod('fixed_header',0) == 1){ 
    $custom_css .= ".sticky{
      position: fixed;
      z-index: 999;
      }";   
  } 
  $custom_css .= "}";

  if(get_theme_mod('preloader') == 2) : 
    $custom_css .= ".preloader-block .preloader-custom-gif, .preloader-block .preloader-gif,.preloader-block{ 
      background:none !important;
    }";
   endif; 
   if(get_theme_mod('preloader',1) == 1 ) :  
  $custom_css .= ".preloader-block .preloader-gif
    .preloader-block .preloader-custom-gif, .preloader-block .preloader-gif{  background: url('".esc_url($loader_image)."'); background-repeat: no-repeat; }";
  endif; 

wp_add_inline_style('online-courses-style',$custom_css);
 }

// Theme customizer Font Icon - admin css,js
function online_courses_customize_scripts() {
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() .'/css/font-awesome.css');   
    wp_enqueue_style( 'online-courses-admin-style',get_template_directory_uri().'/css/admin.css', '1.0', 'screen' );    
    wp_enqueue_script( 'online-courses-admin-js', get_template_directory_uri().'/js/admin.js', array( 'jquery' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'online_courses_customize_scripts' );
?>