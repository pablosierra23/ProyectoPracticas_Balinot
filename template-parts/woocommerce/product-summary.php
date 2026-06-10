<?php
/**
 * Product Summary Template Part
 * Represents the sticky sidebar in Stitch layout
 */

defined( 'ABSPATH' ) || exit;
global $product;
?>

<div>
    <h1 class="font-headline text-5xl font-bold tracking-tighter text-[#f5f5f5] mb-2">
        <?php echo wp_kses_post( $product->get_name() ); ?>
    </h1>
    <p class="font-label text-xs tracking-[0.3em] text-[#8a8a8a] uppercase">INTERNAL DESIGNATION: <?php echo esc_html( $product->get_sku() ?: 'N/A' ); ?></p>
</div>

<div class="space-y-2">
    <p class="font-label text-[10px] text-[#8a8a8a] tracking-widest uppercase">Price</p>
    <div class="font-headline text-4xl font-bold text-[#d4a853]">
        <?php echo $product->get_price_html(); ?>
    </div>
</div>

<div class="bg-[#2a2a2a] p-8 space-y-6">
    <div class="woocommerce-product-details__short-description text-[#8a8a8a] text-sm">
        <?php echo apply_filters( 'woocommerce_short_description', $product ? wp_trim_words($product->get_short_description(), 15) : '' ); ?>
    </div>
    
    <!-- We inject standard woocommerce add to cart here so all forms (variations, quantity) work correctly -->
    <div class="porsche-product-add-to-cart stitch-add-to-cart-wrapper">
        <style>
            .stitch-add-to-cart-wrapper form.cart { display: flex; flex-direction: column; gap: 1rem; }
            .stitch-add-to-cart-wrapper .quantity input { background: transparent; border: 1px solid rgba(255,255,255,0.2); color: white; padding: 12px; font-family: Outfit, sans-serif; text-align: center; }
            .stitch-add-to-cart-wrapper button.single_add_to_cart_button { background-color: #d4a853; color: #0a0a0a; font-family: Outfit, sans-serif; font-weight: bold; width: 100%; padding: 1.25rem; text-transform: uppercase; letter-spacing: 0.1em; transition: all 0.3s; }
            .stitch-add-to-cart-wrapper button.single_add_to_cart_button:hover { transform: scale(1.02); }
            /* Hide annoying standard variations styling */
            .stitch-add-to-cart-wrapper .variations select { background: #201f1f; color: white; border: 1px solid rgba(255,255,255,0.1); padding: 0.5rem; width: 100%; margin-bottom: 1rem; }
            .stitch-add-to-cart-wrapper .reset_variations { display: none !important; }
        </style>
        <?php woocommerce_template_single_add_to_cart(); ?>
    </div>
</div>

<div class="space-y-6">
    <?php
    $attributes = $product->get_attributes();
    if ( ! empty( $attributes ) ) :
        foreach ( $attributes as $attribute ) :
            if ( $attribute->get_variation() ) continue; // Skip variations rendered above
    ?>
    <div class="flex justify-between items-center py-4 border-b border-[#1a1a1a]">
        <span class="font-label text-xs text-[#8a8a8a] uppercase tracking-widest"><?php echo wc_attribute_label( $attribute->get_name() ); ?></span>
        <span class="font-headline font-bold text-sm text-[#f5f5f5]">
            <?php
            $values = array();
            if ( $attribute->is_taxonomy() ) {
                $attribute_taxonomy = $attribute->get_taxonomy_object();
                $attribute_values = wc_get_product_terms( $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );
                foreach ( $attribute_values as $attribute_value ) {
                    $values[] = esc_html( $attribute_value->name );
                }
            } else {
                $values = $attribute->get_options();
            }
            echo implode( ', ', $values );
            ?>
        </span>
    </div>
    <?php 
        endforeach;
    endif;
    ?>
    <div class="flex justify-between items-center py-4 border-b border-[#1a1a1a]">
        <span class="font-label text-xs text-[#8a8a8a] uppercase tracking-widest">Delivery</span>
        <span class="font-headline font-bold text-sm text-[#f5f5f5]">Estimated 4-6 Months</span>
    </div>
</div>
