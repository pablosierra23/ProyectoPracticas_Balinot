<?php
/**
 * Global Footer Template
 */
?>
    <!-- Footer -->
    <footer id="footer" class="bg-[#0a0a0a]">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 px-12 py-24 w-full">
            <div>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-lg font-bold text-[#f5f5f5] mb-8 font-headline uppercase tracking-tighter block">PORSCHE</a>
                <p class="text-[#8a8a8a] text-sm leading-relaxed max-w-xs">High-End Automotive Editorial. Shaping the future of the sports car through precision and passion since 1948.</p>
            </div>
            <div>
                <h5 class="text-[#d4a853] text-[0.75rem] tracking-[0.3em] uppercase font-bold mb-8">Navigation</h5>
                <ul class="space-y-4">
                    <li><a class="text-[#8a8a8a] text-sm hover:text-[#f5f5f5] transition-colors duration-200" href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>">Services</a></li>
                    <li><a class="text-[#8a8a8a] text-sm hover:text-[#f5f5f5] transition-colors duration-200" href="<?php echo esc_url( home_url( '/quienes-somos/' ) ); ?>">About Us</a></li>
                    <li><a class="text-[#8a8a8a] text-sm hover:text-[#f5f5f5] transition-colors duration-200" href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>">Contact</a></li>
                </ul>
            </div>
            <div>
                <h5 class="text-[#d4a853] text-[0.75rem] tracking-[0.3em] uppercase font-bold mb-8">Legal</h5>
                <ul class="space-y-4">
                    <li><a class="text-[#8a8a8a] text-sm hover:text-[#f5f5f5] transition-colors duration-200" href="#">Legal Notice</a></li>
                    <li><a class="text-[#8a8a8a] text-sm hover:text-[#f5f5f5] transition-colors duration-200" href="#">Privacy Policy</a></li>
                    <li><a class="text-[#8a8a8a] text-sm hover:text-[#f5f5f5] transition-colors duration-200" href="#">Region Selector</a></li>
                </ul>
            </div>
        </div>
        <div class="px-12 py-8 border-t border-outline-variant/10 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-[0.7rem] text-[#8a8a8a] tracking-wider uppercase">© 2024 Porsche Spain. High-End Automotive Editorial.</p>
            <div class="flex gap-6">
                <span class="material-symbols-outlined text-[#8a8a8a] cursor-pointer hover:text-secondary" data-icon="language">language</span>
                <span class="text-[0.7rem] text-[#f5f5f5] font-bold tracking-widest uppercase">ESPAÑA</span>
            </div>
        </div>
    </footer>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 z-[100] bg-black translate-x-full transition-transform duration-500 flex flex-col items-center justify-center">
        <button id="close-menu-btn" class="absolute top-8 right-8 text-white hover:text-secondary transition-colors">
            <span class="material-symbols-outlined text-4xl">close</span>
        </button>
        <div class="flex flex-col gap-10 text-center uppercase tracking-widest font-label">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Home</a>
            <a href="<?php echo esc_url( function_exists('wc_get_page_id') ? get_permalink( wc_get_page_id( 'shop' ) ) : home_url( '/shop/' ) ); ?>" class="text-2xl text-[#d4a853] font-bold hover:text-white transition-colors">Tienda</a>
            <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Servicios</a>
            <a href="<?php echo esc_url( home_url( '/concesionario/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Concesionario</a>
            <a href="<?php echo esc_url( home_url( '/quienes-somos/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Quiénes Somos</a>
            <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Contacto</a>
        </div>
    </div>

    <?php wp_footer(); ?>
</body>
</html>
