<?php
/**
 * Cart Page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.9.0
 */

defined( 'ABSPATH' ) || exit;

do_action( 'woocommerce_before_cart' ); ?>

<div class="max-w-[1440px] mx-auto px-6 md:px-12 py-20 bg-[#0a0a0a] text-[#f5f5f5] min-h-screen font-body">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-16">
        
        <!-- Left Column: Items & Payment Visuals -->
        <div class="lg:col-span-7">
            <span class="text-[#d4a853] font-label text-xs tracking-[0.3em] uppercase mb-4 block">YOUR SELECTION</span>
            <h1 class="font-headline text-5xl md:text-7xl font-bold tracking-tighter leading-none mb-16 uppercase">SHOPPING BAG</h1>

            <form class="woocommerce-cart-form !float-none !w-full" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                <?php do_action( 'woocommerce_before_cart_table' ); ?>
                
                <div class="cart-items-container flex flex-col gap-8 mb-12">
                    <?php do_action( 'woocommerce_before_cart_contents' ); ?>

                    <?php
                    foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                        $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                        $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                        $product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

                        if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                            $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                            ?>
                            <div class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?> flex flex-col sm:flex-row gap-8 bg-[#131313] border-b border-[#222] py-8 relative group">
                                
                                <!-- Product Image -->
                                <div class="w-full sm:w-1/3 shrink-0 bg-[#201f1f] flex items-center justify-center p-4">
                                    <?php
                                    $thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image( array( 400, 400 ), array( 'class' => 'w-full h-auto object-contain mix-blend-lighten' ) ), $cart_item, $cart_item_key );
                                    if ( ! $product_permalink ) {
                                        echo $thumbnail; // PHPCS: XSS ok.
                                    } else {
                                        printf( '<a href="%s" class="block w-full">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
                                    }
                                    ?>
                                </div>

                                <!-- Product Details -->
                                <div class="flex-grow flex flex-col justify-center">
                                    <div class="flex justify-between items-start mb-2">
                                        <?php
                                        if ( ! $product_permalink ) {
                                            echo wp_kses_post( '<h2 class="font-headline text-3xl font-bold uppercase tracking-tight">' . $product_name . '</h2>' );
                                        } else {
                                            echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s" class="font-headline text-3xl font-bold uppercase tracking-tight hover:text-[#d4a853] transition-colors">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
                                        }
                                        do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );
                                        ?>
                                        <!-- Remove Button -->
                                        <?php
                                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                'woocommerce_cart_item_remove_link',
                                                sprintf(
                                                    '<a href="%s" class="remove !bg-transparent !text-[#8a8a8a] hover:!text-[#f5f5f5] transition-colors material-symbols-outlined !text-xl !w-auto !h-auto !leading-none !rounded-none !border-0 flex items-center justify-center !m-0" aria-label="%s" data-product_id="%s" data-product_sku="%s">close</a>',
                                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                    esc_attr( sprintf( __( 'Remove %s from cart', 'woocommerce' ), wp_strip_all_tags( $product_name ) ) ),
                                                    esc_attr( $product_id ),
                                                    esc_attr( $_product->get_sku() )
                                                ),
                                                $cart_item_key
                                            );
                                        ?>
                                    </div>
                                    
                                    <p class="text-[#8a8a8a] text-sm uppercase tracking-widest mb-6">
                                        <?php echo $_product->get_short_description() ? wp_strip_all_tags($_product->get_short_description()) : 'PREMIUM SELECTION'; ?>
                                    </p>

                                    <!-- Meta data (Variations) -->
                                    <?php
                                    $meta_data = wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.
                                    if ( $meta_data ) {
                                        echo '<div class="text-[#8a8a8a] text-xs font-label uppercase tracking-widest flex flex-col gap-2 mb-6">' . $meta_data . '</div>';
                                    }
                                    ?>
                                    
                                    <div class="flex items-center gap-6 mt-auto">
                                        <div class="flex items-center">
                                            <?php
                                            if ( $_product->is_sold_individually() ) {
                                                $product_quantity = sprintf( '1 <input type="hidden" name="cart[%s][qty]" value="1" />', $cart_item_key );
                                            } else {
                                                add_filter( 'woocommerce_quantity_input_classes', function( $classes ) {
                                                    return array_merge( $classes, array( 'bg-transparent', 'border-0', 'border-b', 'border-[#333]', 'text-[#f5f5f5]', 'text-center', 'font-headline', 'w-12', 'focus:border-[#d4a853]', 'focus:ring-0', 'transition-colors', 'pb-1' ) );
                                                } );
                                                $product_quantity = woocommerce_quantity_input(
                                                    array(
                                                        'input_name'   => "cart[{$cart_item_key}][qty]",
                                                        'input_value'  => $cart_item['quantity'],
                                                        'max_value'    => $_product->get_max_purchase_quantity(),
                                                        'min_value'    => '0',
                                                        'product_name' => $_product->get_name(),
                                                    ),
                                                    $_product,
                                                    false
                                                );
                                            }
                                            echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
                                            ?>
                                        </div>
                                        <div class="flex gap-4 ml-auto items-center">
                                            <a href="<?php echo esc_url($product_permalink); ?>" class="text-[10px] text-[#8a8a8a] hover:text-[#d4a853] uppercase tracking-widest border-b border-[#333] pb-1 transition-colors">VIEW DETAILS</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Price -->
                                <div class="absolute bottom-8 right-0 sm:right-8 font-headline font-bold text-3xl text-[#f5f5f5]">
                                    <?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok. ?>
                                </div>

                            </div>
                            <?php
                        }
                    }
                    ?>
                    <?php do_action( 'woocommerce_cart_contents' ); ?>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-center gap-6 pt-4">
                    <?php if ( wc_coupons_enabled() ) { ?>
                        <div class="coupon flex w-full md:w-auto relative">
                            <input type="text" name="coupon_code" class="w-full md:w-64 bg-transparent border-0 border-b border-[#333] text-[#f5f5f5] py-3 focus:border-[#d4a853] focus:ring-0 placeholder:text-[#555] text-sm font-label tracking-widest" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'PROMO CODE', 'woocommerce' ); ?>" />
                            <button type="submit" class="absolute right-0 bottom-3 text-[#8a8a8a] text-xs font-bold tracking-widest uppercase hover:text-[#d4a853] transition-colors" name="apply_coupon" value="<?php esc_attr_e( 'Apply', 'woocommerce' ); ?>"><?php esc_html_e( 'Apply', 'woocommerce' ); ?></button>
                            <?php do_action( 'woocommerce_cart_coupon' ); ?>
                        </div>
                    <?php } ?>
                    <button type="submit" class="button border border-[#333] text-[#f5f5f5] px-8 py-4 text-xs font-bold uppercase tracking-widest hover:bg-white/5 transition-colors w-full md:w-auto ml-auto" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'woocommerce' ); ?>"><?php esc_html_e( 'Update cart', 'woocommerce' ); ?></button>
                    <?php do_action( 'woocommerce_cart_actions' ); ?>
                    <?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
                </div>
                
                <?php do_action( 'woocommerce_after_cart_table' ); ?>
            </form>

            <!-- Static Payment Method Section to match visual design -->
            <div class="mt-24 bg-[#131313] p-8 md:p-12 border border-[#222]">
                <h2 class="font-headline text-2xl font-bold uppercase tracking-widest mb-10">PAYMENT METHOD</h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">
                    <div class="border border-[#d4a853] text-[#d4a853] py-8 flex flex-col items-center justify-center cursor-pointer bg-[#d4a853]/5 transition-all">
                        <span class="material-symbols-outlined mb-3 text-4xl">credit_card</span>
                        <span class="font-label text-xs tracking-widest font-semibold">CREDIT CARD</span>
                    </div>
                    <div class="border border-[#333] text-[#8a8a8a] py-8 flex flex-col items-center justify-center cursor-pointer hover:border-white/30 transition-all">
                        <span class="material-symbols-outlined mb-3 text-4xl">account_balance</span>
                        <span class="font-label text-xs tracking-widest font-semibold">BANK TRANSFER</span>
                    </div>
                    <div class="border border-[#333] text-[#8a8a8a] py-8 flex flex-col items-center justify-center cursor-pointer hover:border-white/30 transition-all">
                        <span class="material-symbols-outlined mb-3 text-4xl">contactless</span>
                        <span class="font-label text-xs tracking-widest font-semibold">APPLE PAY</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-10 opacity-50 pointer-events-none">
                    <div class="col-span-1 md:col-span-2 relative">
                        <label class="block font-label text-[10px] tracking-widest text-[#8a8a8a] mb-2 uppercase">Cardholder Name</label>
                        <input type="text" class="w-full bg-transparent border-0 border-b border-[#333] text-[#f5f5f5] py-3 focus:border-[#d4a853] focus:ring-0 placeholder:text-[#444] text-lg font-headline tracking-widest" placeholder="FERDINAND PORSCHE">
                    </div>
                    <div class="col-span-1 md:col-span-2 relative">
                        <label class="block font-label text-[10px] tracking-widest text-[#8a8a8a] mb-2 uppercase">Card Number</label>
                        <input type="text" class="w-full bg-transparent border-0 border-b border-[#333] text-[#f5f5f5] py-3 focus:border-[#d4a853] focus:ring-0 placeholder:text-[#444] text-lg font-headline tracking-widest" placeholder="**** **** **** 1948">
                    </div>
                    <div class="relative">
                        <label class="block font-label text-[10px] tracking-widest text-[#8a8a8a] mb-2 uppercase">Expiry Date</label>
                        <input type="text" class="w-full bg-transparent border-0 border-b border-[#333] text-[#f5f5f5] py-3 focus:border-[#d4a853] focus:ring-0 placeholder:text-[#444] text-lg font-headline tracking-widest" placeholder="MM / YY">
                    </div>
                    <div class="relative">
                        <label class="block font-label text-[10px] tracking-widest text-[#8a8a8a] mb-2 uppercase">CVV</label>
                        <input type="text" class="w-full bg-transparent border-0 border-b border-[#333] text-[#f5f5f5] py-3 focus:border-[#d4a853] focus:ring-0 placeholder:text-[#444] text-lg font-headline tracking-widest" placeholder="***">
                    </div>
                </div>
                <p class="text-[#8a8a8a] text-[10px] tracking-widest uppercase mt-8 border-l-2 border-[#d4a853] pl-4">* Real payment processing will occur securely on the next step.</p>
            </div>
            
            <?php woocommerce_cross_sell_display(); ?>
        </div>

        <!-- Right Column: Totals -->
        <div class="lg:col-span-5 relative mt-16 lg:mt-0">
            <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
            <div class="cart-collaterals !float-none !w-full sticky top-32">
                <?php woocommerce_cart_totals(); ?>
            </div>
        </div>

    </div>
</div>

<?php do_action( 'woocommerce_after_cart' ); ?>
