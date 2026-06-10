<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<!-- We wrap it in the group cursor-pointer and anchor tag to make the whole card clickable -->
<a href="<?php echo esc_url( $product->get_permalink() ); ?>" <?php wc_product_class( 'group cursor-pointer block', $product ); ?>>
    
    <?php do_action( 'woocommerce_before_shop_loop_item' ); ?>

    <div class="relative aspect-[16/10] overflow-hidden bg-[#2a2a2a] mb-8">
        <?php
        // Custom Thumbnail for Stitch Design
        $image_id  = $product->get_image_id();
        $image_url = wp_get_attachment_image_url( $image_id, 'full' );
        if ( ! $image_url ) {
            $image_url = wc_placeholder_img_src();
        }
        ?>
        <img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" class="w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-700 group-hover:scale-105" />
        
        <div class="absolute top-4 left-4 flex gap-2">
            <?php if ( $product->is_on_sale() ) : ?>
                <span class="bg-[#d4a853] text-[#0a0a0a] font-label text-[9px] font-extrabold px-3 py-1 tracking-tighter uppercase"><?php esc_html_e( 'Sale', 'woocommerce' ); ?></span>
            <?php endif; ?>
            <?php if ( ! $product->is_in_stock() ) : ?>
                <span class="bg-[#ffb4ab] text-[#690005] font-label text-[9px] font-extrabold px-3 py-1 tracking-tighter uppercase"><?php esc_html_e( 'Out of stock', 'woocommerce' ); ?></span>
            <?php else : ?>
                <span class="bg-white text-[#0a0a0a] font-label text-[9px] font-extrabold px-3 py-1 tracking-tighter uppercase">AVAILABLE NOW</span>
            <?php endif; ?>
        </div>
    </div>

    <div class="flex justify-between items-start">
        <div class="pr-4">
            <h3 class="font-headline text-bg md:text-xl lg:text-2xl font-bold tracking-tight mb-1 text-[#f5f5f5] group-hover:text-[#d4a853] transition-colors">
                <?php echo wp_kses_post( $product->get_name() ); ?>
            </h3>
            
            <?php 
            // Optional: You could fetch real custom fields here for year/mileage
            // E.g. $year = $product->get_attribute('year');
            // For now, we simulate the text as in the design
            ?>
            <p class="text-[#8a8a8a] text-xs md:text-sm font-medium tracking-wide">
                <?php 
                    $desc = $product->get_short_description();
                    echo $desc ? wp_trim_words( $desc, 6 ) : 'Porsche Engineering'; 
                ?>
            </p>
        </div>
        
        <div class="text-right shrink-0">
            <span class="block text-lg md:text-xl font-headline font-bold text-[#f5f5f5]">
                <?php 
                $price = $product->get_price();
                if ( $price ) {
                    echo wc_price( $price ); 
                }
                ?>
            </span>
            <span class="text-[#8a8a8a] text-[10px] uppercase tracking-widest font-semibold">Excl. Tax</span>
        </div>
    </div>

    <?php 
    // We suppress the default title and price hooks since we manually render them above to match the Stitch design perfectly.
    // do_action( 'woocommerce_shop_loop_item_title' ); 
    // do_action( 'woocommerce_after_shop_loop_item_title' ); 
    // do_action( 'woocommerce_after_shop_loop_item' ); 
    ?>
</a>
