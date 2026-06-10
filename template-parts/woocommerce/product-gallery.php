<?php
/**
 * Product Gallery Template Part
 * Merges main image, gallery thumbnails, and description/specs into the left column
 */

defined( 'ABSPATH' ) || exit;
global $product;

$attachment_ids = $product->get_gallery_image_ids();
$main_image_url = wp_get_attachment_image_url( $product->get_image_id(), 'full' );
if ( ! $main_image_url ) {
    $main_image_url = wc_placeholder_img_src( 'woocommerce_single' );
}
?>

<div class="relative aspect-[16/9] overflow-hidden bg-[#201f1f]">
    <img src="<?php echo esc_url( $main_image_url ); ?>" alt="<?php echo esc_attr( $product->get_name() ); ?>" class="w-full h-full object-cover" />
    <div class="absolute bottom-8 left-8">
        <span class="bg-[#d4a853] text-[#0a0a0a] font-label text-[10px] font-bold tracking-[0.2em] px-4 py-2 uppercase">Precision Redefined</span>
    </div>
</div>

<?php if ( $attachment_ids && ! empty( $attachment_ids ) ) : ?>
<div class="grid grid-cols-2 gap-4">
    <?php 
    $count = 0;
    foreach ( $attachment_ids as $attachment_id ) {
        if ($count >= 2) break; // Display only first 2 max to match layout perfectly
        $gallery_img = wp_get_attachment_image_url( $attachment_id, 'full' );
        ?>
        <div class="aspect-square bg-[#201f1f] overflow-hidden">
            <img src="<?php echo esc_url( $gallery_img ); ?>" class="w-full h-full object-cover grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-500" alt="Gallery Image" />
        </div>
        <?php
        $count++;
    }
    ?>
</div>
<?php endif; ?>

<!-- Heritage Description (Description) -->
<div class="py-12 border-t border-[#1a1a1a]">
    <h2 class="font-headline text-3xl font-bold tracking-tight mb-6">Engineering Heritage</h2>
    <div class="font-body text-lg text-[#8a8a8a] leading-relaxed max-w-2xl">
        <?php 
        // We use full description here or short description if empty
        $long_desc = $product->get_description();
        echo $long_desc ? wp_kses_post( $long_desc ) : wp_kses_post( $product->get_short_description() );
        ?>
    </div>
</div>

<!-- Technical Specs Grid -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-0.5 bg-[#1a1a1a]">
    <div class="bg-[#201f1f] p-10 flex flex-col items-start gap-4">
        <span class="material-symbols-outlined text-[#d4a853] text-3xl">bolt</span>
        <div>
            <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1">Status</p>
            <p class="font-headline text-2xl font-bold"><?php echo $product->get_stock_status() === 'instock' ? 'Available' : 'Sold Out'; ?></p>
        </div>
    </div>
    <div class="bg-[#201f1f] p-10 flex flex-col items-start gap-4">
        <span class="material-symbols-outlined text-[#d4a853] text-3xl">speed</span>
        <div>
            <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1">SKU</p>
            <p class="font-headline text-xl font-bold"><?php echo $product->get_sku() ? esc_html($product->get_sku()) : 'N/A'; ?></p>
        </div>
    </div>
    <div class="bg-[#201f1f] p-10 flex flex-col items-start gap-4">
        <span class="material-symbols-outlined text-[#d4a853] text-3xl">top_panel_open</span>
        <div>
            <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1">Category</p>
            <p class="font-headline text-lg font-bold truncate max-w-[120px]">
                <?php echo wc_get_product_category_list( $product->get_id(), ', ' ); ?>
            </p>
        </div>
    </div>
</div>
