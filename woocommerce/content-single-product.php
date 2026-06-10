<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( 'pt-8 md:pt-12 pb-32 bg-[#0a0a0a] min-h-screen text-[#f5f5f5]', $product ); ?>>

    <div class="max-w-[1440px] mx-auto px-6 md:px-12 lg:grid lg:grid-cols-12 lg:gap-16">
        
        <!-- Hero Gallery Section -->
        <div class="lg:col-span-8 space-y-8">
            <?php
            /**
             * Hook: woocommerce_before_single_product_summary.
             * Custom override loads product-gallery.php
             */
            do_action( 'woocommerce_before_single_product_summary' );
            ?>
        </div>

        <!-- Sticky Sidebar Content -->
        <div class="lg:col-span-4 mt-12 lg:mt-0">
            <div class="sticky top-32 space-y-10">
                <?php
                /**
                 * Hook: woocommerce_single_product_summary.
                 * Custom override loads product-summary.php
                 */
                do_action( 'woocommerce_single_product_summary' );
                ?>
            </div>
        </div>

    </div>

	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>
