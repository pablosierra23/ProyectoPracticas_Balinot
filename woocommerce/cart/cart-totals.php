<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals !w-full !float-none bg-[#131313] p-8 md:p-12 <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?> border border-[#222]">

    <?php do_action( 'woocommerce_before_cart_totals' ); ?>

    <h2 class="font-headline text-2xl font-bold tracking-widest text-[#f5f5f5] mb-10 uppercase"><?php esc_html_e( 'Order Summary', 'woocommerce' ); ?></h2>

    <div class="space-y-6">
        <div class="flex justify-between items-center pb-4 cart-subtotal">
            <span class="font-label text-[10px] tracking-widest text-[#8a8a8a] uppercase"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></span>
            <span class="font-headline font-semibold text-lg text-[#f5f5f5]" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><?php wc_cart_totals_subtotal_html(); ?></span>
        </div>

        <?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
            <div class="flex flex-col sm:flex-row justify-between sm:items-center pb-4 cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                <span class="font-label text-[10px] tracking-widest text-[#d4a853] uppercase mb-2 sm:mb-0"><?php wc_cart_totals_coupon_label( $coupon ); ?></span>
                <span class="font-headline font-semibold text-lg text-right text-[#d4a853]" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></span>
            </div>
        <?php endforeach; ?>

        <?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

            <?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

            <div class="pb-4 flex justify-between items-start">
                <span class="font-label text-[10px] tracking-widest text-[#8a8a8a] uppercase mt-1">
                    <?php esc_html_e( 'Destination Fee', 'woocommerce' ); ?>
                </span>
                <div class="text-lg font-headline font-semibold text-[#f5f5f5] text-right">
                    <?php wc_cart_totals_shipping_html(); ?>
                </div>
            </div>

            <?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

        <?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

            <div class="pb-4 shipping">
                <span class="font-label text-[10px] tracking-widest text-[#8a8a8a] uppercase block mb-4"><?php esc_html_e( 'Destination Fee', 'woocommerce' ); ?></span>
                <div class="text-sm font-body" data-title="<?php esc_attr_e( 'Destination Fee', 'woocommerce' ); ?>"><?php woocommerce_shipping_calculator(); ?></div>
            </div>

        <?php endif; ?>

        <?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
            <div class="flex justify-between items-center pb-4 fee">
                <span class="font-label text-[10px] tracking-widest text-[#8a8a8a] uppercase"><?php echo esc_html( $fee->name ); ?></span>
                <span class="font-headline font-semibold text-lg text-[#f5f5f5]" data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></span>
            </div>
        <?php endforeach; ?>

        <?php
        if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {
            $taxable_address = WC()->customer->get_taxable_address();
            $estimated_text  = '';

            if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
                $estimated_text = sprintf( ' <small class="text-[#8a8a8a] block mt-1 tracking-normal lowercase">' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
            }

            if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
                foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                    ?>
                    <div class="flex justify-between items-center pb-4 tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
                        <span class="font-label text-[10px] tracking-widest text-[#8a8a8a] uppercase"><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                        <span class="font-headline font-semibold text-lg text-[#f5f5f5]" data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></span>
                    </div>
                    <?php
                }
            } else {
                ?>
                <div class="flex justify-between items-center pb-4 tax-total border-b border-[#333]">
                    <span class="font-label text-[10px] tracking-widest text-[#8a8a8a] uppercase"><?php echo esc_html( 'Estimated Taxes' ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                    <span class="font-headline font-semibold text-lg text-[#f5f5f5]" data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></span>
                </div>
                <?php
            }
        } else {
            // Add a visual separator if no taxes explicitly shown
            echo '<div class="border-b border-[#333] pt-2"></div>';
        }
        ?>

        <?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

        <div class="flex justify-between items-center pt-6 order-total">
            <span class="font-label text-sm tracking-[0.3em] font-bold uppercase text-[#f5f5f5]"><?php esc_html_e( 'Total', 'woocommerce' ); ?></span>
            <div class="text-right">
                <span class="font-headline text-3xl md:text-4xl font-bold text-[#d4a853] block mb-1" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><?php wc_cart_totals_order_total_html(); ?></span>
                <span class="text-[#8a8a8a] text-[10px] tracking-widest uppercase italic block">Monthly financing from $3,450/mo</span>
            </div>
        </div>

        <?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

    </div>

    <div class="wc-proceed-to-checkout mt-12 mb-12">
        <?php 
            remove_action( 'woocommerce_proceed_to_checkout', 'woocommerce_button_proceed_to_checkout', 20 );
            add_action( 'woocommerce_proceed_to_checkout', function() {
                ?>
                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="checkout-button flex items-center justify-center gap-3 w-full text-center bg-[#d4a853] text-[#0a0a0a] font-headline font-bold py-6 uppercase tracking-[0.2em] hover:brightness-110 active:scale-[0.98] transition-all duration-300">
                    <span class="material-symbols-outlined text-xl">lock</span>
                    <?php esc_html_e( 'Secure Checkout', 'woocommerce' ); ?>
                </a>
                <?php
            }, 20 );
        ?>
        <?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
    </div>

    <!-- Trust Badges -->
    <div class="border-t border-[#333] pt-10 flex flex-col gap-8">
        <div class="flex items-start gap-4">
            <span class="material-symbols-outlined text-[#d4a853] text-2xl mt-0.5">verified_user</span>
            <div>
                <h4 class="font-headline text-sm font-bold uppercase tracking-widest text-[#f5f5f5] mb-1">Porsche Warranty</h4>
                <p class="text-[#8a8a8a] text-[11px] leading-relaxed">4-Year / 50,000-mile limited warranty and 24-hour roadside assistance included.</p>
            </div>
        </div>
        <div class="flex items-start gap-4">
            <span class="material-symbols-outlined text-[#d4a853] text-2xl mt-0.5">enhanced_encryption</span>
            <div>
                <h4 class="font-headline text-sm font-bold uppercase tracking-widest text-[#f5f5f5] mb-1">Encrypted Checkout</h4>
                <p class="text-[#8a8a8a] text-[11px] leading-relaxed">Your payment information is handled through high-security banking protocols.</p>
            </div>
        </div>
        <div class="flex items-start gap-4">
            <span class="material-symbols-outlined text-[#d4a853] text-2xl mt-0.5">local_shipping</span>
            <div>
                <h4 class="font-headline text-sm font-bold uppercase tracking-widest text-[#f5f5f5] mb-1">Concierge Delivery</h4>
                <p class="text-[#8a8a8a] text-[11px] leading-relaxed">Available home delivery via Porsche Specialized Logistics.</p>
            </div>
        </div>
    </div>

    <?php do_action( 'woocommerce_after_cart_totals' ); ?>

</div>
