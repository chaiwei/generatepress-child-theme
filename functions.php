<?php


require_once trailingslashit( dirname( __FILE__ ) ) . 'inc/customizer.php';

/**
 * Remove Generatepress "Premium modules" message
 * 
 */
define('GP_PREMIUM_VERSION', true);

require get_stylesheet_directory() . '/inc/widgets/widgets_api.php';


/**
 * Remove Generatepress "Copyright" footer
 * 
 */
function generate_construct_footer(){}

/**
 * Add css & javascript
 *
 * 
 */

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

function my_theme_enqueue_styles() {

    $parent_style = 'generate-style'; 

    // add bootstrap4 css
    wp_enqueue_style( 'bootstrap4-style',
        get_stylesheet_directory_uri() . '/inc/css/bootstrap4/bootstrap.min.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    // add child css
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );  
    // add child custom css
    wp_enqueue_style( 'custom-style',
        get_stylesheet_directory_uri() . '/inc/css/custom.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );

    /*
    $generate_settings = wp_parse_args(
        get_option( 'generate_settings', array() ),
        generate_get_defaults()
    );
    $custom_css = '';
    $custom_css.= '.site-header { background-color: '.$generate_settings['header_background_color'].'; }';
    $custom_css.= '.site-header { background-color: '.$generate_settings['header_background_color'].'; }';
    
    $custom_css = str_replace(array("\r", "\n", "\t"), '', $custom_css);
    wp_add_inline_style( 'generate-style', $custom_css );
    */
  
    // add js
	  // wp_enqueue_script( 'my-js', 'filename.js', false ); 
}


function my_theme_widgets_init() {

  register_sidebar( array(
    'name'          => 'Content Top 1',
    'id'            => 'content-top-1',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Content Top 2',
    'id'            => 'content-top-2',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Content Top 3',
    'id'            => 'content-top-3',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Content Top 4',
    'id'            => 'content-top-4',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
 

  register_sidebar( array(
    'name'          => 'Content Bottom 1',
    'id'            => 'content-bottom-1',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Content Bottom 2',
    'id'            => 'content-bottom-2',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Content Bottom 3',
    'id'            => 'content-bottom-3',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_sidebar( array(
    'name'          => 'Content Bottom 4',
    'id'            => 'content-bottom-4',
    'before_widget' => '<div>',
    'after_widget'  => '</div>',
    'before_title'  => '<h2 class="rounded">',
    'after_title'   => '</h2>',
  ));
  register_widget( 'My_Widget' );

}

add_action( 'widgets_init', 'my_theme_widgets_init' );


