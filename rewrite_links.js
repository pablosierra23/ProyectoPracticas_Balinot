const fs = require('fs');
const path = require('path');
const dir = __dirname;

const mobileMenuHtml = `
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="fixed inset-0 z-[100] bg-black translate-x-full transition-transform duration-500 flex flex-col items-center justify-center">
        <button id="close-menu-btn" class="absolute top-8 right-8 text-white hover:text-secondary transition-colors">
            <span class="material-symbols-outlined text-4xl">close</span>
        </button>
        <div class="flex flex-col gap-10 text-center uppercase tracking-widest font-label">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Home</a>
            <a href="<?php echo esc_url( home_url( '/servicios/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Servicios</a>
            <a href="<?php echo esc_url( home_url( '/concesionario/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Concesionario</a>
            <a href="<?php echo esc_url( home_url( '/quienes-somos/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Quiénes Somos</a>
            <a href="<?php echo esc_url( home_url( '/contacto/' ) ); ?>" class="text-2xl text-white hover:text-secondary transition-colors">Contacto</a>
        </div>
    </div>
`;

function walk(directory) {
    let results = [];
    const list = fs.readdirSync(directory);
    list.forEach(file => {
        let fullPath = path.join(directory, file);
        const stat = fs.statSync(fullPath);
        if (stat && stat.isDirectory() && !fullPath.includes('inc') && !fullPath.includes('classes') && !fullPath.includes('stuttgart_noir') && !fullPath.includes('servicios_') && !fullPath.includes('qui_nes_') && !fullPath.includes('porsche_centres_') && !fullPath.includes('contacto_porsche_')) {
            results = results.concat(walk(fullPath));
        } else if (fullPath.endsWith('.php')) {
            results.push(fullPath);
        }
    });
    return results;
}

const files = walk(dir);

files.forEach(file => {
    let content = fs.readFileSync(file, 'utf8');
    
    // Link replacements
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Contact Us[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/contacto/\' ) ); ?>"$2>$3</a>');
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Contacto[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/contacto/\' ) ); ?>"$2>$3</a>');
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Contact[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/contacto/\' ) ); ?>"$2>$3</a>');
    
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Services[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/servicios/\' ) ); ?>"$2>$3</a>');
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Servicios[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/servicios/\' ) ); ?>"$2>$3</a>');
    
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*About Us[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/quienes-somos/\' ) ); ?>"$2>$3</a>');
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Company[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/quienes-somos/\' ) ); ?>"$2>$3</a>');
    
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Centers[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/concesionario/\' ) ); ?>"$2>$3</a>');
    content = content.replace(/<a([^>]*)href="[^"]*"([^>]*)>([^<]*Dealer Locator[^<]*)<\/a>/gi, '<a$1href="<?php echo esc_url( home_url( \'/concesionario/\' ) ); ?>"$2>$3</a>');

    // Make Brand logo redirect to home
    content = content.replace(/<div class="([^"]*text-2xl font-bold tracking-tighter text-\[#f5f5f5\][^"]*)">\s*PORSCHE\s*<\/div>/g, '<a href="<?php echo esc_url( home_url( \'/\' ) ); ?>" class="$1">PORSCHE</a>');
    content = content.replace(/<span class="([^"]*text-2xl font-bold tracking-tighter text-on-surface font-headline uppercase[^"]*)">\s*PORSCHE\s*<\/span>/g, '<a href="<?php echo esc_url( home_url( \'/\' ) ); ?>" class="$1">PORSCHE</a>');
    
    // Footer PORSCHE
    content = content.replace(/<div class="([^"]*text-lg font-bold text-\[#f5f5f5\] mb-8 font-headline uppercase tracking-tighter[^"]*)">\s*PORSCHE\s*<\/div>/g, '<a href="<?php echo esc_url( home_url( \'/\' ) ); ?>" class="$1 block">PORSCHE</a>');
    content = content.replace(/<div class="([^"]*text-lg font-bold text-\[#f5f5f5\][^"]*)">\s*PORSCHE\s*<\/div>/g, '<a href="<?php echo esc_url( home_url( \'/\' ) ); ?>" class="$1 block mb-8 font-headline uppercase tracking-tighter">PORSCHE</a>');
    content = content.replace(/<span class="([^"]*text-lg font-bold tracking-tighter text-on-surface font-headline uppercase[^"]*)">\s*PORSCHE\s*<\/span>/g, '<a href="<?php echo esc_url( home_url( \'/\' ) ); ?>" class="$1 block">PORSCHE</a>');
    content = content.replace(/<div class="text-2xl font-bold tracking-tighter text-\[#f5f5f5\]">PORSCHE<\/div>/g, '<a href="<?php echo esc_url( home_url( \'/\' ) ); ?>" class="text-2xl font-bold tracking-tighter text-[#f5f5f5]">PORSCHE</a>');


    // Ensure footers have the menu
    if (file.includes('footer') && !content.includes('id="mobile-menu"')) {
        content = content.replace('<?php wp_footer(); ?>', mobileMenuHtml + '\n    <?php wp_footer(); ?>');
    }
    
    fs.writeFileSync(file, content, 'utf8');
});
console.log('Successfully connected all pages into WP slugs and attached mobile menus.');
