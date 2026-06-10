<?php
/**
 * Prueba Theme functions and definitions
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Include required logic modules
require_once get_theme_file_path( 'inc/setup.php' );
require_once get_theme_file_path( 'inc/assets.php' );

// WooCommerce
require_once get_theme_file_path( 'inc/woocommerce/setup.php' );
require_once get_theme_file_path( 'inc/woocommerce/hooks.php' );

add_filter( 'the_content', function( $content ) {
    if ( is_cart() || ( function_exists('is_checkout') && is_checkout() && empty($content) ) ) {
        // Force the classic shortcode to render, ignoring any block content saved in the DB
        return '[woocommerce_cart]';
    }
    return $content;
}, 1 );
