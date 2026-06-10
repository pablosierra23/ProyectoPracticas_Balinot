<?php
/**
 * Product Details (Description, Specs, Reviews)
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

global $product;

$heading = apply_filters( 'woocommerce_product_description_heading', __( 'Description', 'woocommerce' ) );
$description = $product->get_description();

?>

<!-- Heritage Description -->
<?php if ( $description ) : ?>
<div class="py-12 border-t border-[#1a1a1a]">
    <?php if ( $heading ) : ?>
        <h2 class="font-headline text-3xl font-bold tracking-tight mb-6"><?php echo esc_html( $heading ); ?></h2>
    <?php endif; ?>
    <div class="font-body text-lg text-[#8a8a8a] leading-relaxed max-w-2xl custom-description">
        <?php echo wp_kses_post( $description ); ?>
    </div>
</div>
<?php endif; ?>

<!-- Technical Specs Grid -->
<?php
$attributes = $product->get_attributes();
$display_attributes = array();

// Extract up to 3 attributes to display in the grid
foreach ( $attributes as $attribute ) {
    if ( $attribute->get_visible() ) {
        $display_attributes[] = $attribute;
        if ( count( $display_attributes ) >= 3 ) {
            break;
        }
    }
}

// Fallback icons if we don't have specific ones mapped
$icons = ['bolt', 'speed', 'top_panel_open'];

if ( ! empty( $display_attributes ) || true ) : // Enforcing true for demonstration of the layout if no attributes
?>
<div class="grid grid-cols-1 md:grid-cols-3 gap-0.5 bg-[#1a1a1a]">
    <?php if ( ! empty( $display_attributes ) ) : ?>
        <?php foreach ( $display_attributes as $index => $attribute ) : 
            $icon = isset($icons[$index]) ? $icons[$index] : 'info';
            $name = wc_attribute_label( $attribute->get_name() );
            $value = '';
            if ( $attribute->is_taxonomy() ) {
                $terms = wp_get_post_terms( $product->get_id(), $attribute->get_name(), 'all' );
                $values = array();
                foreach ( $terms as $term ) {
                    $values[] = $term->name;
                }
                $value = implode( ', ', $values );
            } else {
                $value = implode( ', ', $attribute->get_options() );
            }
        ?>
        <div class="bg-surface-container p-10 flex flex-col items-start gap-4">
            <span class="material-symbols-outlined text-brand-gold text-3xl"><?php echo esc_html($icon); ?></span>
            <div>
                <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1"><?php echo esc_html($name); ?></p>
                <p class="font-headline text-2xl font-bold"><?php echo esc_html($value); ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else : ?>
        <!-- Hardcoded fallback to match design when no attributes exist -->
        <div class="bg-surface-container p-10 flex flex-col items-start gap-4">
            <span class="material-symbols-outlined text-brand-gold text-3xl">bolt</span>
            <div>
                <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1">Max Power</p>
                <p class="font-headline text-2xl font-bold">478 kW / 650 PS</p>
            </div>
        </div>
        <div class="bg-surface-container p-10 flex flex-col items-start gap-4">
            <span class="material-symbols-outlined text-brand-gold text-3xl">speed</span>
            <div>
                <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1">0-100 km/h</p>
                <p class="font-headline text-2xl font-bold">2.7 Seconds</p>
            </div>
        </div>
        <div class="bg-surface-container p-10 flex flex-col items-start gap-4">
            <span class="material-symbols-outlined text-brand-gold text-3xl">top_panel_open</span>
            <div>
                <p class="font-label text-[10px] text-[#8a8a8a] tracking-[0.2em] uppercase mb-1">Top Speed</p>
                <p class="font-headline text-2xl font-bold">330 km/h</p>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php endif; ?>

<!-- Reviews Section -->
<?php
// Load WooCommerce reviews template override
if ( comments_open() || get_comments_number() ) {
    comments_template( 'woocommerce/single-product-reviews.php' );
}
?>
