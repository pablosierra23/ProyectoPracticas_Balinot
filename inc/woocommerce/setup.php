<?php
/**
 * Setup de WooCommerce
 */

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'prueba_theme_woocommerce_setup' ) ) {
    function prueba_theme_woocommerce_setup() {
        add_theme_support( 'woocommerce', array(
            'thumbnail_image_width' => 150,
            'single_image_width'    => 800,
            'product_grid'          => array(
                'default_rows'    => 3,
                'min_rows'        => 2,
                'max_rows'        => 8,
                'default_columns' => 4,
                'min_columns'     => 2,
                'max_columns'     => 5,
            ),
        ) );
        add_theme_support( 'wc-product-gallery-zoom' );
        add_theme_support( 'wc-product-gallery-lightbox' );
        add_theme_support( 'wc-product-gallery-slider' );
    }
}
add_action( 'after_setup_theme', 'prueba_theme_woocommerce_setup' );
