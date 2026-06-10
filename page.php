<?php
/**
 * The template for displaying all single pages
 */

get_header(); ?>

<main class="pt-24 pb-32 bg-[#0a0a0a] min-h-screen text-[#f5f5f5]">
    <?php
    $is_woo_full_page = ( function_exists('is_cart') && is_cart() ) || ( function_exists('is_checkout') && is_checkout() );
    $container_class = $is_woo_full_page ? 'max-w-[1440px]' : 'max-w-4xl';
    ?>
    <div class="<?php echo esc_attr($container_class); ?> mx-auto px-6 md:px-12">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( ! $is_woo_full_page ) : ?>
                <header class="mb-12 border-b border-[#1a1a1a] pb-8">
                    <h1 class="font-headline text-5xl md:text-7xl font-bold tracking-tighter leading-none mb-4"><?php the_title(); ?></h1>
                </header>
                <?php endif; ?>

                <div class="font-body text-lg text-[#8a8a8a] leading-relaxed custom-page-content space-y-6">
                    <?php
                    the_content();
                    
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'prueba-theme' ),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>
            </article>
            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;

        endwhile; // End of the loop.
        ?>
    </div>
</main>

<?php
get_footer();
