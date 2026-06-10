<?php
/**
 * Hooks de WooCommerce
 */

defined( 'ABSPATH' ) || exit;

// Removemos los elementos por defecto para inyectar nuestros parciales personalizados
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

add_action( 'woocommerce_single_product_summary', 'prueba_theme_custom_summary', 10 );
if ( ! function_exists( 'prueba_theme_custom_summary' ) ) {
    function prueba_theme_custom_summary() {
        get_template_part( 'template-parts/woocommerce/product', 'summary' );
    }
}

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_images', 20 );
add_action( 'woocommerce_before_single_product_summary', 'prueba_theme_custom_gallery', 20 );

if ( ! function_exists( 'prueba_theme_custom_gallery' ) ) {
    function prueba_theme_custom_gallery() {
        get_template_part( 'template-parts/woocommerce/product', 'gallery' );
    }
}

// Remove default tabs
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

// Add custom product details (Description, Specs, Reviews) under gallery
add_action( 'woocommerce_before_single_product_summary', 'prueba_theme_custom_product_details', 30 );

if ( ! function_exists( 'prueba_theme_custom_product_details' ) ) {
    function prueba_theme_custom_product_details() {
        get_template_part( 'template-parts/woocommerce/product', 'details' );
    }
}

/**
 * Custom Review Callback for styling single product reviews
 */
if ( ! function_exists( 'prueba_theme_custom_review_callback' ) ) {
    function prueba_theme_custom_review_callback( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;
        $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
        ?>
        <div id="comment-<?php comment_ID(); ?>" <?php comment_class( 'space-y-4 pt-8 border-t border-[#1a1a1a] first:border-t-0 first:pt-0' ); ?>>
            <div class="flex justify-between items-start">
                <div>
                    <h4 class="font-headline font-bold text-[#f5f5f5]"><?php comment_author(); ?></h4>
                    <p class="font-label text-[10px] text-[#8a8a8a] tracking-widest uppercase">
                        <?php if ( wc_review_is_from_verified_owner( $comment->comment_ID ) ) : ?>
                            <?php esc_html_e( 'Verified Owner', 'woocommerce' ); ?> • 
                        <?php endif; ?>
                        <?php echo get_comment_date( wc_date_format() ); ?>
                    </p>
                </div>
                
                <?php if ( $rating && get_option( 'woocommerce_enable_review_rating' ) === 'yes' ) : ?>
                <div class="flex text-brand-gold scale-75 transform origin-top-right">
                    <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' <?php echo ( $i <= $rating ) ? '1' : '0'; ?>;">star</span>
                    <?php endfor; ?>
                </div>
                <?php endif; ?>
            </div>
            
            <?php if ( '0' === $comment->comment_approved ) : ?>
                <p class="meta text-error italic text-sm">
                    <em><?php esc_html_e( 'Your review is awaiting approval', 'woocommerce' ); ?></em>
                </p>
            <?php endif; ?>

            <div class="font-body text-[#8a8a8a] italic description">
                <?php comment_text(); ?>
            </div>
        </div>
        <?php
    }
}
