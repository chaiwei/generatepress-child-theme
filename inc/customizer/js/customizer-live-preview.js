/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

function my_theme_colors_live_update( id, selector, property, default_value ) {
    default_value = typeof default_value !== 'undefined' ? default_value : 'initial';
    wp.customize( 'generate_settings[' + id + ']', function( value ) {
        value.bind( function( newval ) {
            newval = ( '' !== newval ) ? newval : default_value;
            if ( jQuery( 'style#' + id ).length ) {
                jQuery( 'style#' + id ).html( selector + '{' + property + ':' + newval + ';}' );
            } else {
                jQuery( 'head' ).append( '<style id="' + id + '">' + selector + '{' + property + ':' + newval + '}</style>' );
                setTimeout(function() {
                    jQuery( 'style#' + id ).not( ':last' ).remove();
                }, 1000);
            }
        } );
    } );
}

( function( $ ) {
    my_theme_colors_live_update( 'header_background_color', '.site-header', 'background-color', '#FFFFFF' );
    my_theme_colors_live_update( 'woocommerce_price_amount_color', '.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price', 'color', '#000' );

} )( jQuery );