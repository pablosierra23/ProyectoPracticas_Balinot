<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 */

defined( 'ABSPATH' ) || exit;

get_header();

/**
 * woocommerce_before_main_content hook.
 */
do_action( 'woocommerce_before_main_content' );

?>

<main class="pt-0">
    <!-- Hero Section: Featured New Arrival -->
    <section class="relative h-screen w-full flex items-end overflow-hidden">
        <div class="absolute inset-0 z-0">
            <!-- You can make this dynamic by querying latest product -->
            <img alt="Featured Product" class="w-full h-full object-cover" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZyQX-S97tUdQahH_GHG-euJEjT7ldB3Vq6PIWJR5YsIiBEOQqt3Cam8tj89vHFwLOzjtc6UKZ4Mkyu3t34gnjocM414mgNefa5TZjaM4oKSKADuCHyELr1f9OYA2UU7mXAfpfSwprYX_N3V7LUXOy_84E2uPVXZshFxPnX8rM9RjjW5YM3IupClO_sQRVaM_TbjH-3knlDrYTvW9LU_oFMPY8LlWJdEzQ0I3EtAJjfV81f6T4nzsjUsnOlQ7lhMtJWmypvaB7EMM"/>
            <div class="absolute inset-0 bg-gradient-to-t from-[#0a0a0a] via-[#0a0a0a]/40 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-[#0a0a0a] via-transparent to-transparent"></div>
        </div>
        <div class="relative z-10 px-6 md:px-12 pb-24 w-full max-w-7xl">
            <div class="flex flex-col gap-4">
                <span class="font-label text-[#d4a853] tracking-[0.3em] text-xs font-semibold">INVENTARIO PORSCHE</span>
                <h1 class="font-headline text-5xl md:text-7xl lg:text-9xl font-bold tracking-tighter leading-none mb-6">
                    <?php woocommerce_page_title(); ?>
                </h1>
                
                <?php do_action( 'woocommerce_archive_description' ); ?>
            </div>
        </div>
    </section>

    <!-- Inventory Filtering -->
    <section class="bg-[#131313] py-8 md:py-12 px-6 md:px-12 sticky top-[80px] z-40">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-8 border-b border-white/5 pb-8">
            <div class="flex flex-wrap gap-6 md:gap-8 overflow-x-auto w-full md:w-auto no-scrollbar">
                <a href="<?php echo wc_get_page_permalink('shop'); ?>" class="text-[#d4a853] font-label text-xs font-bold tracking-widest border-b border-[#d4a853] pb-1 whitespace-nowrap">TODOS</a>
                <?php
                // Example: We can output product categories here dynamically if needed.
                $product_cats = get_terms( array('taxonomy' => 'product_cat', 'hide_empty' => true) );
                if ( ! empty( $product_cats ) && ! is_wp_error( $product_cats ) ) {
                    foreach ( $product_cats as $category ) {
                        echo '<a href="' . esc_url( get_term_link( $category ) ) . '" class="text-[#8a8a8a] font-label text-xs font-bold tracking-widest hover:text-white transition-colors whitespace-nowrap">' . esc_html( $category->name ) . '</a> ';
                    }
                }
                ?>
            </div>
            <div class="flex items-center gap-6 md:gap-12 w-full md:w-auto justify-between md:justify-end">
                <div class="flex-1 md:flex-none">
                    <span class="block font-label text-[10px] text-[#8a8a8a] tracking-widest mb-4">PRICE RANGE</span>
                    <div class="relative w-full md:w-48 h-[2px] bg-white/10">
                        <div class="absolute left-0 top-0 h-full w-2/3 bg-[#d4a853]"></div>
                        <div class="absolute left-2/3 top-1/2 -translate-y-1/2 w-3 h-3 bg-[#d4a853] rotate-45"></div>
                    </div>
                </div>
                <button class="flex items-center gap-2 text-white border border-white/10 px-6 py-3 hover:bg-white/5 transition-colors shrink-0">
                    <span class="material-symbols-outlined text-sm">filter_list</span>
                    <span class="font-label text-[10px] font-bold tracking-widest hidden sm:inline">SORT & FILTER</span>
                </button>
            </div>
        </div>
    </section>

    <!-- Vehicle Grid -->
    <section class="bg-[#131313] px-6 md:px-12 py-12 md:py-20">
        <?php
        if ( woocommerce_product_loop() ) {
            do_action( 'woocommerce_before_shop_loop' );

            // Wrap loop in the grid:
            echo '<div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 md:gap-16">';
            
            if ( wc_get_loop_prop( 'total' ) ) {
                while ( have_posts() ) {
                    the_post(); // Iterates cars
                    
                    // We directly render our customized content-product here or include it
                    wc_get_template_part( 'content', 'product' );
                }
            }

            echo '</div>';

            do_action( 'woocommerce_after_shop_loop' );
        } else {
            do_action( 'woocommerce_no_products_found' );
        }
        ?>
    </section>
</main>

<?php
/**
 * woocommerce_after_main_content hook.
 */
do_action( 'woocommerce_after_main_content' );

/**
 * woocommerce_sidebar hook.
 */
// do_action( 'woocommerce_sidebar' ); // Usually skipped in premium full-width designs

get_footer( 'shop' );
