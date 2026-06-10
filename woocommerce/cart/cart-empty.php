<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
	<div class="max-w-[1440px] mx-auto px-6 md:px-12 py-32 flex flex-col items-center justify-center text-center bg-[#131313]">
		<div class="mb-12">
            <span class="material-symbols-outlined text-6xl text-[#d4a853] block mx-auto mb-6" style="font-variation-settings: 'FILL' 0, 'wght' 200, 'GRAD' 0, 'opsz' 48;">local_mall</span>
			<h1 class="font-headline text-5xl md:text-7xl font-bold tracking-tighter leading-none mb-6 text-[#f5f5f5]">CARRITO VACÍO</h1>
			<p class="font-body text-[#8a8a8a] text-lg md:text-xl max-w-xl mx-auto"><?php esc_html_e( 'Your cart is currently empty. Discover our exclusive models and add them to your cart.', 'woocommerce' ); ?></p>
		</div>

		<div class="return-to-shop">
			<a class="button wc-backward bg-transparent border border-white/20 text-[#f5f5f5] hover:bg-white/5 font-headline font-bold uppercase tracking-[0.2em] py-5 px-12 transition-all duration-300 inline-block" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
				<?php
					/**
					 * Filter "Return To Shop" text.
					 *
					 * @since 4.6.0
					 * @param string $default_text Default text.
					 */
					echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'woocommerce' ) ) );
				?>
			</a>
		</div>
	</div>
<?php endif; ?>
