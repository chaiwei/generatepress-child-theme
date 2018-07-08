<?php

/**
 * Builds our Customizer controls.
 *
 * @package GeneratePress
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

add_action( 'customize_preview_init', 'my_theme_customizer_live_preview', 101 );

/**
 * Add live preview scripts
 *
 * @since 0.1
 */
function my_theme_customizer_live_preview() {
  wp_enqueue_script( 'generate-my_theme_customizer', trailingslashit( get_stylesheet_directory_uri() ) . 'inc/customizer/js/customizer-live-preview.js', array( 'customize-preview' ), GENERATE_VERSION, true );
}

 
/**
 * Add our base options to the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function my_theme_customizer_get_defaults(){
    return array(
        'header_background_color'=>'#FFF',
        'woocommerce_price_amount_color'=>'#000',
      );
}

function my_theme_customize_register( $wp_customize ) {
  
    $defaults = my_theme_customizer_get_defaults();

    $wp_customize->add_setting(
      'generate_settings[header_background_color]', array(
        'default' => $defaults['header_background_color'],
        'type' => 'option',
        'sanitize_callback' => 'generate_sanitize_hex_color',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'generate_settings[header_background_color]',
        array(
          'label' => __( 'Header Background Color', 'generatepress-child' ),
          'section' => 'body_section',
          'settings' => 'generate_settings[header_background_color]'
        )
      )
    );
    
    // woocommerce price color
    $wp_customize->add_setting(
      'generate_settings[woocommerce_price_amount_color]', array(
        'default' => $defaults['woocommerce_price_amount_color'],
        'type' => 'option',
        'sanitize_callback' => 'generate_sanitize_hex_color',
        'transport' => 'postMessage',
      )
    );
    $wp_customize->add_control(
      new WP_Customize_Color_Control(
        $wp_customize,
        'generate_settings[woocommerce_price_amount_color]',
        array(
          'label' => __( 'Woocommerce Price Amount Color', 'generatepress-child' ),
          'section' => 'body_section',
          'settings' => 'generate_settings[woocommerce_price_amount_color]'
        )
      )
    );
}

add_action( 'customize_register', 'my_theme_customize_register' );
function my_theme_generate_colors_css( $css ){
    $generate_settings = wp_parse_args(
        get_option( 'generate_settings', array() ),
        my_theme_customizer_get_defaults()
    );
    $css->set_selector( '.site-header' );
    $css->add_property( 'background-color', esc_attr( $generate_settings['header_background_color'] ));
    
    $css->set_selector( '.woocommerce ul.products li.product .price, 
    .woocommerce div.product p.price, 
    .woocommerce div.product span.price' );
    $css->add_property( 'color', esc_attr( $generate_settings['woocommerce_price_amount_color'] ));
    

}
add_action( 'generate_colors_css', 'my_theme_generate_colors_css' );
